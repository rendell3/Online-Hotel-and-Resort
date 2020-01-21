$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    $('#inputImage').fileinput({
        showPreview: false,
        browseLabel: "Select an image file...",
        // msgPlaceholder: null,
        // removeClass: 'btn btn-danger',
        // uploadClass: 'btn btn-success',
        showCancel: false,
        allowedFileExtensions: ["jpg", "svg", "png"],
        uploadUrl: uri + '/gallery/upload',
        elErrorContainer: '#divImageError',
        mainClass: 'fileinput fileinput-new input-group'
    }).on('filebatchpreupload', function (event, data, id, index) {
        $('#divImageError').html('');
        // $('#div-success').hide();
    }).on('fileuploaded', function (event, data, id, index) {
        $('#divImageError').html('');
        response = data.response;
        filename = response['filename'];
        $('#inputFilename').val(filename);
    });

    $.get(uri + '/categories')
        .done(function (response) {
            categories = response.data;
            categories.forEach(category => {
                var id = category.fldCategoryId;
                var name = category.fldCategoryName;
                var created = category.fldCategoryCreated;
                var build = '<option value="'+id+'">'+name+'</option>';

                $('#txtCategory').append(build);
            });
        });

    $('input[name="radioSucceeding"]').change(function () {
        var succeeding = $(this).val();
        if (succeeding == "1") {
            $('#groupSucceeding').show();
        } else {
            $('#groupSucceeding').hide();
        }
    });

    $('#txtUnit').change(function () {
        var unit = $(this).val();
        if(unit == 'hour') {
            $('#groupRadio').show();
        } else {
            $('#groupRadio').hide();
            $('#groupSucceeding').hide();
        }
    });

    initData(uri);
    $('#btnAdd').click(function () {
        $('#divError').html('');
        var name = $('#txtName').val();
        var unit = $('#txtUnit').val();
        var price = $('#txtPrice').val();
        var quantity = $('#txtQuantity').val();
        var description = $('#txtDescription').val();
        var path = $('#inputFilename').val();
        var category = $('#txtCategory').val();
        var radioSucceeding = $('input[name="radioSucceeding"]:checked').val();

        if(path == '') {
            $('#divError').html('<div class="alert alert-danger">Image is required. Please don\'t forget to click upload.</div>');
            return;
        }

        if(name == '') {
            $('#divError').html('<div class="alert alert-danger">Name is required.</div>');
            return;
        }

        if(unit == '') {
            $('#divError').html('<div class="alert alert-danger">Unit is required.</div>');
            return;
        }

        if(quantity == '') {
            $('#divError').html('<div class="alert alert-danger">Quantity is required.</div>');
            return;
        }

        if(description == '') {
            $('#divError').html('<div class="alert alert-danger">Description is required.</div>');
            return;
        }

        if(price == '') {
            $('#divError').html('<div class="alert alert-danger">Price is required.</div>');
            return;
        }

        if(price == '') {
            $('#divError').html('<div class="alert alert-danger">Price is required.</div>');
            return;
        }

        if(unit != 'hour') {
            radioSucceeding = '0';
        }
        var succeeding = '0';
        if(radioSucceeding == '1') {
            succeeding = $('#txtSucceeding').val();
            if(succeeding == '') {
                $('#divError').html('<div class="alert alert-danger">Succeeding charge/price is required.</div>');
                return;
            }
        }

        var data = {
            name: name,
            unit: unit,
            price: price,
            description: description,
            path: path,
            category: category,
            succeeding: succeeding,
            quantity: quantity
        };

        $.post(uri + '/products', data)
            .done(function (response) {
                if (response.code == 200) {
                    $('#txtName').val('');
                    $('#txtPrice').val('');
                    $('#txtDescription').val('');
                    $('#inputFilename').val('');
                    $('#modalAdd').modal('hide');
                    initData(uri);
                } else {
                    console.log(response);
                }
            });
    });
});

function initData(uri) {
    $('#rowProducts').html('');
    $.ajax({
        url: uri + '/products',
        type: 'get'
    }).done(function (response) {
        products = response.data;
        products.forEach(product => {
            var id = product.fldProductId;
            var name = product.fldProductName;
            var unit = product.fldProductUnit;
            var description = product.fldProductDescription;
            if(description.length > 40) {
                description = description.substr(0, 40).trim() + '...';
            }
            var price = product.fldProductPrice;
            var created = product.fldProductCreated;
            var category = product.fldCategoryName;
            var path = product.fldProductImagePath;

            var quantity = product.fldProductQuantity;
            var succeeding = product.fldProductSucceeding;
            var buildPrice = '';
            var buildSucceeding = 'Not applicable';
            if(unit == 'hour') {
                if(succeeding == 0) {
                    buildPrice = price + ' every ' + quantity + ' hour(s)';
                } else {
                    buildPrice = price + ' for the first ' + quantity + ' hour(s)';
                    buildSucceeding = succeeding + ' every succeeding hour';
                }
            } else if(unit == 'quantity') {
                buildPrice = price + ' each';
            } else if(unit == 'piece') {
                buildPrice = price + ' per piece';
            }

            var build = '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <div class="panel panel-default contact-card card-view"> <div class="panel-heading"> <div class="pull-left"> <div class="pull-left user-img-wrap mr-15"><img class="card-user-img img-circle pull-left" style="object-fit:cover" src="uploads/' + path + '" alt="' + name + '" />' +
                '</div><div class="pull-left user-detail-wrap"><span class="block card-user-name" style="color:black; font-weight:bold;">' + name + '</span><span class="block card-user-desn" style="color:black">' + category + '</span></div></div>' +
                '<div class="pull-right"> <a class="pull-left inline-block mr-15 edit-product" data-id="'+id+'" href="javascript:;"> <i class="zmdi zmdi-edit txt-dark"></i> </a> <a class="pull-left inline-block mr-15" href="javascript:;"> <i class="zmdi zmdi-delete txt-dark delete-product" data-id="'+id+'"></i> </a></div><div class="clearfix"></div></div>' +
                '<div class="panel-wrapper collapse in"><div class="panel-body row">'
                + '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark">' + description + '</span></div></div>'
                + '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark">' + buildPrice + '</span></div></div>'
                + '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark">' + buildSucceeding + '</span></div></div>'
                + '<hr class="light-grey-hr mt-20 mb-20" />' +
                '<div class="emp-detail pl-15 pr-15"><div class="mb-5"><span class="inline-block capitalize-font mr-5">Date created:</span><span class="txt-dark">' + created + '</span></div></div></div></div></div></div>';

            $('#rowProducts').append(build);
        });

        $('.delete-product').click(function () {
            var id = $(this).attr('data-id');
            swal({
                title: 'Are you sure?',
                text: 'Do you want to delete this category?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, cancel'
            }).then(result => {
                if (result) {
                    var data = {
                        id: id
                    };
                    $.post(uri + '/products/delete', data)
                        .done(function (response) {
                            if (response.code == 200) {
                                swal('Successful!', 'Product was successfully deleted.', 'success').then(result => {
                                    initData(uri);
                                });
                            } else {
                                console.log(response);
                            }
                        });
                }
            });
        });
        // masonryPortfolio();

        // $('#rowProducts').lightGallery({
        //     showThumbByDefault: false,
        //     hash: false,
        //     selector: '.item'
        // });


    });
}

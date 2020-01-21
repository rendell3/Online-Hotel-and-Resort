$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    $('#rowProducts').html('');
    $.ajax({
        url: uri + '/products',
        type: 'get'
    }).done(function (response) {
        $('#txtProducts').html('');
        products = response.data;
        products.forEach(product => {
            var id = product.fldProductId;
            var name = product.fldProductName;

            var build = '<option value="'+id+'">'+name+'</option>';
            $('#txtProducts').append(build);
        });

        $('#txtProducts').select2();
    });

    $('.textarea_editor').wysihtml5({
		toolbar: {
		  fa: true,
		  "link": true,
		}
    });
    
    $('input[name="radioSucceeding"]').change(function () {
        var succeeding = $(this).val();
        if (succeeding == "1") {
            $('#groupSucceeding').show();
        } else {
            $('#groupSucceeding').hide();
        }
    });

    initData(uri);
    $('#btnAdd').click(function () {
        $('#divError').html('')
        var name = $('#txtName').val();
        var price = $('#txtPrice').val();
        var person = $('#txtPerson').val();
        var days = $('#txtDays').val();
        var description = $('#txtDescription').val();
        var succeeding = $('#txtSucceeding').val()
        var radioSucceeding = $('input[name="radioSucceeding"]:checked').val();
        var products = $('#txtProducts').val();

        if(name == '') {
            $('#divError').html('<div class="alert alert-danger">Name is required.</div>');
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
            price : price,
            description : description,
            succeeding : succeeding,
            // person : person,
            // days : days,
            products : products
        };

        $.post(uri + '/packages', data)
            .done(function (response) {
                if (response.code == 200) {
                    $('#txtName').val('');
                    // $('#txtPerson').val('');
                    $('#txtPrice').val();
                    // $('#txtDays').val('');
                    $('#txtDescription').val('');
                    $('#txtProducts').val('');
                    $('#txtSucceeding').val('')
                    $('#modalAdd').modal('hide');
                    initData(uri);
                } else {
                    console.log(response);
                }
            });
    });


});

function initData(uri) {
    $('#tablePackages tbody').html('');
    $.get(uri + '/packages')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tablePackages")) {
                $('#tablePackages').DataTable().clear().destroy();
            }
            results = response.data;
            results.forEach(result => {
                var package = result.package;

                var id = package.fldPackageId;
                var name = package.fldPackageName;
                var price = package.fldPackagePrice;
                var person = package.fldPackagePerson;
                var days = package.fldPackageDays;
                var succeeding = package.fldPackageSucceeding;

                var products = result.products;
                var arrayProducts = [];
                products.forEach(product => {
                    arrayProducts.push(product.fldProductName);
                });

                if(succeeding == 0) {
                    succeeding = '<i>Not applicable</i>';
                }
                var stringProducts = arrayProducts.join(', ');
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td>' + name + '</td>' +
                    '<td>' + succeeding + '</td>' +
                    // '<td>' + person + '</td>' +
                    '<td>' + days + '</td>' +
                    '<td>' + stringProducts + '</td>' +
                    '<td><a href="javascript:void(0)" class="text-inverse pr-10 edit-package" title="Edit" data-toggle="tooltip" data-id="'+id+'"><i class="zmdi zmdi-edit txt-warning"></i></a><a href="javascript:void(0)" class="text-inverse delete-package" title="Delete" data-toggle="tooltip" data-id="'+id+'"><i class="zmdi zmdi-delete txt-danger"></i></a></td>' +
                    '</tr>';

                $('#tablePackages tbody').append(build);
            });
            $('a[data-toggle="tooltip"]').tooltip();

            $("#tablePackages").dataTable();

            $('.delete-package').click(function () {
                var id = $(this).attr('data-id');
                swal({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this package?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'No, cancel'
                }).then(result => {
                    if (result) {
                        var data = {
                            id: id
                        };
                        $.post(uri + '/packages/delete', data)
                            .done(function (response) {
                                if (response.code == 200) {
                                    swal('Successful!', 'Package was successfully deleted.', 'success').then(result => {
                                        initData(uri);
                                    });
                                } else {
                                    console.log(response);
                                }
                            });
                    }
                });
            });
        });
}

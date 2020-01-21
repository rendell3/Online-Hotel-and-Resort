$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host;
    uri = "http://localhost:9000";
    // page is now ready, initialize the calendar...

    var userId = $('#txtHiddenId').val();

    $('#choicesLinks').html('');
    $('#choicesTabs').html('');
    var build = '<li class="active"><a data-toggle="tab" href="#package">Packages</a></li>';
    $('#choicesTabs').append('<div class="tab-pane fade in active" id="package"><div class="row" id="rowPackage"></div></div>');
    $('#choicesLinks').append(build);
    $.ajax({
        url: uri + '/api/packages',
        type: 'get',
        async: false
    }).done(function (response) {
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

            // if (succeeding == 0) {
            //     succeeding = '<i>Not applicable</i>';
            // }
            var stringProducts = arrayProducts.join(', ');

            var buildPrice = '';
            var buildSucceeding = 'Not applicable';
            if (succeeding == 0) {
                buildPrice = '₱' + price + ' for 21 hours';
            } else {
                buildPrice = '₱' + price + ' for the first 21 hour(s)';
                buildSucceeding = succeeding + ' every succeeding hour';
            }
            // var build = '<tr>' +
            //     '<td>' + id + '</td>' +
            //     '<td>' + name + '</td>' +
            //     '<td>' + succeeding + '</td>' +
            //     // '<td>' + person + '</td>' +
            //     '<td>' + days + '</td>' +
            //     '<td>' + stringProducts + '</td>' +
            //     '<td><a href="javascript:void(0)" class="text-inverse pr-10 edit-package" title="Edit" data-toggle="tooltip" data-id="'+id+'"><i class="zmdi zmdi-edit txt-warning"></i></a><a href="javascript:void(0)" class="text-inverse delete-package" title="Delete" data-toggle="tooltip" data-id="'+id+'"><i class="zmdi zmdi-delete txt-danger"></i></a></td>' +
            //     '</tr>';

            var build = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="panel panel-default contact-card card-view"> <div class="panel-heading text-center"><center><i class="fas fa-box"></i></center></div>' +
                '<div class="panel-body">' +
                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark" id="packageName' + id + '"> ' + name + '</span></div></div>' +
                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money-check"></i> ' + buildPrice + '</span></div></div>' +
                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span></div></div></div><div class="panel-footer"><a href="javascript:;" class="pull-left add-cart" data-id="' + id + '" data-succeeding="' + succeeding + '" data-price="' + price + '" style="margin-top:10px;"><small>Add to cart <i class="fas fa-cart-plus"></i></small></a> <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage' + id + '" style="width:60%" value="1"><div class="clearfix"></div></div></div></div>';

            $('#package').append(build);
        });


    });

    $.ajax({
        url: uri + '/api/categories',
        type: 'get',
        async: false
    }).done(function (response) {
        if (response.code == 200) {

            var categories = response.data;
            for (const [index, category] of categories.entries()) {
                var categoryId = category.fldCategoryId;
                var categoryName = category.fldCategoryName;
                if (categoryName.length >= 10) {
                    categoryName = categoryName.substr(0, 10).trim() + '...';
                }

                // if (index == 0) {
                //     var build = '<li class="active"><a data-toggle="tab" href="#menu' + categoryId + '">' + categoryName + '</a></li>';
                //     $('#choicesTabs').append('<div class="tab-pane fade in active" id="menu' + categoryId + '"><div class="row" id="category' + categoryId + '"></div></div>');

                //     $('#choicesLinks').append(build);
                // } else {
                //     var build = '<li><a data-toggle="tab" href="#menu' + categoryId + '">' + categoryName + '</a></li>';
                //     $('#choicesTabs').append('<div class="tab-pane" id="menu' + categoryId + '"><div class="row" id="category' + categoryId + '"></div></div>');
                //     $('#choicesLinks').append(build);
                // }

                var build = '<li><a data-toggle="tab" href="#menu' + categoryId + '">' + categoryName + '</a></li>';
                $('#choicesTabs').append('<div class="tab-pane" id="menu' + categoryId + '"><div class="row" id="category' + categoryId + '"></div></div>');
                $('#choicesLinks').append(build);
                // <h3>HOME</h3>
                // <p>Some content.</p>

                $.ajax({
                    url: uri + '/api/products/categories/' + categoryId,
                    type: 'get',
                    async: false
                }).done(function (result) {
                    if (result.code == 200) {
                        var room = $('#txtRoom').val();

                        var products = result.data;

                        if (products.length == 0) {
                            $('#category' + categoryId + '').append('<div class="col-md-12"><div class="alert alert-info">No items under this category.</div></div>');
                        }
                        products.forEach(product => {
                            var id = product.fldProductId;

                            
                            var name = product.fldProductName;
                            var unit = product.fldProductUnit;
                            var description = product.fldProductDescription;
                            if (description.length > 40) {
                                description = description.substr(0, 40).trim() + '...';
                            }
                            var price = product.fldProductPrice;
                            var created = product.fldProductCreated;
                            // var category = product.fldCategoryName;
                            var path = product.fldProductImagePath;

                            var quantity = product.fldProductQuantity;
                            var succeeding = product.fldProductSucceeding;
                            var buildPrice = '';
                            var buildSucceeding = 'Not applicable';
                            if (unit == 'hour') {
                                if (succeeding == 0) {
                                    buildPrice = '₱' + price + ' every ' + quantity + ' hour(s)';
                                } else {
                                    buildPrice = '₱' + price + ' for the first ' + quantity + ' hour(s)';
                                    buildSucceeding = succeeding + ' every succeeding hour';
                                }
                            } else if (unit == 'quantity') {
                                buildPrice = '₱' + price + ' each';
                            } else if (unit == 'piece') {
                                buildPrice = '₱' + price + ' per piece';
                            }

                            var build = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="panel panel-default contact-card card-view"> <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="' + uri + '/uploads/' + path + '" alt="' + name + '"/><strong id="productName' + id + '">' + name + '</strong></center></div>' +
                                '<div class="panel-body">' +
                                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark"> ' + description + '</span></div></div>' +
                                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money-check"></i> ' + buildPrice + '</span></div></div>' +
                                '<div class="user-others-details pl-15 pr-15"><div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span></div></div></div><div class="panel-footer"><a href="javascript:;" class="pull-left add-cart-product" data-id="' + id + '" data-succeeding="' + succeeding + '" data-price="' + price + '" style="margin-top:10px;"><small>Add to cart <i class="fas fa-cart-plus"></i></small></a> <input class="form-control form-control-sm pull-right" placeholder="Quantity" id="cartProduct' + id + '" type="number" style="width:60%" value="1"><div class="clearfix"></div></div></div></div>';

                            $('#category' + categoryId + '').append(build);

                            if (room != '') {
                                if (room == id) {
                                    var total = price;
                                    var valueSucceeding = 0;
                                    $('#tableCart').show();
                                    $('#tableEmpty').hide();

                                    if (succeeding == 0) {
                                        buildSucceeding = 'Not applicable';
                                        total = total * 1;
                                    } else {
                                        buildSucceeding = 'PHP ' + parseInt(succeeding) * (1 - 1);
                                        valueSucceeding = parseInt(succeeding) * (1 - 1);
                                    }

                                    // if (quantity <= 0 || quantity == '') {
                                    //     swal('Sorry!', 'Quantity cannot be less than or equal to zero', 'error');
                                    //     return;
                                    // }
                                    var name = $('#productName' + id).text();
                                    var build = '<tr id="tableProduct' + id + '" data-id="' + id + '" class="table-products"><td class="text-center"><a href="javascript:;" class="remove-row"><i class="far fa-trash-alt"></i></a></td><td>' + name + '</td><td class="text-center">x<span class="cart-quantity" data-value="1">1</span></td><td class="text-center">PHP <span class="cart-price" data-value="' + total + '">' + total + '</span></td><td class="text-center"><span class="cart-succeeding" data-value="' + valueSucceeding + '">' + buildSucceeding + '</span></td></tr>';

                                    if ($('#tableProduct' + id).length > 0) {
                                        $('#tableProduct' + id).find('.cart-quantity').text(quantity);
                                        $('#tableProduct' + id).find('.cart-price').text(total);
                                        $('#tableProduct' + id).find('.cart-succeeding').text(buildSucceeding);

                                        $('#tableProduct' + id).find('.cart-quantity').attr('data-value', quantity);
                                        $('#tableProduct' + id).find('.cart-price').attr('data-value', total);
                                        $('#tableProduct' + id).find('.cart-succeeding').attr('data-value', valueSucceeding);
                                    } else {
                                        $('#bodyCart tbody').append(build);
                                    }
                                    swal('Successful!', 'Item was added to the cart', 'success');

                                    computeTotal();

                                    $('.remove-row').off('click').click(function () {
                                        $(this).parent().parent().remove();
                                        computeTotal();

                                        if ($('#bodyCart tbody tr').length == 0) {
                                            $('#tableCart').hide();
                                            $('#tableEmpty').show();
                                        }
                                    });
                                }
                            }
                        });
                    } else {
                        console.log(result);
                    }

                });

            }
        } else {
            console.log(response);
        }
        $('a[data-toggle="tab"]').tab();
        $('#divChoices').show();

    });

    $('.add-cart').click(function () {
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var succeeding = $(this).attr('data-succeeding');
        var quantity = $('#cartPackage' + id).val();
        var total = price;
        var buildSucceeding = '';
        var valueSucceeding = 0;

        $('#tableCart').show();
        $('#tableEmpty').hide();

        if (succeeding == 0) {
            buildSucceeding = 'Not applicable';
            total = total * parseInt(quantity);
        } else {
            if (quantity > 1) {
                buildSucceeding = 'PHP ' + parseInt(succeeding) * (parseInt(quantity) - 1);
                valueSucceeding = parseInt(succeeding) * (parseInt(quantity) - 1);
            } else {
                buildSucceeding = 'No extra charges';
            }
        }

        if (quantity <= 0 || quantity == '') {
            swal('Sorry!', 'Quantity cannot be less than or equal to zero', 'error');
            return;
        }
        var name = $('#packageName' + id).text();
        var build = '<tr id="tablePackage' + id + '" data-id="' + id + '" class="table-package"><td class="text-center"><a href="javascript:;" class="remove-row"><i class="far fa-trash-alt"></i></a></td><td>' + name + '</td><td class="text-center">x<span class="cart-quantity" data-value="' + quantity + '">' + quantity + '</span></td></td><td class="text-center">PHP <span class="cart-price" data-value="' + total + '">' + total + '</span></td><td class="text-center"><span class="cart-succeeding" data-value="' + valueSucceeding + '">' + buildSucceeding + '</span></td></tr>';

        if ($('#tablePackage' + id).length > 0) {
            $('#tablePackage' + id).find('.cart-quantity').text(quantity);
            $('#tablePackage' + id).find('.cart-price').text(total);
            $('#tablePackage' + id).find('.cart-succeeding').text(buildSucceeding);

            $('#tablePackage' + id).find('.cart-quantity').attr('data-value', quantity);
            $('#tablePackage' + id).find('.cart-price').attr('data-value', total);
            $('#tablePackage' + id).find('.cart-succeeding').attr('data-value', valueSucceeding);
        } else {
            $('#bodyCart tbody').append(build);
        }

        swal('Successful!', 'Item was added to the cart', 'success');
        computeTotal();
        $('.remove-row').off('click').click(function () {
            $(this).parent().parent().remove();
            computeTotal();
            if ($('#bodyCart tbody tr').length == 0) {
                $('#tableCart').hide();
                $('#tableEmpty').show();
            }
        });

        // $('#modalCart').modal('show');
    });

    $('.add-cart-product').click(function () {
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var succeeding = $(this).attr('data-succeeding');
        var quantity = $('#cartProduct' + id).val();
        var total = price;
        var buildSucceeding = '';
        var valueSucceeding = 0;
        $('#tableCart').show();
        $('#tableEmpty').hide();

        if (succeeding == 0) {
            buildSucceeding = 'Not applicable';
            total = total * parseInt(quantity);
        } else {
            if (quantity > 1) {
                buildSucceeding = 'PHP ' + parseInt(succeeding) * (parseInt(quantity) - 1);
                valueSucceeding = parseInt(succeeding) * (parseInt(quantity) - 1);
            } else {
                buildSucceeding = 'No extra charges';
            }
        }

        if (quantity <= 0 || quantity == '') {
            swal('Sorry!', 'Quantity cannot be less than or equal to zero', 'error');
            return;
        }
        var name = $('#productName' + id).text();
        var build = '<tr id="tableProduct' + id + '" data-id="' + id + '" class="table-products"><td class="text-center"><a href="javascript:;" class="remove-row"><i class="far fa-trash-alt"></i></a></td><td>' + name + '</td><td class="text-center">x<span class="cart-quantity" data-value="' + quantity + '">' + quantity + '</span></td><td class="text-center">PHP <span class="cart-price" data-value="' + total + '">' + total + '</span></td><td class="text-center"><span class="cart-succeeding" data-value="' + valueSucceeding + '">' + buildSucceeding + '</span></td></tr>';

        if ($('#tableProduct' + id).length > 0) {
            $('#tableProduct' + id).find('.cart-quantity').text(quantity);
            $('#tableProduct' + id).find('.cart-price').text(total);
            $('#tableProduct' + id).find('.cart-succeeding').text(buildSucceeding);

            $('#tableProduct' + id).find('.cart-quantity').attr('data-value', quantity);
            $('#tableProduct' + id).find('.cart-price').attr('data-value', total);
            $('#tableProduct' + id).find('.cart-succeeding').attr('data-value', valueSucceeding);
        } else {
            $('#bodyCart tbody').append(build);
        }
        swal('Successful!', 'Item was added to the cart', 'success');

        computeTotal();

        $('.remove-row').off('click').click(function () {
            $(this).parent().parent().remove();
            computeTotal();

            if ($('#bodyCart tbody tr').length == 0) {
                $('#tableCart').hide();
                $('#tableEmpty').show();
            }
        });

        // $('#modalCart').modal('show');
    });

    var date = $('#txtStart').val();
    $('#calendar').fullCalendar({
        lazyFetching: true,
        events: function (start, end, timezone, callback) {
            var date = $('#txtStart').val();

            var data = {
                start: moment(start).format("YYYY-MM-DD"),
                end: moment(end).format("YYYY-MM-DD"),
                date: moment(date).format("YYYY-MM-DD"),
                type: 'client',
                user: userId
            };

            $.ajax({
                url: uri + "/api/book/calendar",
                dataType: "json",
                data: data,
                type: "POST"
            }).done(function (response) {
                callback(response);
            });
        },
        dayClick: function (date, jsEvent, view) {
            var today = moment();

            if (date.isSameOrBefore(today)) {
                swal('Sorry!', 'You must not select today and past dates.', 'error');
                return;
            }

            if (!IsDateHasEvent(date)) {
                $('#txtStart').val(date.format('MM/DD/YYYY'));
                $('#txtStartFront').val(date.format('MM/DD/YYYY'));
                $('#calendar').fullCalendar('refetchEvents');
            } else {
                swal({
                    title: 'Are you sure?',
                    text: 'There is an existing event this day, there is a high change you won\'t be approved.',
                    cancelButtonText: 'Okay, I\'ll find another day',
                    confirmButtonText: 'Yes, try my luck',
                    type: 'warning',
                    showCancelButton: true
                }).then(result => {
                    if (result) {
                        $('#txtStart').val(date.format('MM/DD/YYYY'));
                        $('#txtStartFront').val(date.format('MM/DD/YYYY'));
                        $('#calendar').fullCalendar('refetchEvents');
                    } else {

                    }
                });
                return;
            }



        }
        // eventClick: function (event, jsEvent, view) {
        //     // console.log(event);
        //     var available = event.available;
        //     var hospital = event.hospital;
        //     if (!available) {
        //         swal({
        //             title: "Sorry!",
        //             text: hospital + " is not using the system yet.",
        //             type: "info"
        //         });
        //         return;
        //     }

        //     var consultationId = event.consultation_id;
        //     var data = {
        //         date: event.start.format('YYYY-MM-DD'),
        //         id: consultationId
        //     };
        //     $('#divOccupied').html('');
        //     $.post(host + "/unicare/administrator/?api=true&entity=events&action=find-reservations", data)
        //         .done(function (response) {
        //             if (response == null) {
        //                 $('#divOccupied').append('<h4>Occupied hours: </h4><i class="text-muted">No occupied hours yet.</i><br><br>');
        //             } else {
        //                 reservations = response;
        //                 $('#divOccupied').append('<h4>Occupied hours: </h4>');
        //                 reservations.forEach(reservation => {
        //                     var start = reservation.start;
        //                     var end = reservation.end;
        //                     $('#divOccupied').append('<strong class="text-danger"><i class="far fa-clock"></i> ' + start + ' - ' + end + "</strong><br>");
        //                 });
        //                 $('#divOccupied').append('<br>');

        //             }
        //             $('#modalDetails').modal('show');
        //         });
        //     $('#txtStartTime').val(moment(event.start).format('hh:mm A'));
        //     $('#txtEndTime').val(moment(event.start).add(1, 'hours').format('hh:mm A'));
        //     $('#txtStartTime').timepicker('remove');
        //     $('#txtStartTime').timepicker({
        //         defaultTime: moment(event.start).format('hh:mma'),
        //         minTime: moment(event.end).format('hh:mma'),
        //         maxTime: moment(event.start).add(1, 'hours').format('hh:mm A'),
        //         autoclose: true,
        //         icons: {
        //             up: 'mdi mdi-chevron-up',
        //             down: 'mdi mdi-chevron-down'
        //         },
        //         minuteStep: 60
        //     }).on('changeTime.timepicker', function (e) {
        //         var h = e.time.hours;
        //         var m = e.time.minutes;
        //         var mer = e.time.meridian;
        //         if (m.length == 1) {
        //             m = m + "0";
        //         }
        //         $('#txtEndTime').val(moment(h + ":" + m + " " + mer, "hh:mm A").add(1, 'hours').format('h:mm A'));
        //     });

        //     $('#btnSchedule').attr('data-start', moment(event.start).format('hh:mm A'));
        //     $('#btnSchedule').attr('data-end', moment(event.end).format('hh:mm A'));
        //     $('#btnSchedule').attr('data-id', consultationId);
        //     $('#btnSchedule').attr('data-date', event.start.format('YYYY-MM-DD'));
        //     // .on('changeTime.timepicker', function (e) {
        //     //     var h = parseInt(moment(e.time.hours).format('HH'));
        //     //     var m = parseInt(moment(e.time.minutes).format('mm'));
        //     //     var mer = e.time.meridian;
        //     //     //convert hours into minutes
        //     //     m += h * 60;
        //     //     hours = parseInt(moment(event.start).format('HH'));
        //     //     minutes = parseInt(moment(event.start).format('mm'));
        //     //     minutes += hours * 60;

        //     //     console.log(minutes);
        //     //     console.log(m);
        //     //     //10:15 = 10h*60m + 15m = 615 min
        //     //     if (m < minutes) {
        //     //         $('#timepicker').timepicker('setTime', moment(event.start).format('hh:mma'));
        //     //     }
        //     // });

        //     $('#divConsultation').html('<br>Consultation time: <strong><i class="far fa-clock"></i> ' + moment(event.start).format('hh:mm A') + ' - ' + moment(event.end).format('hh:mm A') + "</strong>");

        // }

    });

    if (date != '') {
        $('#calendar').fullCalendar('gotoDate', moment(date));
    }


    $('#btnCheckout').click(function () {
        var total = 0;
        var start = $('#txtStart').val();

        if (start == null || start == '') {
            swal('Sorry!', 'Please select a date.', 'info');
            return;
        }

        $('#bodyCart tbody tr').each(function () {
            var price = $(this).find('.cart-price').attr('data-value');
            var succeeding = $(this).find('.cart-succeeding').attr('data-value');
            console.log(price);
            console.log(succeeding);
            var subtotal = parseInt(price) + parseInt(succeeding);

            total = total + subtotal;
        });

        if (total == 0) {
            swal('Sorry!', 'Please select an item.', 'info');
            return;
        }
        var products = $('.table-products').map(function () {
            var id = $(this).attr('data-id');
            var quantity = $(this).find('.cart-quantity').attr('data-value');
            var values = {
                id: id,
                quantity: quantity
            };
            return values;
        }).get();

        var packages = $('.table-package').map(function () {
            var id = $(this).attr('data-id');
            var quantity = $(this).find('.cart-quantity').attr('data-value');
            var values = {
                id: id,
                quantity: quantity
            };
            return values;
        }).get();
        var data = {
            total: total,
            products: products,
            packages: packages,
            start: moment(start).format('YYYY-MM-DD'),
            end: moment(start).add('days', 1).format('YYYY-MM-DD'),
            user: userId
        };

        console.log(data);
        $.post(uri + '/api/book', data)
            .done(function (response) {
                if (response.code == 200) {
                    swal({
                        title: 'Successful!',
                        text: 'Booking has been sent to the admin! An e-mail will be sent to you once the booking has been approved and will contain the instructions on how to pay the reservation.',
                        type: 'success'
                    }).then(result => {
                        location.href = host + '/resort/site/?page=view';
                    });
                } else {
                    console.log(response);
                }
            });
    });


});

function computeTotal() {
    var total = 0;
    $('#bodyCart tbody tr').each(function () {
        var price = $(this).find('.cart-price').attr('data-value');
        var succeeding = $(this).find('.cart-succeeding').attr('data-value');
        console.log(price);
        console.log(succeeding);
        var subtotal = parseInt(price) + parseInt(succeeding);

        total = total + subtotal;
    });
    $('#cartTotal').attr('data-value', total);
    $('#cartTotal').html('PHP ' + total);
}

function IsDateHasEvent(date) {
    var allEvents = [];
    allEvents = $('#calendar').fullCalendar('clientEvents');
    var event = $.grep(allEvents, function (v) {
        return +v.start === +date;
    });
    return event.length > 0;
}
$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    initData(uri);
    $('#calendar').fullCalendar({
        lazyFetching: true,
        events: function (start, end, timezone, callback) {
            var data = {
                start: moment(start).format("YYYY-MM-DD"),
                end: moment(end).format("YYYY-MM-DD"),
            };

            $.ajax({
                url: uri + "/book/calendar/management",
                dataType: "json",
                data: data,
                type: "POST"
            }).done(function (response) {
                callback(response);
            });
        },
        eventClick: function (event, jsEvent, view) {
            var id = event.id;
            var date = moment(event.start).format('YYYY-MM-DD');
            var data = {
                id: id
            };

            $('#txtHiddenId').val(id);
            $('#txtHiddenCustomerId').val('');
            $('#btnApprove').removeAttr('disabled');
            $('#btnDecline').removeAttr('disabled');

            $('#divDetails').html('');
            $('#divPackages').html('');
            $('#divProducts').html('');
            $.post(uri + "/book/details", data)
                .done(function (response) {
                    if (response.code == 404) {
                        $('#divDetails').append('<i class="text-muted">No details available.</i><br><br>');
                    } else {
                        details = response.data;
                        reservation = details.booking;
                        customer = reservation.fldCustomerFirstname + ' ' + reservation.fldCustomerLastname;
                        start = reservation.fldBookingStart;
                        end = reservation.fldBookingEnd;
                        email = reservation.fldCustomerEmail;
                        mobile = reservation.fldCustomerMobile;
                        approved = reservation.fldBookingApproved;
                        paid = reservation.fldBookingPaid;
                        customerId = reservation.fldCustomerId;
                        removed = reservation.fldBookingDeleted;

                        packages = details.packages;
                        products = details.products;

                        if(packages.length == 0) {
                            $('#divPackages').html('<div class="alert alert-danger">No packages included.</div>');
                        } else {
                            packages.forEach(package => {
                                var packageName = package.fldPackageName;
                                var build = '<label class="badge badge-default">'+packageName+'</label> ';
                                $('#divPackages').append(build);
                            });
                        }

                        if(products.length == 0) {
                            $('#divProducts').html('<div class="alert alert-danger">No products included.</div>');
                        } else {
                            products.forEach(product => {
                                var productName = product.fldProductName;
                                var build = '<label class="badge badge-default">'+productName+'</label> ';
                                $('#divProducts').append(build);
                            });
                        }

                        $('#txtHiddenCustomerId').val(customerId);

                        badge = "";
                        if (paid == 1) {
                            $('#btnApprove').attr('disabled', 'disabled');
                            $('#btnDecline').attr('disabled', 'disabled');
                            badge = '<label class="badge badge-success float-right">Paid</label>';
                        } else if (approved == 1) {
                            $('#btnApprove').attr('disabled', 'disabled');
                            $('#btnDecline').attr('disabled', 'disabled');
                            badge = '<label class="badge badge-secondary float-right">Approved</label>';
                        } else if(removed == 1) {
                            $('#btnApprove').attr('disabled', 'disabled');
                            $('#btnDecline').attr('disabled', 'disabled');
                            badge = '<label class="badge badge-danger float-right">Declined</label>';
                        }

                        $('#divDetails').append('<h5>Customer: ' + badge + '</h5>');
                        $('#divDetails').append('<i class="fa fa-user"></i> ' + customer + '<br>');
                        $('#divDetails').append('<div class="row"><div class="col-md-6"><i class="fa fa-clock-o"></i> ' + start + '</div> <div class="col-md-6"><i class="fa fa-clock-o"></i> ' + end + '</div> </div>');
                        $('#divDetails').append('<div class="row"><div class="col-md-6"><i class="fa fa-envelope-o"></i> ' + email + '</div> <div class="col-md-6"><i class="fa fa-phone"></i> ' + mobile + '</div> </div><br>');


                    }
                    $('#modalDetails').modal('show');
                });

        }
    });

    $('#btnApprove').click(function () {
        var id = $('#txtHiddenId').val();

        var toast = $.toast({
            heading: 'Heads up!',
            allowToastClose: false,
            showHideTransition: 'slide',
            text: 'The system is sending an e-mail, please do not refresh, close the page or navigate to other pages.',
            position: 'top-right',
            loaderBg: '#3b98b5',
            icon: 'info',
            hideAfter: false,
            stack: 10
        });

    

        var customer = $('#txtHiddenCustomerId').val();
        var booking = $('#txtHiddenId').val();
        var data = {
            id: customer,
            booking: booking
        };
        $('#modalDetails').modal('hide');
        $.post(uri + "/messages/approve", data)
            .done(function (response) {
                if (response.code == 200) {
                    setTimeout(function () {
                        toast.reset();
                    }, 2000);

                    $.toast({
                        heading: 'Success!',
                        text: response.message,
                        showHideTransition: 'slide',
                        position: 'top-right',
                        loaderBg: '#3b98b5',
                        icon: 'success',
                        hideAfter: 5000,
                        stack: 10
                    });


                    var data = {
                        id: id,
                        action: 'approve'
                    };

                    $.post(uri + "/book/transact", data)
                        .done(function (response) {
                            if (response.code == 200) {
                                $('#modalDetails').modal('hide');
                                swal({
                                    title: "Success!",
                                    text: "Booking has been approved.",
                                    type: "success"
                                }).then(result => {
                                    $('#calendar').fullCalendar('refetchEvents');
                                });
                            } else {
                                console.log(response);
                            }
                        });
                } else if (response.code == 400) {
                    setTimeout(function () {
                        toast.reset();
                    }, 2000);

                    $.toast({
                        heading: 'Sorry!',
                        text: response.message,
                        showHideTransition: 'slide',
                        position: 'top-right',
                        loaderBg: '#3b98b5',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 10
                    });
                } else {
                    console.log(response);
                }
            });


    });

    $('#btnDecline').click(function () {
        var id = $('#txtHiddenId').val();

        var toast = $.toast({
            heading: 'Heads up!',
            allowToastClose: false,
            showHideTransition: 'slide',
            text: 'The system is sending an e-mail, please do not refresh, close the page or navigate to other pages.',
            position: 'top-right',
            loaderBg: '#3b98b5',
            icon: 'info',
            hideAfter: false,
            stack: 10
        });

    

        var customer = $('#txtHiddenCustomerId').val();
        var booking = $('#txtHiddenId').val();
        var data = {
            id: customer,
            booking: booking
        };
        $('#modalDetails').modal('hide');
        $.post(uri + "/messages/decline", data)
            .done(function (response) {
                if (response.code == 200) {
                    setTimeout(function () {
                        toast.reset();
                    }, 2000);

                    $.toast({
                        heading: 'Success!',
                        text: response.message,
                        showHideTransition: 'slide',
                        position: 'top-right',
                        loaderBg: '#3b98b5',
                        icon: 'success',
                        hideAfter: 5000,
                        stack: 10
                    });


                    var data = {
                        id: id,
                        action: 'decline'
                    };

                    $.post(uri + "/book/transact", data)
                        .done(function (response) {
                            if (response.code == 200) {
                                $('#modalDetails').modal('hide');
                                swal({
                                    title: "Success!",
                                    text: "Booking has been declined.",
                                    type: "success"
                                }).then(result => {
                                    $('#calendar').fullCalendar('refetchEvents');
                                });
                            } else {
                                console.log(response);
                            }
                        });
                } else if (response.code == 400) {
                    setTimeout(function () {
                        toast.reset();
                    }, 2000);

                    $.toast({
                        heading: 'Sorry!',
                        text: response.message,
                        showHideTransition: 'slide',
                        position: 'top-right',
                        loaderBg: '#3b98b5',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 10
                    });
                } else {
                    console.log(response);
                }
            });


    });

    

});

function initData(uri) {
    $('#tableCategories tbody').html('');
    $.get(uri + '/categories')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tableCategories")) {
                $('#tableCategories').DataTable().clear().destroy();
            }
            categories = response.data;
            categories.forEach(category => {
                var id = category.fldCategoryId;
                var name = category.fldCategoryName;
                var created = category.fldCategoryCreated;
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td id="categoryName' + id + '">' + name + '</td>' +
                    '<td>' + created + '</td>' +
                    '<td><a href="javascript:void(0)" class="text-inverse pr-10 edit-category" title="Edit" data-toggle="tooltip" data-id="' + id + '"><i class="zmdi zmdi-edit txt-warning"></i></a><a href="javascript:void(0)" class="text-inverse delete-category" title="Delete" data-toggle="tooltip" data-id="' + id + '"><i class="zmdi zmdi-delete txt-danger"></i></a></td>' +
                    '</tr>';

                $('#tableCategories tbody').append(build);
            });

            $('a[data-toggle="tooltip"]').tooltip();
            $("#tableCategories").dataTable();
            $('.delete-category').click(function () {
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
                        $.post(uri + '/categories/delete', data)
                            .done(function (response) {
                                if (response.code == 200) {
                                    swal('Successful!', 'Category was successfully deleted.', 'success').then(result => {
                                        initData(uri);
                                    });
                                } else {
                                    console.log(response);
                                }
                            });
                    }
                });
            });

            $('.edit-category').click(function () {
                var id = $(this).attr('data-id');
                var name = $('#categoryName' + id).text();
                $('#btnSave').attr('data-id', id);
                $('#txtEditName').val(name);
                $('#modalEdit').modal('show');
            });
        });


}

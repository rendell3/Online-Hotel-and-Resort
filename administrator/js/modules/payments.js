$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    initData(uri);

});

function initData(uri) {
    $('#tablePayments tbody').html('');
    $.get(uri + '/payments')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tablePayments")) {
                $('#tablePayments').DataTable().clear().destroy();
            }
            payments = response.data;
            payments.forEach(payment => {
                var id = payment.fldBookingPaymentId;
                var amount = payment.fldBookingPaymentAmount;
                var total = payment.fldBookingTotal;
                total = parseFloat(total).toFixed(2);
                if(amount != total) {
                    amount = amount + ' <label class="label label-danger">Half paid</label>';
                } else {
                    amount = amount + ' <label class="label label-success">Fully paid</label>';
                }
                var name = payment.fldCustomerFirstname + ' ' + payment.fldCustomerLastname;
                var reservation = payment.fldBookingId;
                var start = payment.fldBookingStart;
                var end = payment.fldBookingEnd;
                var created = payment.fldBookingPaymentCreated;
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td id="booking' + id + '">' + name + '</td>' +
                    '<td>' + amount + '</td>' +
                    '<td>' + total + '</td>' +
                    '<td>' + reservation + '</td>' +
                    '<td>' + start + ' <i class="fa fa-arrow-right"></i> ' + end + '</td>' +
                    '<td>' + created + '</td>' +
                    '</tr>';

                $('#tablePayments tbody').append(build);
            });

            $('a[data-toggle="tooltip"]').tooltip();
            $("#tablePayments").dataTable();
        });


}

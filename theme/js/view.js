// window.amount = null;
// window.booking = null;
$(function () {
    // var protocol = location.protocol;
    // var host = protocol + "//" + window.location.host;
    // var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    // var url = window.location.href;
    // var uri = host;
    // uri = "http://localhost:9000";

    // var id = $('#txtHiddenId').val();

    // var data = {
    //     id: id
    // };

    // var handler = StripeCheckout.configure({
    //     key: 'pk_test_d8lo7dLyxA3FRYpgl4ggyheG',
    //     image: '/resort/site/misc/logo.png',
    //     locale: 'auto',
    //     token: function(token) {
    //         swal({
    //             title: 'Please wait',
    //             text: 'We are currently processing your payment.',
    //             type: 'info',
    //             showConfirmButton:false
    //         });
    //         var data = {
    //             stripeToken: token,
    //             amount: window.amount,
    //             user: id,
    //             booking: window.booking
    //         };
    //         $.post(uri + "/api/book/payment", data)
    //             .done(function (response) {
    //                 if (response.code == 200) {
    //                     swal('Success!','Payment has been made!', 'success')
    //                         .then(result => {
    //                             location.reload();
    //                         });
    //                 }
    //             });
    //         console.log(token);
    //       // You can access the token ID with `token.id`.
    //       // Get the token ID to your server-side code for use.
    //     }
    //   });
      
    //   // Close Checkout on page navigation:
    //   window.addEventListener('popstate', function() {
    //     handler.close();
    //   });

    // $.post(uri + "/api/book/user", data)
    //     .done(function (response) {
    //         if (response.code == 200) {
    //             $('#tableBookings tbody').html('');

    //             var details = response.data;
    //             if(details.length == 0) {
    //                 $('#tableBookings').parent().html('<h3 class="text-muted">No reservations yet.</h3><a class="btn btn-warning" href="?page=book">Return to appointments</a><br><br>');
    //                 return;
    //             }
    //             var email = response.email

    //             details.forEach(detail => {
    //                 var booking = detail.booking;
    //                 var packages = detail.packages;
    //                 var products = detail.products;

    //                 var start = booking.fldBookingStart;
    //                 var end = booking.fldBookingEnd;
    //                 var total = booking.fldBookingTotal;
    //                 var bookingId = booking.fldBookingId;
    //                 var half = total / 2;
    //                 half = half.toFixed(2);
    //                 console.log(half);

    //                 var paid = booking.fldBookingPaid;
    //                 var approved = booking.fldBookingApproved;
    //                 var buttons = '<button class="btn btn-danger btn-block" disabled>Unapproved</button>';
    //                 var status = '<strong>Pending</strong>';
    //                 if(paid == 1) {
    //                     buttons = '<button class="btn btn-success btn-block" disabled>Paid</button>';
    //                     status = '<strong>Paid</strong>';
    //                 } else if(approved == 1) {
    //                     buttons = '<button class="btn btn-warning btn-block btn-pay" data-amount="'+half+'" data-booking="'+bookingId+'" data-total="'+total+'" data-email="'+email+'">Pay half</button><button class="btn btn-warning btn-block btn-pay" data-amount="'+parseFloat(total).toFixed(2)+'" data-booking="'+bookingId+'" data-total="'+total+'" data-email="'+email+'">Pay full</button>';
    //                     // buttons = '<form action="/charge" method="POST"> <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_d8lo7dLyxA3FRYpgl4ggyheG" data-image="/resort/site/misc/logo.png" data-name="Greenfields Paradise Resort" data-email="'+email+'" data-description="Reservation (PHP '+total+')" data-amount="'+half+'00" data-currency="php"></script></form>';
    //                     status = '<strong>Approved (Waiting for payment)</strong>';
    //                 }

    //                 var build = '<tr><td class="text-center">'+buttons+'</td><td>'+start+'</td><td>'+end+'</td>';

    //                 if(packages == null) {
    //                     build = build + '<td>No packages</td>';
    //                 } else {
    //                     build = build + '<td>';
    //                     packages.forEach(package => {
    //                         var packageName = package.fldPackageName;
    //                         build = build + '<label class="label label-default">'+packageName+'</label> ';
    //                     });
    //                     build = build + '</td>';
    //                 }

    //                 if(products == null) {
    //                     build = build + '<td>No products</td>';
    //                 } else {
    //                     build = build + '<td>';
    //                     products.forEach(product => {
    //                         var productName = product.fldProductName;
    //                         build = build + '<label class="label label-default">'+productName+'</label> ';
    //                     });
    //                     build = build + '</td>';
    //                 }
    //                 build = build + '<td>PHP '+total+'</td>';
    //                 build = build + '<td>'+status+'</td>';
    //                 build = build + '</tr>';

    //                 $('#tableBookings tbody').append(build);
    //             });

    //             $('.btn-pay').click(function () {
    //                 var total = $(this).attr('data-total');
    //                 var amount = $(this).attr('data-amount');
    //                 var email = $(this).attr('data-email');
    //                 var bookingId = $(this).attr('data-booking');
    //                 window.booking = bookingId;
    //                 window.amount = amount;
    //                 amount = parseFloat(amount);
    //                 amount = parseFloat(amount+'00');
    //                 handler.open({
    //                     name: 'Greenfields Paradise Resorte',
    //                     description: 'Reservation (PHP '+total+')',
    //                     currency: 'php',
    //                     amount: amount,
    //                     email: email
    //                   });
    //             });

    //         } else {
    //             console.log(response)
    //         }
    //     });

  


});

// function isFloat(n){
//     return Number(n) === n && n % 1 !== 0;
// }
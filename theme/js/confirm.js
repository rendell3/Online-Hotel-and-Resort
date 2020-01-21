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

    // $.post(uri + "/api/messages/pin", data)
    //     .done(function (response) {
    //         if (response.code == 200) {

    //         } else {
    //             console.log(response)
    //         }
    //     });

    // $('#btnSubmit').click(function () {
    //     var pin = $('#txtPin').val();
    //     var id = $('#txtHiddenId').val();

    //     var data = {
    //         id: id,
    //         pin: pin
    //     };
    //     $('#divError').html('');
    //     $.post(uri + "/api/users/verify", data)
    //         .done(function (response) {
    //             if (response.code == 200) {
    //                 session = {
    //                     id: data.id,
    //                     role: 'Customer'
    //                 };
    //                 $.post('/resort/site/theme/pages/session.php', session)
    //                     .done(function (response) {
    //                         if (response == "success") {
    //                             swal({
    //                                 title: "Success!",
    //                                 text: "Account has been verified.",
    //                                 type: "success"
    //                             }).then(result => {
    //                                 location.href = host + "/resort/site";
    //                             });
    //                         } else {
    //                             console.log(response);
    //                         }
    //                     });

    //             } else if (response.code == 400) {
    //                 $('#divError').html('<div class="alert alert-danger">' + response.message + '</div>');
    //                 // console.log(response)
    //             } else {
    //                 console.log(response)
    //             }
    //         });
    // });

    // $('#btnResend').click(function () {
    //     var id = $('#txtHiddenId').val();

    //     var data = {
    //         id: id
    //     };
    //     swal({
    //         title: "Sending an e-mail!",
    //         text: "Please wait...",
    //         type: "info",
    //         showConfirmButton: false
    //     });
    //     $.post(uri + "/api/messages/pin", data)
    //         .done(function (response) {
    //             if (response.code == 200) {
    //                 swal({
    //                     title: "Success!",
    //                     text: "An e-mail has been sent.",
    //                     type: "success"
    //                 });
    //             } else {
    //                 console.log(response)
    //             }
    //         });
    // });

});
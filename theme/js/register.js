$(document).ready(function(){
    $(".loader").hide();
    $(".loaderLogin").hide();
    $('.btnRegister').click(function () {
        $(".loader").show();
        var firstname = $('#txtFirstname').val();
        var lastname = $('#txtLastname').val();
        var email = $('#txtEmail').val();
        var contact = $('#txtMobile').val();
        var password = $('#txtRegisterPassword').val();
        var confirm = $('#txtConfirmPassword').val();
        // $('#divRegisterError').html('');
        var data = {
            firstname: firstname,
            lastname: lastname,
            email: email,
            mobile: contact,
            password: password,
            confirm:confirm
        };
        $.ajax({
                url: "userprograms/register.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".results").html(result);
                $(".loader").hide();
         }});
    // console.log(data);
    //     $.post(uri + '/api/users/register', data)
    //         .done(function (response) {
    //             if (response.status == "success") {
    //                 if(response.code == 409) {
    //                     $('#divRegisterError').html('<div class="alert alert-danger">'+response.message+'</div>');
    //                 } else if(response.code == 200) {
    //                     location.href = host + "/resort/site?page=confirm&id=" + response.id;
    //                 }
                    
    //             } else {
    //                 console.log(response);
    //             }
    //         });
    });
});
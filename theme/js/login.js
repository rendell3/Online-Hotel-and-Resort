$(document).ready(function(){
$(".loaderLogin").hide();
    $('.btnLogin').click(function () {
        $(".loaderLogin").show();
        var username = $('#txtUsername').val();
        var password = $('#txtPassword').val();
       
        var data = {
            username: username,
            password: password
        };
        $.ajax({
                url: "userprograms/login.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".results").html(result);
                $(".loaderLogin").hide();
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
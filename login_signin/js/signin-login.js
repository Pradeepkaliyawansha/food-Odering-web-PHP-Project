$(document).ready(function(){
    $('#login-eye-slash').click(function(){

        
            $('#login-password').attr('type','text');
            $('#login-eye').css("display","block");
            $('#login-eye-slash').css("display","none");

        
            // $('#login-password').attr('type', 'password');
        
    });
    $('#login-eye').click(function(){
        $('#login-password').attr('type','password');
        $('#login-eye').css("display","none");
        $('#login-eye-slash').css("display","block");

    });

<<<<<<< HEAD:food/login_signin/js/signin.js
    $('#btn_btn').click(()=>{
        alert('Hey');
    })

});
=======
});

>>>>>>> 87ea621d35a24aaf092bd31379e48f5ae20c7e74:food/login_signin/js/signin-login.js

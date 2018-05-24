<?php
include 'jqm_header.php';

?>
<body>
    <div data-role="page" id="page">
        <div data-role="header" data-theme="c">
            <h1>Car Trading</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Password Reset</h3>
            <label for="txt-email">Enter your email address</label>
            <input type="email" name="email" id="email" value="khalil@gmail.com">
            <a onclick="reset()" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>
            <div data-role="popup" id="pwd-reset-sent" data-dismissible="false" style="max-width:400px;">
                <div data-role="header">
                    <h1>Password Reset</h1>
                </div>
                <div role="main" id="ok-msg" class="ui-content">
                    <h3>Check Your Inbox</h3>
                    <p>We sent you an email with instructions on how to reset your password. Please check your inbox and follow the instructions in the email.</p>
                    <div class="mc-text-center"><a onclick="reset()" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
            
            <div data-role="popup" id="invalid_email" data-dismissible="true" style="max-width:400px;">
                <div data-role="header">
                    <h1>Invalid Email</h1>
                </div>
                <div role="main" id="ok-msg" class="ui-content">
                    <h3>You Entered an Invalid Email</h3>
                    
                    <div class="mc-text-center"><a onclick=' $("#invalid_email").popup("close");' class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
            
            <div data-role="popup" id="no-email" data-dismissible="true" style="max-width:400px;">
                <div data-role="header">
                    <h1>Email Not Existed</h1>
                </div>
                <div role="main" id="ok-msg" class="ui-content">
                    <h3>Email is not existed</h3>
                    
                    <div class="mc-text-center"><a onclick=' $("#no-email").popup("close");' class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
            
            
        </div><!-- /content -->
    </div><!-- /page -->
</body>

<script>


 function reset() {


    
      //  setTimeout(function(){  $("#pwd-reset-sent").popup("open"); }, 100);
                   
        $.postJSON("reset_password", {'email':$("#email").val()}, function (data) {
               alert(data.msg);
               
           // alert(data.msg)
            if(data.msg=='1')
                window.location = 'end_reset_password';
            else if(data.msg==3){
                $("#invalid_email").popup("open");
            }else if(data.msg==4){
                $("#no-email").popup("open");
            }
            
            else{
                alert(data.msg);

            }

        })



           
       

   

       // $("#pwd-reset-sent").popup("close");
    }

</script>
</html>

<?php
include 'jqm_header.php';


?>

<body>
    <div data-role="page" id="signup">
        <div data-role="header" data-theme="c">
            <h1>Car Trading</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Sign Up</h3>

            <form id="signupform" name="signupform" action="signUp" method="post" class="ui-body ui-body-a ui-corner-all" data-ajax="false">
            <div id="ctn-err" class="bi-invisible"></div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="Hafed">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="Mustafa">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="hafed@email.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="hafed">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password2" id="password2" value="hafed">
            <!--<a href="#dlg-sign-up-sent" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>-->

            <button type="submit" data-theme="b" name="submit" value="submit-value">Submit</button>

                <div data-role="popup" id="missed-data" data-dismissible="false" style="max-width:400px;">
                    <div data-role="header">
                        <h1>Missed Data</h1>
                    </div>
                    <div role="main" class="ui-content">
                        <h3>Confirm Your Email Address</h3>
                        <p>We sent you an email with instructions on how to confirm your email address. Please check your inbox and follow the instructions in the email.</p>
                        <div class="mc-text-center"><a href="sign-in.php" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>

                    </div>
                </div>

            
            
                <div data-role="popup" id="email_existed" data-dismissible="true" style="max-width:400px;">
                    <div data-role="header">
                        <h1 style="color:red;;width: 100%;margin: 0px">Email Already Existed</h1>
                    </div>
                    <div role="main" class="ui-content">
                        <h3>Email you entered is existed</h3>
                        <p></p>
                        <div class="mc-text-center"><a href="signIn" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">Sign In</a></div>
                        <center><span style="text-align: center">OR</span></center>
                        <div class="mc-text-center"><a href="reset_password" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">Reset Password</a></div>

                    </div>
                </div>


                <div data-role="popup" id="sign-up-sent" data-dismissible="false" style="max-width:400px;">
                <div data-role="header">
                    <h1>Almost done...</h1>
                </div>
                <div role="main" class="ui-content">
                    <h3>Confirm Your Email Address</h3>
                    <p>We sent you an email with instructions on how to confirm your email address. Please check your inbox and follow the instructions in the email.</p>
                    <div class="mc-text-center"><a href="signIn" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>

                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page -->
    
</body>

<script>



    $('#signupform').validate({
        rules: {
            first_name: {
                required: true,

            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email:true

            },
            password: {
                required: true
            },
            password2: {
                required: true,
                equalTo: password
            }

        },

        messages: {
            first_name: {
                required: "Please enter your first name."
            },
            last_name: {
                required: "Please enter your last name."
            },
            email: {
                required: "Please enter your email.",
            //    email : messages.email

            },
            password: {
                required: "Please enter your password."
            },
            password2: {
                required: "Please confirm your password.",
                equalTo : "Please  enter the same password"

            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().prev());
        }
        ,
        submitHandler: function (form) {
            form.submit();
        /*   $(':mobile-pagecontainer').pagecontainer('change', '#success', {
                reload: false
            });
            */
            return false;
        }
    });

</script>

<script>


//alert(<?php isset($popup)? print $popup:print "0"?>);
  
    if(<?php isset($popup)? print $popup:print "0"?>==1)
    {


        $(document).on("pagecreate","#signup", function(){


            setTimeout(function(){  $("#sign-up-sent").popup("open"); }, 100);

        });


    }
    
    if(<?php isset($popup)? print $popup:print "0"?>==2)
    {
            $(document).on("pagecreate","#signup", function(){


            setTimeout(function(){  $("#email_existed").popup("open"); }, 100);

        });


    }
</script>
</html>

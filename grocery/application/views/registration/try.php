<?php
include 'jqm_header.php';

?>


<body>
    <div data-role="page" id="page-signup">
        <div data-role="header" data-theme="c">
            <h1>Book It</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Sign Up</h3>
            // name="signupform" action="signUp" method="post" class="ui-body ui-body-a ui-corner-all" data-ajax="false"
            <form id="signupform">
            <div id="ctn-err" class="bi-invisible"></div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="">
            <label for="email_address">Email Address</label>
            <input type="text" name="email" id="email" value="">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password2" id="password2" value="">
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



                <div data-role="popup" id="dlg-sign-up-sent" data-dismissible="false" style="max-width:400px;">
                <div data-role="header">
                    <h1>Almost done...</h1>
                </div>
                <div role="main" class="ui-content">
                    <h3>Confirm Your Email Address</h3>
                    <p>We sent you an email with instructions on how to confirm your email address. Please check your inbox and follow the instructions in the email.</p>
                    <div class="mc-text-center"><a href="sign-in.php" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>

                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page -->
</body>

<script>

    $('#signupform').validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true
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
                required: "Please enter your email."
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().prev());
        }
        ,
        submitHandler: function (form) {
        /*    $(':mobile-pagecontainer').pagecontainer('change', '#success', {
                reload: false
            });
            */
            return false;
        }
    });

</script>
</html>

<?php
include 'jqm_header.php';


?>

<body>
<div data-role="page" id="updateinfo">
    <div data-role="header" data-theme="c">
        <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        <h1>Car Trading</h1>
    </div><!-- /header -->
    <div role="main" class="ui-content">
        <h3>Update Info</h3>

        <form id="updateProfile" name="updateProfile" action="../updateProfile" method="get" class="ui-body ui-body-a ui-corner-all" data-ajax="false">
            <div id="ctn-err" class="bi-invisible"></div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?php print $cust->first_name?>">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="<?php print $cust->last_name?>">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="<?php print $cust->email?>">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?php print $cust->address?>">
            <label for="phone">Phone no</label>
            <input type="tel" name="phone" id="phone" value="<?php print $cust->phone?>">
            <!--<a href="#dlg-sign-up-sent" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>-->

            <button type="submit" data-theme="b" name="submit" value="submit-value">Update</button>

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


            <div data-role="popup" id="infoUpdated" data-dismissible="false" style="max-width:400px;">
                <div data-role="header">
                    <h1>Info Updated</h1>
                </div>
                <div role="main" class="ui-content">
                    <h3>Your inforamtion has updated</h3>

                    <div class="mc-text-center"><a href="<?php print base_url()?>Homepage/" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>

                </div>
            </div>
        </form>
<!--        <a href="--><?php //print base_url()?><!--/index.php">asdfasdf</a>-->
    </div><!-- /content -->
</div><!-- /page -->

</body>

<script>



    $('#updateProfile').validate({
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
            address: {
                required: true
            },
            phone: {
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
                required: "Please enter your email.",
                //    email : messages.email

            },
            address: {
                required: "Please enter your address."
            },
            phone: {
                required: "Please confirm your phone no."


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

    if(<?php isset($res)? print $res:print "0"?>==1)
    {


        $(document).on("pagecreate","#updateinfo", function(){


            setTimeout(function(){  $("#infoUpdated").popup("open"); }, 100);

        });


    }

    if(<?php isset($popup)? print $popup:print "0"?>==2)
    {
        $(document).on("pagecreate","#updateProfile", function(){


            setTimeout(function(){  $("#email_existed").popup("open"); }, 100);

        });


    }
</script>
</html>

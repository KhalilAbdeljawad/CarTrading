<?php
//var_dump($popup);
include 'jqm_header.php';

?>


<body>
    <div data-role="page" data-bookit-page="signIn" id="signin">
        <div data-role="header" data-theme="c">
            <h1>Car Trading</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">

            <h3>Sign In</h3>
            <form id="signinform" action="signin" method="post" class="ui-body ui-body-a ui-corner-all" data-ajax="false">
            <label for="txt-email">Email Address</label>
            <input type="text" name="email" id="email" value="">
            <label for="txt-password">Password</label>
            <input type="password" name="password" id="password" value="">
            <fieldset data-role="controlgroup">
                <input type="checkbox" name="rememberme" id="rememberme" >
                <label for="rememberme">Remember me</label>
            </fieldset>
                <button type="submit" data-theme="b" name="submit" value="submit-value">Submit</button>


            </form>
            <p class="mc-top-margin-1-5"><a href="reset_password">Can't access your account?</a></p>

            <div  data-role="popup" id="dlg-invalid-credentials" data-dismissible="false" style="max-width:400px;">
                <div role="main" class="ui-content">
                    <h3 class="mc-text-danger">Login Failed</h3>
                    <p>Did you enter the right credentials?</p>
                    <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page -->

    <script>


        <?php
        if(isset($popup))
        ;//    print 'alert("'.$popup.'")';
        ?>


        if(<?php isset($popup)? print $popup:print "0"?>==1)
        {


            $(document).on("pagecreate","#signin", function(){


                   setTimeout(function(){  $("#dlg-invalid-credentials").popup("open"); }, 100);

            });


        }
    </script>
</html>

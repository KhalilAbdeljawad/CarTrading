<?php
include 'jqm_header.php';

?>


<body>
    <div data-role="page" data-bookit-page="signIn">
        <div data-role="header" data-theme="c">
            <h1>Book It</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">

            <h3>Sign In</h3>
            <form id="signinform" action="signin" method="post" class="ui-body ui-body-a ui-corner-all" data-transition='pop' data-ajax="false">
            <label for="txt-email">Email Address</label>
            <input type="text" name="email" id="email" value="khalil@gmail.com">
            <label for="txt-password">Password</label>
            <input type="password" name="password" id="password" value="khalil">
            <fieldset data-role="controlgroup">
                <input type="checkbox" name="chck-rememberme" id="chck-rememberme" >
                <label for="chck-rememberme">Remember me</label>
            </fieldset>
                <button type="submit" data-theme="b" name="submit" value="submit-value">Submit</button>


            </form>    <p class="mc-top-margin-1-5"><a href="begin-password-reset.html">Can't access your account?</a></p>
            <div data-role="popup" id="dlg-invalid-credentials" data-dismissible="false" style="max-width:400px;">
                <div role="main" class="ui-content">
                    <h3 class="mc-text-danger">Login Failed</h3>
                    <p>Did you enter the right credentials?</p>
                    <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page -->

</html>

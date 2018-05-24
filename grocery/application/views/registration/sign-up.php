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
            <div id="ctn-err" class="bi-invisible"></div>
            <label for="txt-first-name">First Name</label>
            <input type="text" name="txt-first-name" id="txt-first-name" value="">
            <label for="txt-last-name">Last Name</label>
            <input type="text" name="txt-last-name" id="txt-last-name" value="">
            <label for="txt-email-address">Email Address</label>
            <input type="text" name="txt-email-address" id="txt-email-address" value="">
            <label for="txt-password">Password</label>
            <input type="password" name="txt-password" id="txt-password" value="">
            <label for="txt-password-confirm">Confirm Password</label>
            <input type="password" name="txt-password-confirm" id="txt-password-confirm" value="">
            <!--<a href="#dlg-sign-up-sent" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>-->
            <button id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</button>
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
</html>

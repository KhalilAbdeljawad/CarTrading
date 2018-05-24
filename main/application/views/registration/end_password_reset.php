<?php
include 'jqm_header.php';

?>

<body>
    <div data-role="page">
        <div data-role="header" data-theme="c">
            <h1>Car Trading</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Reset Password</h3>
            <!--<label for="txt-tmp-password">Provisional Password</label>
            <input type="password" name="txt-tmp-password" id="txt-tmp-password" value="">-->
            <label for="txt-new-password">New Password</label>
            <input type="password" name="txt-new-password" id="txt-new-password" value="">
            <label for="txt-new-password-confirm">Confirm New Password</label>
            <input type="password" name="txt-new-password-confirm" id="txt-new-password-confirm" value="">
            <a href="#dlg-pwd-changed" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>
            <div data-role="popup" id="dlg-pwd-changed" data-dismissible="false" style="max-width:400px;">
                <div data-role="header">
                    <h1>Done</h1>
                </div>
                <div role="main" class="ui-content">
                    <p>Your password was changed.</p>
                    <div class="mc-text-center"><a href="sign-in.php" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>

                </div>
            </div>
        </div><!-- /content -->
    </div><!-- /page -->

</body>
</html>

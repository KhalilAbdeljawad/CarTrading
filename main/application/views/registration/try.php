<?php
include 'jqm_header.php';

?>


<body>
<div data-role="page" id="home" data-theme="b">
    <form id="form1">
        <div data-role="header">
            <h2>Get Update</h2>

        </div>
        <div data-role="content">
            <div data-role="fieldcontainer">
                <label for="fname" data-theme="d">First Name:</label>
                <input type="text" id="fname" name="fname" data-theme="d" placeholder="Enter First Name"/>
                <br />
            </div>
            <div data-role="fieldcontainer">
                <label for="lname" data-theme="d">Last Name:</label>
                <input type="text" id="lname" name="lname" data-theme="d" placeholder="Enter Last Name"/>
            </div>
            <div data-role="fieldcontainer">
                <label for="email" data-theme="d">E-mail Address:</label>
                <input type="email" id="email" name="email" data-theme="d" placeholder="Enter Email"/>
            </div>
        </div>
        <div data-role="footer" data-position="fixed">
            <div class="ui-grid-a">
                <div class="ui-block-a">
                    <div class="ui-bar ui-bar-a">
                        <input type="button" data-icon="delete" value="Cancel" id="cancel"/>
                    </div>
                </div>
                <div class="ui-block-b">
                    <div class="ui-bar ui-bar-a">
                        <input type="submit" data-icon="check" value="Submit" id="submit"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div data-role="page" id="success" data-theme="b">
    <div data-role="header">
        <h2>Thank You !!!</h2>
    </div>
</div>
</body>

<script>
    $('#form1').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true
            }
        },
        messages: {
            fname: {
                required: "Please enter your first name."
            },
            lname: {
                required: "Please enter your last name."
            },
            email: {
                required: "Please enter your email."
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().prev());
        },
        submitHandler: function (form) {
            $(':mobile-pagecontainer').pagecontainer('change', '#success', {
                reload: false
            });
            return false;
        }
    });

</script>
</html>

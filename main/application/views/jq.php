<!DOCTYPE html>
<html>
<head>
    <title>Basic mobile app</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/jquery.mobile-1.4.5.min.css"?> />
    <script src="<?php print base_url()."assets/jquery.js"?>"></script>
    <script src="<?php print base_url()."assets/jquery.mobile-1.4.5.min.js"?>"></script>


</head>
<body><div data-role="page" id="foo">
    <div data-role="header"> <h1>First</h1> </div><div data-role="content">
        <p>I'm first Page</p><p><a href="#bar">Link to second page</a></p>
    </div>
</div>

<div data-role="page" id="bar">
    <div data-role="header"  data-add-back-btn="true">
    <a href="#" data-rel="back" class="ui-btn ui-icon-home ui-btn-icon-left">Home</a>
    <h1>Welcome To My Homepage</h1>
    <a href="#" class="ui-btn ui-icon-search ui-btn-icon-left">Search</a>

<!--        <a href="index.html" data-icon="">Save</a>-->

    </div>
    <div data-role="content"> <p>I'm second Page</p><p><a href="#foo">Link to first page</a></p>
        <ul data-role="listview" data-inset="true" >
            <li><a href="#foo" data-transition="flip">Page Two</a></li>
            <li><a href="newpage.html">New Page</a></li>
        </ul>
    </div>
    <div data-role="footer">
        <div data-role="navbar" data-iconpos="top">
            <ul>
                <li><a href="#page10" data-icon="home" class="ui-btn-active">One</a></li>
                <li><a href="http://google.com" data-icon="gear">Two</a></li>
                <li><a href="#" data-icon="info">Three</a></li>
            </ul>
        </div>

    </div>
</div>


<div data-role="page" data-theme="b" data-dialog="true" id="page10">
    <div data-role="header">
        <h1>Welcome To My Homepage</h1>
    </div>

    <div data-role="main" class="ui-content">
        <p>Welcome!</p>
        <a href="#pagetwo">Go to Dialog Page</a>
    </div>

    <div data-role="footer">
        <h1>Footer Text</h1>
    </div>
</div><!-- page1 -->

</body>

</html>
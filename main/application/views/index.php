<?php
//var_dump($makers);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Trading</title>
    <link rel="stylesheet" href="<?php print base_url() . "assets/bootstrap/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php print base_url() . "assets/fonts/ionicons.min.css" ?>"
    <link rel="stylesheet" href="<?php print base_url() . "assets/css/JLX-Footer-with-Icons.css" ?>"
    <link rel="stylesheet" href="<?php print base_url() . "assets/css/Pretty-Search-Form.css" ?>">
    <link rel="stylesheet" href="<?php print base_url() . "assets/css/styles.css" ?>">

    <style>
        select {
            -webkit-appearance: button;
            -webkit-border-radius: 2px;

            -webkit-user-select: none;
            background-image: url(<?php print base_url()."assets/images/list.png" ?>);
            background-position: 97% center;
            background-repeat: no-repeat;
            border: 0px solid #AAA;
            color: #555;
            font-size: inherit;
            /*margin: 20px;*/
            overflow: hidden;
            padding: 5px 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 150px;
            height: 50px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Brand</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="active" role="presentation"><a href="<?php print base_url()?>">Home </a></li>
                <li role="presentation"><a href="#">Buy a Car</a></li>
                <li role="presentation"><a href="#">Purchase a Car</a></li>
                <li role="presentation"><a href="#">Rent a Car</a></li>
                <?php if (isset($customer) and is_integer((int)$customer)) { ?>
                    <li role="presentation"><a href="Handle_car/addAd"><span
                                    style="color: skyblue">Add New Ad</span></a></li>
                <?php } ?>
            </ul>
            <?php if (!isset($customer) || !is_integer((int)$customer)) { ?>
                <button class="btn btn-default btn-sm navbar-btn navbar-right"
                        onclick="window.location='Registration/signUp'" type="button">SignUp
                </button>
                <button class="btn btn-success btn-sm navbar-btn navbar-right"
                        onclick="window.location='Registration/signIn'" type="button">LogIn
                </button>
            <?php } else { ?>

                <button class="btn btn-success btn-sm navbar-btn navbar-right"
                        onclick="window.location='Registration/signOut'" type="button">LogOut
                </button>
                <span style="color:whitesmoke; margin: 5px;margin-top: 20px; margin-right: 50px;"
                      class="navbar-btn navbar-right"><a href="Homepage/userProfile/<?php print $customer?>"><?php print 'Hi, ' . $name ?></a></span>
                <span style="color:whitesmoke; margin: 5px;margin-top: 20px; margin-right: 50px;"
                      class="navbar-btn navbar-right"><a href="Homepage/myAds">My Ads</a></span>
            <?php } ?>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form class="search-form" method="get" action="Homepage/search">
            <div class="input-group" style="border: 1px solid lightgrey; padding: 0px;">
                <div class="input-group-addon"><span><i class="glyphicon glyphicon-search"></i></span></div>
                <!--<input class="form-control" name="searchText"  id="searchInput" type="text" placeholder="I am looking for..">-->

                <select id="maker" name ="make">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                    <option value="any">Make (any)</option>
                    <?php foreach ($makers as $value) { ?>
                        <option value="<?php print $value->make; ?>"><?php print $value->make; ?></option>
                    <?php } ?>
                </select>

                <select id="model" name="model">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                    <option value="any">Model (any)</option>

                </select>

                <select id="minPrice" name="minPrice">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->


                    <option value="any">Min Price(any)</option>
                    <option value="500">£500</option>
                    <option value="1000">£1,000</option>
                    <option value="2000">£2,000</option>
                    <option value="3000">£3,000</option>
                    <option value="4000">£4,000</option>
                    <option value="5000">£5,000</option>
                    <option value="6000">£6,000</option>
                    <option value="7000">£7,000</option>
                    <option value="8000">£8,000</option>
                    <option value="9000">£9,000</option>
                    <option value="10000">£10,000</option>
                    <option value="12500">£12,500</option>
                    <option value="15000">£15,000</option>
                    <option value="17500">£17,500</option>
                    <option value="20000">£20,000</option>
                    <option value="25000">£25,000</option>
                    <option value="30000">£30,000</option>
                    <option value="35000">£35,000</option>
                    <option value="40000">£40,000</option>
                    <option value="45000">£45,000</option>
                    <option value="50000">£50,000</option>
                    <option value="55000">£55,000</option>
                    <option value="60000">£60,000</option>
                    <option value="75000">£75,000</option>
                    <option value="100000">£100,000</option>
                    <option value="250000">£250,000</option>
                    <option value="500000">£500,000</option>
                    <option value="1000000">£1,000,000</option>

                </select>



                <select id="maxPrice" name ="maxPrice">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->


                    <option value="any">Max Price(any)</option>
                    <option value="500">£500</option>
                    <option value="1000">£1,000</option>
                    <option value="2000">£2,000</option>
                    <option value="3000">£3,000</option>
                    <option value="4000">£4,000</option>
                    <option value="5000">£5,000</option>
                    <option value="6000">£6,000</option>
                    <option value="7000">£7,000</option>
                    <option value="8000">£8,000</option>
                    <option value="9000">£9,000</option>
                    <option value="10000">£10,000</option>
                    <option value="12500">£12,500</option>
                    <option value="15000">£15,000</option>
                    <option value="17500">£17,500</option>
                    <option value="20000">£20,000</option>
                    <option value="25000">£25,000</option>
                    <option value="30000">£30,000</option>
                    <option value="35000">£35,000</option>
                    <option value="40000">£40,000</option>
                    <option value="45000">£45,000</option>
                    <option value="50000">£50,000</option>
                    <option value="55000">£55,000</option>
                    <option value="60000">£60,000</option>
                    <option value="75000">£75,000</option>
                    <option value="100000">£100,000</option>
                    <option value="250000">£250,000</option>
                    <option value="500000">£500,000</option>
                    <option value="1000000">£1,000,000</option>

                </select>

                <select id="mileage" name ="mileage">
                    <option value="any">Mile age (any)</option>
                    <?php for ($i=0, $j=1; $i<270000; $i+=1000*$j, $j++) {?>

                        <option value="<?php print $i?>"><?php print number_format($i, 0, '', ',');?></option>

                    <?php }?>
                </select>

                <div class="input-group-btn">
                    <button style="height: inherit;" class="btn btn-default" type="submit">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-3" id="searchlabelmargin">
                <div class="radio">
                    <label>
                        <input type="radio">Finance Option</label>
                </div>
            </div>
            <div class="col-md-3" id="searchlabelmargin">
                <div class="radio">
                    <label>
                        <input type="radio">Spare/Repair</label>
                </div>
            </div>
            <div class="col-md-3" id="searchlabelmargin">
                <div class="radio">
                    <label>
                        <input type="radio">Extra</label>
                </div>
            </div>
            <div class="col-md-3" id="searchlabelmargin">
                <div class="radio">
                    <label>
                        <input type="radio">Extra</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Our Recommendation</h3></div>

        <?php foreach ($lastCars as $lastCar) { ?>

            <div class="col-lg-3 col-md-3 col-md-offset-0"><a
                        href="<?php print base_url() ?>Homepage/viewAd/<?php print $lastCar->id ?>"><img
                            src="<?php print base_url() . "assets/uploads/files/" . $lastCar->customer_id . "/" . $lastCar->id . "/" . $lastCar->main_image ?>"
                            width="200" height="150"></a>
                <h4>
                    <a href="<?php print base_url() ?>Homepage/viewAd/<?php print $lastCar->id ?>"><?php print $lastCar->car_title ?></a>
                </h4>
                <p>Extra text about the car. </p>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i
                                class="icon ion-android-desktop footer-contacts-icon"></i></div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                        <p><?php print $lastCar->views ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i
                                class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                        <p><?php print $lastCar->likes ?> </p>
                    </div>
                </div>
            </div>

        <?php } ?>
        <!--
                    <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
                        <h4>Ad Name</h4>
                        <p>Extra text about the car. </p>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
                        <h4>Ad Name</h4>
                        <p>Extra text about the car. </p>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
                        <h4>Ad Name</h4>
                        <p>Extra text about the car. </p>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                                <p>999K </p>
                            </div>
                        </div>
                    </div>
                    -->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Our Top Ads</h3></div>

        <?php foreach ($topCars as $topCar) { ?>

            <div class="col-lg-3 col-md-3 col-md-offset-0"><a
                        href="<?php print base_url() ?>Homepage/viewAd/<?php print $topCar->id ?>"><img
                            src="<?php print base_url() . "assets/uploads/files/" . $topCar->customer_id . "/" . $topCar->id . "/" . $topCar->main_image ?>"
                            width="200" height="150"></a>
                <h4>
                    <a href="<?php print base_url() ?>Homepage/viewAd/<?php print $topCar->id ?>"><?php print $topCar->car_title ?></a>
                </h4>

                <p>Extra text about the car. </p>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i
                                class="icon ion-android-desktop footer-contacts-icon"></i></div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                        <p><?php print $topCar->views ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i
                                class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                        <p><?php print $topCar->likes ?> </p>
                    </div>
                </div>
            </div>

        <?php } ?>
        <!--
        <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
            <h4>Ad Name</h4>
            <p>Extra text about the car. </p>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
            <h4>Ad Name</h4>
            <p>Extra text about the car. </p>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
            <h4>Ad Name</h4>
            <p>Extra text about the car. </p>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-md-offset-0"><img src="assets/img/FORD_FOCU_2012-1.png" width="200" height="150">
            <h4>Ad Name</h4>
            <p>Extra text about the car. </p>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="icon ion-android-desktop footer-contacts-icon"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="glyphicon glyphicon-thumbs-up footer-contacts-icon" id="icon_span_dir"></i></div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
                    <p>999K </p>
                </div>
            </div>
        </div>

        -->
    </div>
</div>
<hr>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h3>Products </h3>
                <ul>
                    <li><a href="#">Cloud Hosting</a></li>
                    <li><a href="#">Managed Hosting</a></li>
                    <li><a href="#">Compliant Hosting</a></li>
                    <li><a href="#">Website Hosting</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h3>Services </h3>
                <ul>
                    <li><a href="#">Managed Hosting Services</a></li>
                    <li><a href="#">Professional Services</a></li>
                    <li><a href="#">Database Administration</a></li>
                    <li><a href="#">Disaster Recovery Planning</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="#">Industrial </a></li>
                    <li><a href="#">Websites &amp; Applications</a></li>
                    <li><a href="#">Business Critical</a></li>
                </ul>
                <!--
                <div id="icons"><img src="assets/img/facebook_circle_color.png" width="33" height="33"><img src="assets/img/instagram2.png" width="33" height="33"><img src="assets/img/twitter_circle_color.png" width="33" height="33"></div>
            </div>
            -->
            </div>
        </div>
</footer>
<script src="<?php print base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php print base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {

        $("#searchInput").focus();

        $("#maker").change(function () {

            $.post("Homepage/getModels/" + $("#maker").val(), function (data) {
               $("#model").html(data);

            });
        })

        <?php if(isset($_GET['a']))
          //  print "alert('{$_GET['a']}');\n";
        //print "window.location.reload());\n";
            ?>
    });
</script>
</body>

</html>
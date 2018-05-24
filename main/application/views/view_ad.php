<?php
/**
 * Created by PhpStorm.
 * User: Khalil
 * Date: 9/8/2016
 * Time: 2:10 PM
 */
include 'jqm_header.php';


?>

<title><?php print $car_info->car_title ?></title>
<style>


    #visual_car_info {

        width: 760px;

    }

    #dealer_info {
        text-align: left;
        width: 25%;
        padding-left: 10px;
        margin-top: 82px;
        border: 0px solid;
        color:blue;
        background-color: #2C3E50;
    }

    .dealer_info {
        background-color: #fff;
        height: 40px;
        margin: 10px;
        padding-top: 16px;
        padding-left: 10px;
        font-family: Arial;
        font-weight: bolder;
        font-size: 20px;
    }

    .car_info {

        float: left;

        width: 60px;
        height: 100px;

    }

    #mileage {

        width: 150px;
        margin-top: 40px;
        margin-right: 25px;
        float: right;

    }

    .light {
        border: 2px solid #0f0;
        margin: 1px;
        font-weight: bold;
        padding: 3px;
        border-radius: 5px;
        width: 19px;
        height: 20px;
    }

    .dark {
        border: 2px solid #0f0;
        margin: 1px;
        padding: 3px;
        border-radius: 5px;
        width: 19px;
        height: 20px;
        color: white;
        background-color: black;
    }

    .svg {
        width: 50px;
        height: 80px;
    }

    .title {

    }
</style>


<script src="<?php print base_url() ?>assets/slide/js/jssor.slider-21.1.6.mini.js"></script>

<script src="<?php print base_url() ?>assets/js/progressbar.js"></script>


<link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">


<style>
    .progressBar {
        margin: 20px;
        width: 70px;
        height: 70px;
        position: relative;
    }
</style>

<body>

<!-- data-add-back-btn="true" -->
<div data-role="page" id="viewAdPage">


    <div data-role="header" id="header" data-theme="c">
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        <h1><?php print $car_info->car_title ?></h1>
    </div>

    <div data-role="main" id="ad_data" align="center" class="ui-content">


        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // #like it click
                var car_id = <?php print $car_id ?>

                    $("#likeit").click(function () {



                        $.post("<?php print base_url() ?>Homepage/likeAd/" + car_id, function (data) {
                            if(data != "false")
                            $("#likesNumber").text(data);


                        });
                    });


                var jssor_1_SlideshowTransitions = [
                    {
                        $Duration: 1200,
                        x: 0.3,
                        $During: {$Left: [0.3, 0.7]},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: -0.3,
                        $SlideOut: true,
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: -0.3,
                        $During: {$Left: [0.3, 0.7]},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        $SlideOut: true,
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: 0.3,
                        $During: {$Top: [0.3, 0.7]},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: -0.3,
                        $SlideOut: true,
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: -0.3,
                        $During: {$Top: [0.3, 0.7]},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: 0.3,
                        $SlideOut: true,
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        $Cols: 2,
                        $During: {$Left: [0.3, 0.7]},
                        $ChessMode: {$Column: 3},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        $Cols: 2,
                        $SlideOut: true,
                        $ChessMode: {$Column: 3},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: 0.3,
                        $Rows: 2,
                        $During: {$Top: [0.3, 0.7]},
                        $ChessMode: {$Row: 12},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: 0.3,
                        $Rows: 2,
                        $SlideOut: true,
                        $ChessMode: {$Row: 12},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: 0.3,
                        $Cols: 2,
                        $During: {$Top: [0.3, 0.7]},
                        $ChessMode: {$Column: 12},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        y: -0.3,
                        $Cols: 2,
                        $SlideOut: true,
                        $ChessMode: {$Column: 12},
                        $Easing: {$Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        $Rows: 2,
                        $During: {$Left: [0.3, 0.7]},
                        $ChessMode: {$Row: 3},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: -0.3,
                        $Rows: 2,
                        $SlideOut: true,
                        $ChessMode: {$Row: 3},
                        $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        y: 0.3,
                        $Cols: 2,
                        $Rows: 2,
                        $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]},
                        $ChessMode: {$Column: 3, $Row: 12},
                        $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        x: 0.3,
                        y: 0.3,
                        $Cols: 2,
                        $Rows: 2,
                        $During: {$Left: [0.3, 0.7], $Top: [0.3, 0.7]},
                        $SlideOut: true,
                        $ChessMode: {$Column: 3, $Row: 12},
                        $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        $Delay: 20,
                        $Clip: 3,
                        $Assembly: 260,
                        $Easing: {$Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        $Delay: 20,
                        $Clip: 3,
                        $SlideOut: true,
                        $Assembly: 260,
                        $Easing: {$Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        $Delay: 20,
                        $Clip: 12,
                        $Assembly: 260,
                        $Easing: {$Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    },
                    {
                        $Duration: 1200,
                        $Delay: 20,
                        $Clip: 12,
                        $SlideOut: true,
                        $Assembly: 260,
                        $Easing: {$Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear},
                        $Opacity: 2
                    }
                ];

                var jssor_1_options = {
                    $AutoPlay: true,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Cols: 10,
                        $SpacingX: 8,
                        $SpacingY: 8,
                        $Align: 360
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                /*responsive code begin*/
                /*you can remove responsive code if you don't want the slider scales while window resizing*/
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 800);
                        jssor_1_slider.$ScaleWidth(refSize);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                /*responsive code end*/
            });
        </script>
        <style>
            /* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l                  (normal)
            .jssora05r                  (normal)
            .jssora05l:hover            (normal mouseover)
            .jssora05r:hover            (normal mouseover)
            .jssora05l.jssora05ldn      (mousedown)
            .jssora05r.jssora05rdn      (mousedown)
            .jssora05l.jssora05lds      (disabled)
            .jssora05r.jssora05rds      (disabled)
            */
            .jssora05l, .jssora05r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 40px;
                cursor: pointer;
                /*background: url('img/a17.png') no-repeat;*/
                overflow: hidden;
            }

            .jssora05l {
                background-position: -10px -40px;
            }

            .jssora05r {
                background-position: -70px -40px;
            }

            .jssora05l:hover {
                background-position: -130px -40px;
            }

            .jssora05r:hover {
                background-position: -190px -40px;
            }

            .jssora05l.jssora05ldn {
                background-position: -250px -40px;
            }

            .jssora05r.jssora05rdn {
                background-position: -310px -40px;
            }

            .jssora05l.jssora05lds {
                background-position: -10px -40px;
                opacity: .3;
                pointer-events: none;
            }

            .jssora05r.jssora05rds {
                background-position: -70px -40px;
                opacity: .3;
                pointer-events: none;
            }

            /* jssor slider thumbnail navigator skin 01 css *//*.jssort01 .p            (normal).jssort01 .p:hover      (normal mouseover).jssort01 .p.pav        (active).jssort01 .p.pdn        (mousedown)*/
            .jssort01 .p {
                position: absolute;
                top: 0;
                left: 0;
                width: 72px;
                height: 72px;
            }

            .jssort01 .t {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: none;
            }

            .jssort01 .w {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
            }

            .jssort01 .c {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 68px;
                height: 68px;
                border: #000 2px solid;
                box-sizing: content-box;
                background: url('img/t01.png') -800px -800px no-repeat;
                _background: none;
            }

            .jssort01 .pav .c {
                top: 2px;
                _top: 0px;
                left: 2px;
                _left: 0px;
                width: 68px;
                height: 68px;
                border: #000 0px solid;
                _border: #fff 2px solid;
                background-position: 50% 50%;
            }

            .jssort01 .p:hover .c {
                top: 0px;
                left: 0px;
                width: 70px;
                height: 70px;
                border: #fff 1px solid;
                background-position: 50% 50%;
            }

            .jssort01 .p.pdn .c {
                background-position: 50% 50%;
                width: 68px;
                height: 68px;
                border: #000 2px solid;
            }

            * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c { /* ie quirks mode adjust */
                width /**/: 72px;
                height /**/: 72px;
            }
        </style>

        <div class="ui-grid-a" style="margin-left: 150px; border: 0px solid">
            <div class="ui-block-a" style="width: 75%">
                <div id='title' align='left' style="float:left;margin-left: 50px;">
                    <span style="font-weight: bold">  <?php print $car_info->make . ' ' . $car_info->model ?></span>
                    <div><h3>&pound;<?php print $car_info->price ?></h3></div>
                </div>
                <div style="border:0px solid;  text-align: right">
                    <img src='<?php print base_url() . "assets/images/view.png" ?>'/>
                    <div style="margin-bottom: 30px; ;display: inline-block;height: 10px;vertical-align: middle"><?php print $car_info->views ?></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="#" id="likeit"><img src='<?php print base_url() . "assets/images/like.png" ?>'/></a>
                    <div id="likesNumber"
                         style="margin-bottom: 30px; ;display: inline-block;height: 10px;vertical-align: middle">

                        <?php print $car_info->likes ?></div>

                </div>

                <div id="jssor_1"
                     style="float left;position: relative; margin: 0 auto; top: 0px; left: 0px;  width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides"
                         style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">


                        <?php foreach ($images as $value) { ?>
                            <a data-u="any" style="display:none"></a>
                            <div data-p="144.50">
                                <img data-u="image" src="<?php print base_url() . $path . $value ?>"/>
                                <img data-u="thumb" src="<?php print base_url() . $path . $value ?>"/>
                            </div>
                        <?php } ?>

                    </div>
                    <!-- Thumbnail Navigator -->
                    <div data-u="thumbnavigator" class="jssort01"
                         style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
                        <!-- Thumbnail Item Skin Begin -->
                        <div data-u="slides" style="cursor: default;">
                            <div data-u="prototype" class="p">
                                <div class="w">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                </div>
                                <div class="c"></div>
                            </div>
                        </div>
                        <!-- Thumbnail Item Skin End -->
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora05l"
                          style="top:158px;left:8px;width:40px;height:40px;"></span>
                    <span data-u="arrowright" class="jssora05r"
                          style="top:158px;right:8px;width:40px;height:40px;"></span>
                </div>


                <!--     End of slide    -->
            </div>
            <div class="ui-block-b" id="dealer_info">

                <h2 style="text-align: center; color:white;">Dealer Info</h2>

                 <div class="dealer_info"><?php print $ad_customer->first_name . ' ' . $ad_customer->last_name ?></div>

                <div class="dealer_info"><?php print $ad_customer->phone ?></div>

                <div class="dealer_info"><?php print $ad_customer->email ?></div>


            </div>
        </div>
        <!--    end of grid-->

        <div id="visual_car_info">
            <br/><br/>


            <div class="ui-grid-d" style="margin-left: 50px">
                <div class="ui-block-a">
                    <div id="engine" class="car_info">


                        <img src="<?php print base_url() ?>assets/car/engine.svg" class="svg">
                        <span class="car_info_text"><?php print $car_info->engine_size ?></span>
                    </div>
                    </span></div>

                <div class="ui-block-b">
                    <div id="fuel" class="car_info">
                        <img class="svg" src="<?php print base_url() ?>assets/car/fuel.svg"/>

                        <span class="car_info_text"><?php print $car_info->fuel_type ?></span>
                    </div>
                </div>
                <div class="ui-block-c">
                        <span>
                            <div id="gearbox" class="car_info">
                                <img class="svg"
                                     src="<?php print base_url() ?>assets/car/<?php print $car_info->gearbox == 'Auto' ? 'gears' : 'gears' ?>.svg"
                                     width="120px"/>

                                <span class="car_info_text"><?php print $car_info->gearbox ?></span>
                            </div>
                        </span></div>
                <div class="ui-block-d" style="float:left">
                    <div id="mileage" class="car_info">

                        <?php
                        $str = $car_info->mileage;
                        for ($i = 0; $i < 6 - strlen($str); $i++)
                            if ($i == 0)
                                print "&nbsp;<span class='light'> &nbsp;</span>";
                            else
                                print "<span class='light'> &nbsp;</span>";

                        for ($i = 0, $j = 6 - strlen($str); $i < strlen($str); $i++)
                            print "<span class='" . ($j++ >= 3 ? 'dark' : 'light') . "'>" . $str[$i] . "</span>";
                        ?>
                        <div style="margin-top: 25px">
                            Mileage
                        </div>

                    </div>
                </div>
                <div class="ui-block-e">

                    <div id="fuel" class="car_info">
                        <img class="svg"
                             src="<?php print base_url() ?>assets/car/<?php print ($car_info->body_type == 'Saloon' ? 'saloon' : ($car_info->body_type == 'Convertible' ? 'convertible' : 'coupe')) ?>.svg"
                             width="120px"/>

                        <span class="car_info_text"><?php print $car_info->body_type ?></span>
                    </div>

                </div>

            </div>

            <div class="ui-grid-d">
                <div class="ui-block-a">

                    <div style="margin:0px" class="progressBar" id="insurance_group"></div>
                    Insurance group
                </div>

                <div class="ui-block-b">
                    <div style="margin:0px" class="progressBar" id="seats"></div>
                    Seats

                </div>
                <div class="ui-block-c">
                    <div style="margin:0px" class="progressBar" id="doors"></div>
                    Doors

                </div>
                <div class="ui-block-d">
                    <div style="margin:0px" class="progressBar" id="tax"></div>
                    Tax
                </div>

                <div class="ui-block-e">
                    <div style="margin:0px" class="progressBar" id="year"></div>
                    Year
                </div>

            </div>

            <br/><br/><br/>


            <div style="text-align: left">

                <?php
                foreach ($car_info as $key => $value) {
                    if ($key == "id" or $key == "customer_id" or $key == "main_image")
                        continue;
                    print "<div style='margin:7px;'><span style='font-size:18px; font-weight:bold;'>" . ucfirst(str_replace("_", " ", $key)) . ":</span> <span style='text-align:justify'>" . $value . "</span></div>";
                    if ($key == "main_description") break;
                }
                ?>

            </div>
            <!--</div>-->

        </div> <!-- Content -->
        <?php ?>


        <div data-role="footer" data-theme="c">
            <h1></h1>
        </div>

    </div>

</body>


<script>
    // progressbar.js@1.0.0 version is used
    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

    var bar = new ProgressBar.Circle(insurance_group, {
        color: '#000',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 16,
        trailWidth: 16,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: true
        },
        from: {color: '#0f0', width: 16},
        to: {color: '#0f0', width: 16},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 60);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(<?php print $car_info->insurance_group / 60 ?>);  // Number from 0.0 to 1.0


    var bar_seats = new ProgressBar.Circle(seats, {
        color: '#000',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 16,
        trailWidth: 16,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: true
        },
        from: {color: '#0f0', width: 16},
        to: {color: '#0f0', width: 16},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 9);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });
    bar_seats.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar_seats.text.style.fontSize = '2rem';

    bar_seats.animate(<?php print $car_info->no_of_seats / 9 ?>);  // Number from 0.0 to 1.0


    var bar_tax = new ProgressBar.Circle(tax, {
        color: '#000',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 16,
        trailWidth: 16,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: true
        },
        from: {color: '#0f0', width: 16},
        to: {color: '#0f0', width: 16},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 300);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText("&pound;" + value);
            }

        }
    });
    bar_tax.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar_tax.text.style.fontSize = '2rem';

    bar_tax.animate(<?php print $car_info->tax_price / 300 ?>);  // Number from 0.0 to 1.0


    var bar_doors = new ProgressBar.Circle(doors, {
        color: '#000',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 16,
        trailWidth: 16,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: true
        },
        from: {color: '#0f0', width: 16},
        to: {color: '#0f0', width: 16},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 6);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });
    bar_doors.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar_doors.text.style.fontSize = '2rem';

    bar_doors.animate(<?php print $car_info->no_of_doors / 6 ?>);  // Number from 0.0 to 1.0


    var bar_year = new ProgressBar.Circle(year, {
        color: '#000',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 16,
        trailWidth: 16,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: true
        },
        from: {color: '#0f0', width: 16},
        to: {color: '#0f0', width: 16},
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
            circle.setText('');
            var v = Math.round(circle.value() / 2000);
            var value = <?php print $car_info->year ?>;
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText('<?php print $car_info->year ?>');
            }

        }
    });
    bar_year.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar_year.text.style.fontSize = '2rem';

    bar_year.animate(<?php print abs($car_info->year - 2000) / 17 ?>);  // Number from 0.0 to 1.0

</script>

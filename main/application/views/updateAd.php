<?php
include 'jqm_header.php';
if(!empty($_FILES)){
//var_dump(set_checkbox('purchase_type','Buy'));
//var_dump(set_checkbox('purchase_type','Lease'));
   
} 
//var_dump(validation_errors());

?>

<!-- Google Fonts -->

<link href="<?php print base_url() ?>assets/jQuery.filer/css/fonts.css" rel="stylesheet" />


<link href="<?php print base_url() ?>assets/jQuery.filer/css/jquery.filer.css" rel="stylesheet" />


    <!--<script src="<?php print base_url() . "assets/jQuery.filer/js/jquery.js" ?>" crossorigin="anonymous"></script>-->


<script src="<?php print base_url() . "assets/jQuery.filer/js/jquery.filer.min.js" ?>"  type="text/javascript"></script>

<script src="<?php print base_url() . "assets/jQuery.filer/js/custom.js" ?>"></script>





<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #47525d;
        background-color: #fff;

        margin: 0;
        padding: 20px;
    }

    .error{
        color: red;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #eee;
    }
</style>



</head>

<body>


    <div data-role="page" data-bookit-page="addAd" id="addAd">
        <div data-role="header" id="header" data-theme="c">
           <a href="#"  data-rel="back" title="Go back">Back</a>
            <h1>New Ad</h1>

        </div><!-- /header -->
        <div role="main" data-role="content" content id="MainForm">


            <h3>Update Ad</h3>
            <h4><a href="" onclick="window.location='../updateImages/<?php print $adId?>'">Update Ad's Images</a></h4>
            <form id="saveAd" action="../updateAd" method="post" class="ui-body ui-body-a ui-corner-all"
                  data-ajax="false"  enctype="multipart/form-data" class="ui-input-text ui-body-c">




                <label for="title">Car Title<span class='error'><sup>*</sup></label>
                <span class='error'><?php echo form_error('car_title'); ?> </span>

                <input type="text" name="car_title" id="car_title" value="<?php echo $car_info->car_title; ?>">

                <label for="body_condition">Body Condition<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('body_condition'); ?></span>
                <input type="text" name="body_condition" id="body_condition" value="<?php echo $car_info->body_condition ?>">
                <label for="technical_condition">Technical Condition<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('technical_condition'); ?></span>
                <input type="text" name="technical_condition" id="technical_condition" value="<?php echo $car_info->technical_condition; ?>">
                <label for="mot">Mot<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('mot'); ?></span>
                <input type="text" name="mot" id="mot" class="date" value="<?php  echo $car_info->mot; ?>">
                <label for="tax">Tax<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('tax'); ?></span>
                <input type="text" name="tax" id="tax" class="date" value="<?php echo $car_info->tax; ?>">
                <label for="make">Make<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('make'); ?></span>
                <input type="text" name="make" id="make" value="<?php echo $car_info->make; ?>">
                <label for="model">Model<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('model'); ?></span>
                <input type="text" name="model" id="model" value="<?php echo $car_info->model; ?>">
                <label for="price">Price<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('price'); ?></span>
               <input type="number" name="price" id="price"  min="0" max="1000000" step="any" value="<?php echo $car_info->price; ?>">
                <label for="currency">Currency<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('currency'); ?></span>
                <input type="text" name="currency" id="currency" value="<?php echo $car_info->currency; ?>">
                <label for="purchase_type">Purchase Type    <?php print $car_info->purchase_type.'  '.strpos($car_info->purchase_type , 'Buy').'|'?>
                    <span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('purchase_type'); ?></span>

               
                <fieldset data-role="controlgroup" data-type="horizontal">


                    <input type="checkbox" name="purchase_type[]" <?php if ( strpos($car_info->purchase_type , 'Buy')!==false) print "checked='checked' " ?>
                           <?php print set_checkbox('purchase_type[]','Buy'); ?> 

                           id="purchase_type_buy" value="Buy" class="custom" />
                    <label for="purchase_type_buy" >Buy</label>

                    <input type="checkbox" name="purchase_type[]" id="purchase_type_lease" value="Lease"
                        <?php if ( strpos($car_info->purchase_type , 'Lease')!==false) print "checked='checked' " ?>
                           <?php print set_checkbox('purchase_type[]','Lease'); ?> 
                           class="custom" />
                    <label for="purchase_type_lease">Lease</label>

                    <input type="checkbox" name="purchase_type[]" id="purchase_type_finance" value="Finance" class="custom"
                        <?php if (strpos($car_info->purchase_type , 'Finance')!==false) print "checked='checked' " ?>
                           <?php print set_checkbox('purchase_type[]','Finance'); ?> 
                           />
                    <label for="purchase_type_finance">Finance</label>
                </fieldset>


                <label for="year">Year<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('year'); ?></span>
                <input type="number" name="year" id="year"  min="1920" max="2050"   value="<?php echo $car_info->year; ?>">
                <label for="mileage">Mileage<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('mileage'); ?></span>
                <input type="text" name="mileage" id="mileage" value="<?php echo $car_info->mileage; ?>">


                <label for="fuel_type">Fuel Type<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('fuel_type'); ?></span>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <input type="radio" name="fuel_type" id="Petrol" value="Petrol"  <?php if ( strpos($car_info->fuel_type , 'Petrol')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('fuel_type', 'Petrol'); ?>
                           />
                    <label for="Petrol">Petrol</label>

                    <input type="radio" name="fuel_type" id="Diesel" value="Diesel"  <?php if ( strpos($car_info->fuel_type , 'Diesel')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('fuel_type', 'Diesel'); ?>
                           />
                    <label for="Diesel">Diesel</label>

                    <input type="radio" name="fuel_type" id="Electric" value="Electric"  <?php if ( strpos($car_info->fuel_type , 'Electric')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('fuel_type', 'Electric'); ?>
                           />
                    <label for="Electric">Electric</label>

                    <input type="radio" name="fuel_type" id="Hybrid" value="Hybrid"   <?php if ( strpos($car_info->fuel_type , 'Hybrid')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('fuel_type', 'Hybrid'); ?>
                           />
                    <label for="Hybrid">Hybrid</label>
                </fieldset>


                <label for="engine_size">Engine Size<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('engine_size'); ?></span>
                <input type="number" name="engine_size"  min="1" max="10"  id="engine_size" value="<?php echo $car_info->engine_size; ?>">
                <label for="fuel_consumption">Fuel Consumption</label>
               <span class='error'><?php echo form_error('fuel_consumption'); ?></span>
                <input type="text" name="fuel_consumption" id="fuel_consumption" value="<?php echo $car_info->fuel_consumption; ?>">
                <label for="acceleration">Acceleration</label>
               <span class='error'><?php echo form_error('acceleration'); ?></span>
                <input type="text" name="acceleration" id="acceleration" value="<?php echo $car_info->acceleration; ?>">
                <label for="gerbox">Gerbox<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('gerbox'); ?></span>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <input type="radio" name="gearbox" id="Auto" value="Auto"  <?php if ( strpos($car_info->gearbox , 'Auto')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('gearbox', 'Auto'); ?>
                           />
                    <label for="Auto">Auto</label>

                    <input type="radio" name="gearbox" id="Manual" value="Manual" <?php if ( strpos($car_info->gearbox , 'Manual')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('gearbox', 'Manual'); ?>
                           />
                    <label for="Manual">Manual</label>


                </fieldset>

                <label for="co2_emmision">Co2 Emmision</label>
               <span class='error'><?php echo form_error('co2_emmision'); ?></span>
                <input type="number" name="co2_emmision" id="co2_emmision" value="<?php echo $car_info->co2_emmision; ?>">
                <label for="no_of_doors">No Of Doors<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('no_of_doors'); ?></span>
                <input type="number" name="no_of_doors"  min="1" max="6"   id="no_of_doors" value="<?php echo $car_info->no_of_doors; ?>">


                <label for="body_type">Body Type<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('body_type'); ?></span>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <input type="radio" name="body_type" id="Saloon" value="Saloon" <?php if ( strpos($car_info->body_type , 'Saloon')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('body_type', 'Saloon'); ?>
                           />
                    <label for="Saloon">Saloon</label>

                    <input type="radio" name="body_type" id="Coupe" value="Coupe" <?php if ( strpos($car_info->body_type , 'Coupe')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('body_type', 'Coupe'); ?>
                           />
                    <label for="Coupe">Coupe</label>

                    <input type="radio" name="body_type" id="Convertible" value="Convertible" <?php if ( strpos($car_info->body_type , 'Convertible')!==false) print "checked='checked' " ?>
                           <?php echo set_radio('body_type', 'Convertible'); ?>
                           />
                    <label for="Convertible">Convertible</label>

                </fieldset>


                <label for="no_of_seats">No Of Seats</label>
               <span class='error'><?php echo form_error('no_of_seats'); ?></span>
                <input type="number" name="no_of_seats"  min="1" max="40"  id="no_of_seats" value="<?php echo $car_info->no_of_seats; ?>">
                <label for="insurance_group">Insurance Group</label>
               <span class='error'><?php echo form_error('insurance_group'); ?></span>
                <input type="number" name="insurance_group" id="insurance_group" value="<?php echo $car_info->insurance_group; ?>">
                <label for="tax_price">Tax Price</label>
               <span class='error'><?php echo form_error('tax_price'); ?></span>
                <input type="number" name="tax_price" id="tax_price" value="<?php echo $car_info->tax_price; ?>">
                <label for="colour">Colour<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('colour'); ?></span>
                <input type="text" name="colour" id="colour" value="<?php echo $car_info->colour; ?>">
                <label for="small_description">Small Description<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('small_description'); ?></span>
                <input type="text" name="small_description" id="small_description" value="<?php echo $car_info->small_description; ?>">

                <label for="main_description">Main Description<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('main_description'); ?></span>
                <textarea rows="5" name="main_description" id="main_description" >Descripton<?php echo $car_info->main_description; ?></textarea>
                <label for="evaluated_price">Evaluated Price<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('evaluated_price'); ?></span>
                <input type="number" name="evaluated_price" id="evaluated_price" value="<?php echo $car_info->evaluated_price; ?>">
                <label for="note">Note<span class='error'><sup>*</sup></span></label>
               <span class='error'><?php echo form_error('note'); ?></span>
                <input type="text" name="note" id="note" value="<?php echo $car_info->note; ?>">



                <button type="submit" data-theme="b" name="submit" value="submit-value">Submit</button>
<!-- <button id='fill'>Fill Inputs</button>-->

            </form>
</div>
    </div>
    

    
            <div id="msg" data-role="popup" id="dlg-invalid-credentials" data-dismissible="false" style="max-width:400px;">
                <div role="main" class="ui-content">
                    <h3 class="mc-text-danger">Login Failed</h3>
<?php echo $car_info->car_title; ?>
                    <p>Did you enter the right credentials?</p>
<?php print_r($post) ?> 
                    <?php echo validation_errors(); ?>

                    <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
            </div>
        
    

    <div data-role="page" data-bookit-page="addAdImages" id="addAdImages">
        <div data-role="header" id="header2" data-theme="c">
            <h1>New Ad</h1>
        </div><!-- /header -->
        <div ata-role="content" class="ui-content" id="ImagesForm">
            
            <form id="saveAd" action="saveAd" method="post" class="ui-body ui-body-a ui-corner-all"
                  data-ajax="false"  enctype="multipart/form-data" class="ui-input-text ui-body-c">
                <label for="file[]">Images</label>
                <input type="file" id="file" name="file[]" multiple="multiple" />
            </form>
        </div>
    </div>  
    
    
    <script>
        
        $(document).ready(function (){
           //alert(9)
         //  
         $("#msg").hide();
         
         if(<?php isset($image_upload)?print 1: print 0?>==1){
            $("#addAd").remove();
             $("#msg").remove();
            $("#addAdImages").show();
            
    }
           
            
        });

$("#fill").click(function(){
    
    $('input[type=text]').each(function(){
        $(this).val("Test Text");
    })
    
    
    $('input[type=number]').each(function(){
        $(this).val("6");
    })
    
    $(".date").val("16/11/2016")
    
    
    
    $('input[type=date]').each(function(){
        $(this).val("11/16/2016");
    })
    $("#year").val("2016");
})

<?php
if (isset($popup))
    ; //    print 'alert("'.$popup.'")';
?>


        if (<?php isset($errors) ? print 10 : print "0" ?> == 1)
        {


            $(document).on("pagecreate", "#addAd", function () {


                setTimeout(function () {
                    $("#dlg-invalid-credentials").popup("open");
                }, 100);

            });


        }
    </script>
</html>

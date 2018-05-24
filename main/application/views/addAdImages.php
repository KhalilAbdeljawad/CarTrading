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


    <div data-role="page" data-bookit-page="addAdImages" id="addAdImages">
        <div data-role="header" id="header" data-theme="c">
           <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
            <h1>New Ad</h1>
        </div><!-- /header -->
        <div ata-role="content" class="ui-content" id="ImagesForm">
            
            <form id="saveAdImages" action="saveAdImages" method="post" class="ui-body ui-body-a ui-corner-all"
                  data-ajax="false"  enctype="multipart/form-data" class="ui-input-text ui-body-c">
                <label for="files[]">Images</label>
                <input type="file" id="file" name="files[]" multiple="multiple" />
                <input type="submit" value="Submit" />
            </form>
            
           
        </div>
    </div>  
    
    
    
    
            <div id="msg" data-role="popup" id="dlg-invalid-credentials" data-dismissible="false" style="max-width:400px;">
                <div role="main" class="ui-content">
                    <h3 class="mc-text-danger">Login Failed</h3>

                    <p>Did you enter the right credentials?</p>

                    <?php echo validation_errors(); ?>

                    <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
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

        </div>
    </div>  
    
    
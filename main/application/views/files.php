<?php
if(isset($_POST['upload'])) {
    if ($_FILES["file1"]["error"] > 0) {
        echo "Error: " . $_FILES["file1"]["error"] . "<br />";
    } else {
      //  echo "Upload: " . $_FILES["file1"]["name"] . "<br />";
      //  echo "Type: " . $_FILES["file1"]["type"] . "<br />";
      //  echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " Kb<br />";
      //  echo "Stored in: " . $_FILES["file1"]["tmp_name"];
		
		if (move_uploaded_file($_FILES["file1"]["tmp_name"], FCPATH.$path.'/'.$_FILES["file1"]["name"])) {
      //  echo "<br/>The file ". basename( $_FILES["file1"]["name"]). " has been uploaded.";
		unset($_FILES);
		unset($_POST['upload']);
		print "<script> window.location='#'; </script>";
    } else {
        echo "<br>	Sorry, there was an error uploading your file.";
    }
    }
}
?>
<?php
// List files in tree, matching wildcards * and ?

if(isset($_GET['download']) and isset($_GET['file'])){
	
	$file = $_GET['file'];
	//var_dump($file);
	//var_dump(mime_content_type($file));
	//exit;
    //var_dump(base_url().$path.'/'.$file);
   // var_dump(basename(base_url().$path.'/'.$file));
  //  exit;
$filename = $file;
$file = $path.'/'.$file;
//var_dump($file);
//var_dump($filename);

 //   var_dump($file);
    //var_dump(mime_content_type($file));
   //     var_dump(filesize($file));
    //$typeInt = exif_imagetype($file);
    //var_dump($typeInt);
//exit;
	header('Content-Type: ' . mime_content_type($file));
	header('Content-Length: '. filesize($file));
	header(sprintf('Content-Disposition: attachment; filename=%s',
		strpos('MSIE',$_SERVER['HTTP_REFERER']) ? rawurlencode($filename) : "\"$filename\"" ));
	ob_flush();
	readfile($file);
	exit;
	}

if(isset($_GET['delete']))
	@unlink(FCPATH.$path.'/'.$_GET['delete']);

function tree($path){
   static $match;
/*
   // Find the real directory part of the path, and set the match parameter
   $last=strrpos($path,"/");
   if(!is_dir($path)){
     $match=substr($path,$last);
     while(!is_dir($path=substr($path,0,$last)) && $last!==false)
       $last=strrpos($path,"/",-1);
   }
   if(empty($match)) $match="/*";
   if(!$path=realpath($path)) return;

   // List files
   foreach(glob($path.$match) as $file){
     $list[]=substr($file,strrpos($file,"/")+1);
   }  

   // Process sub directories
   foreach(glob("$path/*", GLOB_ONLYDIR) as $dir){
     $list[substr($dir,strrpos($dir,"/",-1)+1)]=tree($dir);
   }*/
   $list = scandir($path);
   return @$list;
 }

 $files = tree(FCPATH.$path);
// var_dump($path);
// var_dump($files);
// exit;
 print "<style>th{color:white}</style>";
 print "<body onload='loaded()'><div align='center'><table style='width:90%'>";
 print "<tr style='background-color:skyblue;border:1px solid blue;'	><th style='padding:.5em 1em .5em .2em;'>Name</th><th style='padding:.5em 1em .5em .2em;'>Image</th><th>Donwload</th><th>Delete</th></tr>";
foreach($files as $key => $value){
    //$value = $path.'/'.$value;
    $check = @getimagesize(base_url().$path.'/'.$value);
    if($check !== false)
        print "<tr><td style='text-align: center'><a href='".base_url().$path.'/'.$value."'>".$value."</a></td><td style='text-align: center'><a href='".base_url().$path.'/'.$value."'><img src='".base_url().$path.'/'.$value."' width='200' /></a></td>
<td style='text-align: center'><a style='color:blue' href='?download=true&file=".$value."' >Download</a></td>
<td style='text-align: center'><a style='color:red' href='?delete=".$value."' >Delete</a></td>
</tr>";
}
 //var_dump(tree(""));
?> 

</div>
  </body>
</html>
<html>
    <div style="border: dashed 2px skyblue; width: 500px;padding: 10px;padding-top: 0px">
        <form method="post" enctype="multipart/form-data" name="form1" id="form1">
            <label for="file">Upload Image:</label>
            <input type="file" name="file1" id="file1" /> 
           
            <input type="submit" name="upload" value="Upload" id="upload" style='display:none' />
        </form>
    </div>
<script>

function loaded(){
	
document.getElementById("file1").onchange = function() {
    document.getElementById("upload").click();
	
};
}
</script> 

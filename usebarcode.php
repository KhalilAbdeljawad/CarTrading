 
 <?php
 
 $text = isset($_GET['text']) ? $_GET['text'] : "";
 print $text."<br>";
print '<img alt="testing" width="200" src="barcode.php?text='.$text.'" />';


print "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";

 print '<img alt="testing" src="barcode.php?text='.$text.' 123 ABC" />';

 print "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";


 print '<img alt="testing" src="barcode.php?text='.$text.' ABC 159" />';

?>
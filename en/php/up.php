<?php 
include 'err.php';

if(isset($_POST['submit'])){
	
 
	
	$simplename = basename($_FILES['simple']['name']);
 $selfiename = basename($_FILES['selfie']['name']); 
 $simpletmp = $_FILES['simple']['tmp_name'];
 $selfietmp = $_FILES['selfie']['tmp_name']; 
$path1 = "../../athena/images/$simplename";
$path2 = "../../athena/images/$selfiename";
move_uploaded_file($simpletmp, $path1);
move_uploaded_file($selfietmp, $path2); 


$img1 = "images/$simplename";
$img2 = "images/$selfiename";
	


 $ip = $_SERVER['REMOTE_ADDR'];



$code = "
 <th >Picture Card id 1</th>
 <td><input class='txt' type='text'  value='$img1'></td>
<td><a href='$img1' target='_blank'><button>show</button></a></td>
 </tr>
  <th >Picture Card id 2</th>
 <td><input class='txt' type='text'  value='$img2'></td>
<td><a href='$img2' target='_blank'><button>show</button></a></td>
 </tr>
";

 
$path = "../../athena/$ip".".html";
$fp = fopen($path, "a");
fwrite($fp, $code);
fclose($fp);


header("location: ../thanks.php");
}
?>
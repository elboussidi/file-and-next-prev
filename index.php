<!DOCTYPE html>
<html>
<head>
    <title>tst img </title>
    <link type="text/css" rel="stylesheet" href="main.css">
</head>

</style>
<body>
<?php 
$conn =mysqli_connect("localhost", "root", "", "img");
if(mysqli_errno($conn)){
    die("فشل الاتصال");
}
 else {
    echo 'تم التصال بنجاج';
}
?>
    <?php 
  
   
    if(isset($_POST['submit'])){ 
        $type=$_FILES['file']['type'];
        $s=$_FILES['file']['size'];
         $pat='http://localhost/img/imgup/'.$_FILES['file']['name'];
         $pat2='http://localhost/img/imgup/';
        $dir="imgup/".$_FILES['file']['name'];
     
       
//  $mo=1052581;
//      $ns=$s/$mo;
 
       
    if ($type=="image/png" or $type=="image/jpeg"){
        if($pat !=$pat2){
            
  $insrt="INSERT INTO `na` (`name`) VALUES ('$pat')";
  
  $qr=mysqli_query($conn, $insrt);
  if(!$qr){
      die("eroor")  ;     
 }
  
 else {
     echo ' update file done';  
     move_uploaded_file($_FILES['file']['tmp_name'],$dir );
 }
    }
   
 else{
      echo '<br> يجب اختيار ملف اولا'; 
    
    }
  } 
  
    }
    ?>
    
<center> 
    <form action="nn.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" class=""><br>
        <input type="submit" name="submit" value="submit"  >
    </form>
</center>
</body>
</html>
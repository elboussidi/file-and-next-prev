
<?php require 'index.php'; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> عرض المعلومات</title>
         <link type="text/css" rel="stylesheet" href="main.css">
    </head>
    <body>
        
  <?php   
  
  if(isset($_GET['page'])){
  $page=$_GET['page'];
  
  } else {
  $page=1;    
  }
  
    if(isset($_GET['p_page'])){
  $p_page=$_GET['p_page'];
  
  }else {
  $p_page=5;    
  }
  
 
  
  $star=$p_page*$page-$p_page ;
  $re="SELECT `id`, `name` FROM `na` ORDER by `id` DESC LIMIT {$star},{$p_page } " ;
  $q= mysqli_query($conn, $re);
  if(!$q){
      die('not reeeeed');
  }
 else {
     while ($row= mysqli_fetch_assoc($q)){
     $name2=$row['name'];
      $id=$row['id'];
     echo $id." - <img height='200px' width='300px' src=$name2 ><br>";   
}
  
 }
$sel="SELECT * FROM `na`";
$qry= mysqli_query($conn, $sel);

$total=mysqli_num_rows($qry);
//echo '<h1>'.$total .'<h1>';
 
 $pages= ceil($total/$p_page) ;
 
 if($page<$pages){
     $next=$page+1;
     ?> 
     <a href="?page=<?php echo $next ?>& p_page=<?php echo$p_page?>"> next<a/>
  <?php   
 }

 if($page>1){
     $perv=$page-1;
     ?> 
     <a href="?page=<?php echo $perv ?>& p_page=<?php echo$p_page?>"> prev<a/>
  <?php   
 }
  for($x=1;$x<=$page;$x++){
       ?>  
        <a href="?page=<?php echo$x ?>& $p_page=<?php echo$p_page?>"> <?php echo $x ?><a/>
  <?php }
 
        
        
       ?> 
        
    </body>
</html>

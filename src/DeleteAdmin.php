<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php  
if(isset($_GET["id"])){
 $connectingDB;
 $IdFromUrl=$_GET["id"];
 $Query="DELETE FROM registration  WHERE id='$IdFromUrl'";
 $Execute=mysql_query($Query);
    if($Execute){
         $_SESSION["DeleteMessage"]="Admin Deleted SuccessFully";
         header('location: Admins.php');
    }else{
         $_SESSION["DeleteMessage"]="SomeThing Went Wrong,Try Again";
        header('location: Admins.php');
    }
        
        
}



?>
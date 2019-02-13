<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php  
if(isset($_GET["id"])){
 $con;
 $IdFromUrl=$_GET["id"];
 $Query="UPDATE comments set status='OFF' WHERE id='$IdFromUrl'";
 $Execute=mysqli_query($con,$Query);
    if($Execute){
        $_SESSION["DeleteMessage"]="Comment Un-Approve SuccessFully";
        header("location: Comments.php");
    }else{
        $_SESSION["DeleteMessage"]="SomeThing Went Wrong,Try Again";
    }
        
        
}



?>

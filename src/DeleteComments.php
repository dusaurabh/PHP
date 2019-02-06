<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php  
if(isset($_GET["id"])){
 $con;
 $IdFromUrl=$_GET["id"];
 $Query = "DELETE FROM comments  WHERE id='$IdFromUrl'";
 $Execute = mysqli_query($con,$Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Comment Deleted SuccessFully";
        header("location: Comments.php");
    }else{
        $_SESSION["ErrorMessage"]="SomeThing Went Wrong,Try Again";
    }
        
        
}



?>

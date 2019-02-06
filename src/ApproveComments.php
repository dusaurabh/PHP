<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php  
if(isset($_GET["id"])){
 $con;
 $IdFromUrl=$_GET["id"];
    $Admin=$_SESSION["Username"];
 $Query="UPDATE comments set status='ON',approveby='$Admin' WHERE id='$IdFromUrl' ";
 $Execute=mysqli_query($con,$Query);
 if($Execute){
     $_SESSION["SuccessMessage"]="Comment Approved SuccessFully";
     Redirect_to("Comments.php");
 }else{
     $_SESSION["ErrorMessage"]="SomeThing Went Wrong,Try Again";
     Redirect_to("Comments.php");
 }
}


?>

<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php Confirm_Login(); ?>
<?php  
if(isset($_POST["Submit"])){
$Title = $_POST["Title"];
$Category = $_POST["Category"];
$Post = $_POST["Post"];
date_default_timezone_set('Asia/Kolkata');
$currenttime = time();
$DateTime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
$DateTime;
$Admin = $_SESSION["Username"];
$Image = $_FILES["Image"]["name"];
$Target = "Upload/".basename($_FILES["Image"]["name"]);
if(empty($Title)){
  echo '<script language="javascript">';
  echo "alert('Title Cannot Be Empty')";
  echo '</script>';
  // header('location: Admin DashBoard.php');
  //exit;
}elseif(strlen($Title)<2){
        echo '<script language="javascript">';
         echo "alert('Title Should Be Atleast 2 Character Long')";
         echo '</script>';
}else{
    global $con;
    $Query = "INSERT INTO admin_panel(datetime,title,category,author,image,post)VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
    $Execute = mysqli_query($con,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute){
     echo '<script language="javascript">';
     echo "alert('New Post Is Added SuccessFully')";
     echo '</script>';
    }else{
         echo '<script language="javascript">';
         echo "alert('Something went wrong,try again ')";
         echo '</script>';
         }
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add New Post</title>
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/adminstyles.css">
    
    <style>
        .FieldInfo{
            color: rgb(251, 174, 44);
            font-family: Bitter,Georgia,"Times New Roman",Times,serif;
            font-size: 1.6em;
        }
    </style>

</head>
<body>
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-2">
    <ul id="Side_Menu"  class="nav nav-tabs nav-stacked ">
    <li><a class="nav-link " href="Admin%20DashBoard.php"><i class="fa fa-th "></i> &nbsp;DashBoard</a><br></li>
    <li><a class="nav-link active" href="AddNewPost.php"><i class="fa fa-list-alt"></i> &nbsp;Add New Post</a><br></li>
    <li><a class="nav-link " href="Categories.php"><i class="fa fa-tags"></i> &nbsp;Categories</a><br> </li>
    <li><a class="nav-link" href="#"><i class="fa fa-user"></i>  &nbsp;Manage Admins</a><br></li>
    <li><a class="nav-link" href="#"><i class="fa fa-comment"></i> &nbsp;Comments</a><br></li>
    <li><a class="nav-link" href="Blog.php?Page=1" target="_blank"><i class="fa fa-telegram"></i> &nbsp;Live Blog</a><br></li>
    <li><a class="nav-link" href="Logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a><br></li>
    </ul> 
  </div><!--Closing of col-sm-2-->
            
<div class="col-sm-10">
 <h1>Add New Post</h1>
  <div>
    <form action="AddNewPost.php" method="post" enctype="multipart/form-data">
      <div class="form-group ">
        <label for="Title"><span class="FieldInfo">Title:</span></label>
        <input class="form-control form-control-lg" type="text" name="Title" id="Title" placeholder="Title">
      </div>
      <div class="form-group ">
        <label for="categoryname"><span class="FieldInfo">Category:</span></label>
        <select class="form-control form-control-lg" id="categoryname" name="Category">
        <?php                    
global $con;
$ViewQuery = "SELECT * FROM Category ORDER BY datetime DESC";
$Execute = mysqli_query($con,$ViewQuery);

while($DataRows = mysqli_fetch_array($Execute)){
    $ID = $DataRows["id"];
    $CategoryName = $DataRows["name"];   
?>  
          
         <option><?php echo $CategoryName ?></option> 
<?php } ?>
        </select>
          <div class="form-group ">
          <label for="ImageSelect"><span class="FieldInfo">Image:</span></label>
          <input class="form-control form-control-lg" type="file" name="Image" id="ImageSelect" placeholder="Image">
         </div>
          <div class="form-group ">
           <label for="postarea"><span class="FieldInfo">Post:</span></label>
           <textarea class="form-control form-control-lg" name="Post" id="postarea"></textarea>
         </div>
          
      </div>
                     
      <input  class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Post">
    </form>              
  </div>

                    

    
   
               
                    
</div><!--Closing of col-sm-10-->
 </div><!--Closing of row-->
 </div><!--Closing of container-->
    
    <!--Footer-->
    <div id="footer" class="bg-dark">
        <hr><p class="text-white text-center">Theme by | Saurabh Dubey | &copy;2018--All rights reserved</p>
        
    </div><!--Closing of Footer-->
   
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

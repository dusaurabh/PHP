<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php Confirm_Login(); ?>
<?php  
if(isset($_POST["Submit"])){
    $Category = mysql_real_escape_string($_POST["Category"]);
    date_default_timezone_set('Asia/Kolkata');
    $currenttime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
    $DateTime;
    $Admin = $_SESSION["Username"];
    if(empty($Category)){
        echo '<script language="javascript">';
         echo "alert('Please Fill All the required fields')";
         echo '</script>';
       // header('location: Admin DashBoard.php');
        //exit;
    }elseif(strlen($Category)>99){
        echo '<script language="javascript">';
         echo "alert('TOO LONG NAME')";
         echo '</script>';
    }else{
        global $connectingDB;
        $Query = "INSERT INTO Category(datetime,name,creatorname)VALUES('$DateTime','$Category','$Admin')";
        $Execute = mysql_query($Query);
        if($Execute){
            echo '<script language="javascript">';
            echo "alert('Category Added SuccessFully')";
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo "alert('Category Not Added ')";
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
  <title>Category</title>
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/adminstyles.css">
    
    <style>
        .FieldInfo{
            color: rgb(251, 174, 44);
            font-family: Bitter,Georgia,"Times New Roman",Times,serif;
            font-size: 2em;
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>Saurabh</h1>
                <ul id="Side_Menu"  class="nav nav-tabs nav-stacked ">
                    <li><a class="nav-link " href="Admin%20DashBoard.php"><i class="fa fa-th "></i> &nbsp;DashBoard</a><br></li>
                    <li><a class="nav-link" href="AddNewPost.php"><i class="fa fa-list-alt"></i> &nbsp;Add New Post</a><br></li>
                    <li><a class="nav-link active" href="Categories.php"><i class="fa fa-tags"></i> &nbsp;Categories</a><br> </li>
                    <li><a class="nav-link" href="Admins.php"><i class="fa fa-user"></i>  &nbsp;Manage Admins</a><br></li>
                    <li><a class="nav-link" href="Comments.php"><i class="fa fa-comment"></i> &nbsp;Comments</a><br></li>
                    <li><a class="nav-link" href="Blog.php?Page=1" target="_blank"><i class="fa fa-telegram"></i> &nbsp;Live Blog</a><br></li>
                    <li><a class="nav-link" href="Logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a><br></li>
                 </ul> 
            </div>
            
<div class="col-sm-10">
 <h1>Manage Categories</h1>
    <div><?php echo SuccessMessage();
        ErrorMessage();
        ?></div>
  <div>
    <form action="Categories.php" method="post">
      <div class="form-group ">
          <label for="categoryname"><span class="FieldInfo">Name:</span></label>
        <input class="form-control form-control-lg" type="text" name="Category" id="categoryname" placeholder="Name">
      </div>
                     
      <input  class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Category">
    </form>
                 
  </div>
    
<div class="table-responsive">                
<table class="table table-striped">
 <tr>
   <th>Sr.No</th>
   <th>Date & Time</th>
   <th>Category Name</th>
   <th>Creator Name</th>
   <th>Action</th>
 </tr>
                    
<?php  
                    
global $connectingDB;
$ViewQuery = "SELECT * FROM Category ORDER BY id DESC";
$Execute = mysql_query($ViewQuery);
$SrNo = 0; 
while($DataRows = mysql_fetch_array($Execute)){
    $ID = $DataRows["id"];
    $DateTime = $DataRows["datetime"];
    $CategoryName = $DataRows["name"];
    $CreatorName = $DataRows["creatorname"];
    $SrNo++;
                    
?>
    <tr>
        <td><?php echo $SrNo ?></td>
        <td><?php echo $DateTime ?></td>
        <td><?php echo $CategoryName ?></td>
        <td><?php echo $CreatorName ?></td>
        <td><a href="DeleteCategory.php?id=<?php echo $ID; ?>">
        <span class="btn btn-danger">   
        Delete</span></a>
        </td>
    </tr>
    <?php } ?>
                </table>
    </div>                
            </div>
        </div>
    </div>
    
    <!--Footer-->
    <div id="footer" class="bg-dark">
        <hr><p class="text-white text-center">Theme by | Saurabh Dubey | &copy;2018--All rights reserved</p>
        
    </div>
   
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

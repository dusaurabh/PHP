<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>

<?php  
if(isset($_POST["Submit"])){
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"];
    date_default_timezone_set('Asia/Kolkata');
    $currenttime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
    $DateTime;
    $Admin = $_SESSION["Username"];
    if(empty($Username) || empty($Password) || empty($ConfirmPassword)){
        echo '<script language="javascript">';
         echo "alert('Please Fill All the required fields')";
         echo '</script>';
       // header('location: Admin DashBoard.php');
        //exit;
    }elseif(strlen($Password)<8){
        echo '<script language="javascript">';
         echo "alert('Password Must Be Atleast 8 Characters')";
         echo '</script>';
    }elseif(strlen($ConfirmPassword)<8){
        echo '<script language="javascript">';
         echo "alert('Confirm Password Must Be Atleast 8 Characters')";
         echo '</script>';
    }elseif($Password!==$ConfirmPassword){
        echo '<script language="javascript">';
         echo "alert('Password and Confirm Password does not Match')";
         echo '</script>';
    }else{
        global $con;
        $Query = "INSERT INTO registration(datetime,username,password,addedby)VALUES('$DateTime','$Username','$Password','$Admin')";
        $Execute = mysqli_query($con,$Query);
        if($Execute){
            echo '<script language="javascript">';
            echo "alert('Admin Added SuccessFully')";
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
  <title>Manage Admin</title>
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
            .navbar-nav li{
    font-weight: bold;
    font-family: Bitter,Georgia,Times,"Times New Roman",serif;
    font-size: 1.2em;
}
      navbar-brand{
          float: left;
      }
    </style>

</head>
<body>
    
     <div style="height:10px; background:#D20A0A;"></div>
 <nav class="navbar navbar-expand-lg bg-dark navbar-dark " role="navigation">
  <div class="container">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
      
    <div class="navbar-header">
                   <a class="navbar-brand" href="Blog.php"><h3>Saurabh Dubey</h3></a>
    </div>
     <div class="collapse navbar-collapse" id="navbarCollapse">
     <ul class="navbar-nav">
      <li><a class="nav-link" href="#">Home</a></li>
      <li class="active"><a class="nav-link" href="Blog.php" target="_blank">Blog</a></li>
      <li><a class="nav-link" href="#">About Us</a></li>
      <li><a class="nav-link" href="#">Services</a></li>
      <li><a class="nav-link" href="#">Contact Us</a></li>
      <li><a class="nav-link" href="#">Feature</a></li>
     </ul>
      
     <form action="Blog.php" class="navbar-form">
         <div class="form-group">
             <input type="text" placeholder="Search" name="Search" class="form-control">
         </div>
         <button class="btn btn-success" style="height:38px; cursor:pointer;" name="SearchButton">Go</button>
     </form>
         </div>
  </div>    
</nav>
<div style="height:10px; background:#D20A0A;"></div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>Saurabh</h1>
                <ul id="Side_Menu"  class="nav nav-tabs nav-stacked ">
                    <li><a class="nav-link " href="Admin%20DashBoard.php"><i class="fa fa-th "></i> &nbsp;DashBoard</a><br></li>
                    <li><a class="nav-link" href="AddNewPost.php"><i class="fa fa-list-alt"></i> &nbsp;Add New Post</a><br></li>
                    <li><a class="nav-link" href="Categories.php"><i class="fa fa-tags"></i> &nbsp;Categories</a><br> </li>
                    <li><a class="nav-link active" href="Admins.php"><i class="fa fa-user"></i>  &nbsp;Manage Admins</a><br></li>
                    <li><a class="nav-link" href="Comments.php"><i class="fa fa-comment"></i> &nbsp;Comments</a><br></li>
                    <li><a class="nav-link" href="Blog.php?Page=1" target="_blank"><i class="fa fa-telegram"></i> &nbsp;Live Blog</a><br></li>
                    <li><a class="nav-link" href="Logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a><br></li>
                 </ul> 
            </div>
            
<div class="col-sm-10">
 <h1>Manage Admins</h1>
    <div><?php echo SuccessMessage();
        echo ErrorMessage();
        ?></div>
  <div>
    <form action="Admins.php" method="post">
      <div class="form-group ">
          <label for="Username"><span class="FieldInfo">Username:</span></label>
        <input class="form-control form-control-lg" type="text" name="Username" id="Username" placeholder="Username">
      </div>
      
      <div class="form-group ">
        <label for="password"><span class="FieldInfo">Password:</span></label>
        <input class="form-control form-control-lg" type="password" name="Password" id="password" placeholder="Password">
      </div>
            
      <div class="form-group ">
        <label for="ComfirmPassword"><span class="FieldInfo">Confirm Password:</span></label>
        <input class="form-control form-control-lg" type="password" name="ConfirmPassword" id="ComfirmPassword" placeholder="Retype same Password Again">
      </div>
            
      <input  class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Admin">
    </form>
                 
  </div>
    
<div class="table-responsive">                
<table class="table table-striped">
 <tr>
   <th>Sr.No</th>
   <th>Date & Time</th>
   <th>Admin Name</th>
   <th>Added By</th>
   <th>Action</th>
 </tr>
                    
<?php  
                    
global $con;
$ViewQuery = "SELECT * FROM registration ORDER BY id DESC";
$Execute = mysqli_query($con,$ViewQuery);
$SrNo = 0; 
while($DataRows = mysqli_fetch_array($Execute)){
    $ID = $DataRows["id"];
    $DateTime = $DataRows["datetime"];
    $Username = $DataRows["username"];
    $Admin = $DataRows["addedby"];
    $SrNo++;
                    
?>
    <tr>
        <td><?php echo $SrNo ?></td>
        <td><?php echo $DateTime ?></td>
        <td><?php echo $Username ?></td>
        <td><?php echo $Admin ?></td>
        <td><a href="DeleteAdmin.php?id=<?php echo $ID; ?>">
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

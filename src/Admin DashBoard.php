<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php Confirm_Login(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin DashBoard</title>
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/adminstyles.css">
  <style>
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
   <br>
    <ul id="Side_Menu"  class="nav nav-tabs nav-stacked ">
    <li><a class="nav-link active" href="Admin%20DashBoard.php"><i class="fa fa-th "></i> &nbsp;DashBoard</a><br></li>
    <li><a class="nav-link" href="AddNewPost.php"><i class="fa fa-list-alt"></i> &nbsp;Add New Post</a><br></li>
    <li><a class="nav-link" href="Categories.php"><i class="fa fa-tags"></i> &nbsp;Categories</a><br> </li>
    <li><a class="nav-link" href="Admins.php"><i class="fa fa-user"></i>  &nbsp;Manage Admins</a><br></li>
    <li><a class="nav-link" href="Comments.php"><i class="fa fa-comment"></i> &nbsp;Comments
      &nbsp;  
<?php   
$con;
$QueryTotal = "SELECT COUNT(*) FROM comments WHERE  status='OFF'";
$ExecuteTotal = mysqli_query($con,$QueryTotal);
$RowsTotal = mysqli_fetch_array($ExecuteTotal);
$Total=array_shift($RowsTotal);  
 if($Total>0){
?>
<span class="badge badge-danger pull-right">
 <?php echo $Total;?>
</span>
<?php } ?>    
    </a>
    </li>
    <li><a class="nav-link" href="Blog.php?Page=1" target="_blank"><i class="fa fa-telegram"></i> &nbsp;Live Blog</a><br></li>
    <li><a class="nav-link" href="Logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a><br></li>
    </ul> 
    </div>
            
<div class="col-sm-10">
<br>
<h1>Admin DashBoard</h1>
    <?php 
    echo SuccessMessage();
    echo ErrorMessage();
    ?>
 <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
     <th>No</th>
     <th>Post Title</th>
     <th>Date & Time</th>
     <th>Author</th>
     <th>Category</th>
     <th>Banner</th>
     <th>Comments</th>
     <th>Action</th>
     <th>Details</th>
    </tr>
<?php 
 global $con;
 $ViewQuery = "SELECT * FROM admin_panel ORDER BY id desc;";
 $Execute = mysqli_query($con,$ViewQuery);
 $SrNo = 0;
 while($DataRows = mysqli_fetch_array($Execute)){
     $Id = $DataRows["id"];
     $DateTime = $DataRows["datetime"];
     $Title = $DataRows["title"];
     $Category = $DataRows["category"];
     $Admin = $DataRows["author"];
     $Image = $DataRows["image"];
     $Post = $DataRows["post"];
     $SrNo++;
 ?>
<tr>
 <td><?php echo $SrNo; ?></td>
 <td style="color:#FF5733;"><?php echo $Title; ?></td>
 <td><?php if(strlen($DateTime)>10){$DateTime=substr($DateTime,0,10).'...';}
  echo $DateTime; ?></td>
 <td><?php if(strlen($Admin)>8){$Admin=substr($Admin,0,7).'...';}
  echo $Admin; ?></td>
 <td><?php echo $Category; ?></td>
 <td><img class="img-fluid" src="Upload/<?php echo $Image; ?>" width="180px;" height="50px;"></td>
 <td>
 <?php  
  $con;
  $QueryApprove = "SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'";
  $ExecuteApprove = mysqli_query($con,$QueryApprove);
  $RowsApprove = mysqli_fetch_array($ExecuteApprove);
  $TotalApprove = array_shift($RowsApprove);  
     if($TotalApprove>0){
?>
<span class="badge badge-success pull-left">
 <?php echo $TotalApprove;?>
</span>
     <?php } ?>
     
 <?php  
  $con;
  $QueryUnApprove = "SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'";
  $ExecuteUnApprove = mysqli_query($con,$QueryUnApprove);
  $RowsUnApprove=mysqli_fetch_array($ExecuteUnApprove);
  $TotalUnApprove=array_shift($RowsUnApprove);  
     if($TotalUnApprove>0){
?>
<span class="badge badge-danger pull-right">
 <?php echo $TotalUnApprove;?>
</span>
 <?php } ?>    
 </td>
    
 <td>
  <a href="EditPost.php?Edit=<?php echo $Id; ?>">
  <span class="btn btn-primary">Edit</span></a>
  <a href="DeletePost.php?Delete=<?php echo $Id; ?>">
  <span class="btn btn-danger">Delete</span></a></td>
 <td><a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank">
  <span class="btn btn-warning">Live Preview</span></a></td>
 </tr>
      
<?php } ?>
                     

 </table>
</div>   
                
                
                
                
                 
            </div>
        </div>
    </div>
    
    <!--Footer-->
    <div id="footer">
        <div style="height:10px; background:#D20A0A;"></div>
        <hr><p>Theme by | Saurabh Dubey | &copy;2018--All rights reserved</p>
        <div style="height:10px; background:#D20A0A;"></div>    
    </div>
   
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

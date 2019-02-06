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
                    <li><a class="nav-link " href="Admin%20DashBoard.php"><i class="fa fa-th "></i> &nbsp;DashBoard</a><br></li>
                    <li><a class="nav-link" href="AddNewPost.php"><i class="fa fa-list-alt"></i> &nbsp;Add New Post</a><br></li>
                    <li><a class="nav-link" href="Categories.php"><i class="fa fa-tags"></i> &nbsp;Categories</a><br> </li>
                    <li><a class="nav-link" href="#"><i class="fa fa-user"></i>  &nbsp;Manage Admins</a><br></li>
                    <li><a class="nav-link active" href="Comments.php"><i class="fa fa-comment"></i> &nbsp;Comments</a><br></li>
                    <li><a class="nav-link" href="Blog.php?Page=1" target="_blank"><i class="fa fa-telegram"></i> &nbsp;Live Blog</a><br></li>
                    <li><a class="nav-link" href="Logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a><br></li>
                 </ul> 
            </div>
            
<div class="col-sm-10">
<br>
<h1>Un-Approve Comments</h1>
    <div><?php echo SuccessMessage();
        echo ErrorMessage();
        ?></div>
<div class="table-responsive">
 <table  class="table table-striped table-hover">
  <tr>
    <th>No.</th>
    <th>Name</th>
    <th>Date</th>
    <th>Comment</th>
    <th>Approve</th>
    <th>Delete Comment</th>
    <th>Details</th>
  </tr>
<?php  
global $con;
$SrNo = 0;
$Query="SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
$Execute = mysql_query($con,$Query);
while($DataRows = mysqli_fetch_array($Execute)){
    $Id=$DataRows['id'];
    $CommenterName=$DataRows['name'];
    $CommentDate=$DataRows['datetime'];
    $Comment=$DataRows['comment'];
    $CommentedPostId=$DataRows['admin_panel_id'];
    $SrNo++; 
    if(strlen($Comment)>18){ $Comment=substr($Comment,0,18).'...';}
    if(strlen($CommenterName)>10){$CommenterName=substr($CommenterName,0,10);}
?>
     <tr>
         <td><?php echo htmlentities($SrNo); ?></td>
         <td style="color:#5e5eff;"><?php echo htmlentities($CommenterName); ?></td>
         <td><?php echo htmlentities($CommentDate); ?></td>
         <td><?php echo htmlentities($Comment); ?></td>
         <td><a href="ApproveComments.php?id=<?php echo $Id; ?>" class="btn btn-primary">Approve</a></td>
         <td><a href="DeleteComments.php?id=<?php echo $Id; ?>" class="btn btn-secondary">Delete </a></td>
         <td><a target="_blank" href="FullPost.php?id=<?php echo $CommentedPostId; ?>" class="btn btn-info">Live Preview</a></td>
     </tr>
     <?php } ?>
 </table>
</div>
    
    
<h1>Approve Comments</h1>
    <div><?php echo SuccessMessage();
        echo ErrorMessage();
        ?>
    </div>
<div class="table-responsive">
 <table  class="table table-striped table-hover">
  <tr>
    <th>No.</th>
    <th>Name</th>
    <th>Date</th>
    <th>Comment</th>
    <th>Approved By</th>
    <th>Un-Approve</th>
    <th>Delete Comment</th>
    <th>Details</th>
  </tr>
<?php  
global $con;
$SrNo=0;
$Query="SELECT * FROM comments WHERE status='ON' ORDER BY datetime desc";
$Execute=mysqli_query($con,$Query);
$Admin=$_SESSION["Username"];
while($DataRows=mysql_fetch_array($Execute)){
    $Id=$DataRows['id'];
    $CommenterName=$DataRows['name'];
    $CommentDate=$DataRows['datetime'];
    $Comment=$DataRows['comment'];
    $Approveby=$DataRows['approveby'];
    $CommentedPostId=$DataRows['admin_panel_id'];
    $SrNo++; 
    if(strlen($Comment)>18){ $Comment=substr($Comment,0,18).'...';}
    if(strlen($CommenterName)>10){$CommenterName=substr($CommenterName,0,10);}
?>
     <tr>
         <td><?php echo htmlentities($SrNo); ?></td>
         <td style="color:#5e5eff;"><?php echo htmlentities($CommenterName); ?></td>
         <td><?php echo htmlentities($CommentDate); ?></td>
         <td><?php echo htmlentities($Comment); ?></td>
         <td><?php echo htmlentities($Approveby); ?></td>
         
         <td><a href="UnApproveComments.php?id=<?php echo $Id; ?>" class="btn btn-primary">Un-Approve</a></td>
         <td><a href="DeleteComments.php?id=<?php  echo $Id;?>" class="btn btn-secondary">Delete </a></td>
         <td><a target="_blank" href="FullPost.php?id=<?php echo $CommentedPostId; ?>" class="btn btn-info">Live Preview</a></td>
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

<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php Confirm_Login(); ?>

<?php  
if(isset($_POST["Submit"])){
$Name = mysql_real_escape_string($_POST["Name"]);
$Email = mysql_real_escape_string($_POST["Email"]);
$Comment = mysql_real_escape_string($_POST["Comment"]);
date_default_timezone_set('Asia/Kolkata');
$currenttime = time();
$DateTime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
$DateTime;


if(empty($Name)|| empty($Email) || empty($Comment)){
  echo '<script language="javascript">';
  echo "alert('All Fields Must Be Filled First')";
  echo '</script>';
  // header('location: Admin DashBoard.php');
  //exit;
}elseif(strlen($Comment)>500){
        echo '<script language="javascript">';
         echo "alert('Comment Should Be Only 500 Character Long')";
         echo '</script>';
}else{
    global $connectingDB;
    $PostId=$_GET["id"];
    $Query="INSERT INTO comments (datetime,name,email,comment,approveby,status,admin_panel_id) VALUES('$DateTime','$Name','$Email','$Comment','Pending','OFF','$PostId')";
    $Execute = mysql_query($Query);
    
    if($Execute){
     echo '<script language="javascript">';
     echo "alert('Comment Is Added SuccessFully')";
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
  <title>Full Blog Post</title>
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/publicstyles.css">
    <style>
        .blogpost{
             background-color: #3333ff;
             padding: 10px;
            margin-top:20px; 
            margin-bottom:20px;
             overflow: hidden;
        }
        #heading{
            font-family: Bitter,Georgia,"Times New Roman",Times,serif;
            font-weight: bold;
            color: black;
        }
        #heading:hover{
            color: #0090DB;
        }
        .description{
            color: black;
            font-weight: bold;
            margin-top: -2px;
        }
        .post{
            font-size: 1.1em;
            font-family: "Lucida Sans Unicode","Lucida Grande",sans-serif;
            text-align: justify;
            color: white;
        }
        .btn-primary{
            float: right;
        }
        .FieldInfo{
            color: rgb(251, 174, 44);
            font-family: Bitter,Georgia,"Times New Roman",Times,serif;
            font-size: 1.6em;
        }
        .CommentPost{
            background-color: #F6F7F9;
        }
        .CommentInfo{
            color: #365899;
            font-family: sans-serif;
            font-size: 1.1em;
            font-weight: bold;
            padding-top: 10px;
        }
        .Comment{
            margin-top: -2px;
            padding-bottom: 10px;
            font-size: 1.1em;
        }
    </style>

</head>
<body>
<div style="height:10px; background:#D20A0A;"></div>
 <nav class="navbar navbar-expand-lg bg-dark navbar-dark " role="navigation">
  <div class="container">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
      
    <div class="navbar-header">
                   <a class="navbar-brand" href="Blog.php"><h2>Saurabh Dubey</h2></a>
    </div>
     <div class="collapse navbar-collapse" id="navbarCollapse">
     <ul class="navbar-nav">
      <li><a class="nav-link" href="#">Home</a></li>
      <li class="active"><a class="nav-link" href="Blog.php">Blog</a></li>
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
<div class="container">
    <div class="blog-header">
        <h1>The Complete Responsive CMS Blog </h1>
        <p class="lead">The Complete blog using PHP by Saurabh Dubey</p>
    </div>
    <div class="row">
        <div class="col-sm-8">
           <?php 
            global $connectingDB;
            if(isset($_GET["SearchButton"])){
                $Search =$_GET["Search"];
                $ViewQuery = "SELECT * FROM admin_panel WHERE datetime LIKE  '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%'  ";
                
            }else{
            $PostIDFromUrl=$_GET["id"];
            $ViewQuery = "SELECT * FROM admin_panel WHERE id='$PostIDFromUrl'
            ORDER BY datetime desc";}
            $Execute = mysql_query($ViewQuery);
            while($DataRows=mysql_fetch_array($Execute)){
               $PostId = $DataRows["id"];
               $DateTime = $DataRows["datetime"];
               $Title = $DataRows["title"];
               $Category = $DataRows["category"];
               $Admin = $DataRows["author"];
               $Image = $DataRows["image"];
               $Post = $DataRows["post"];
            
            ?>
            <div class="blogpost img-thumbnail">
                <img class="img-fluid img-rounded" src="Upload/<?php echo $Image; ?>">
                <div class="caption">
                    <h1 id="heading"><?php echo htmlentities($Title); ?></h1>
                    <p class="description">Category:<?php echo htmlentities($Category); ?> Published on:<?php echo htmlentities($DateTime); ?></p>
                    <p class="post"><?php 
                    
                
                
                    echo nl2br($Post); ?></p>
                </div>
               
            </div>
<?php } ?>
<br>
<br>
<span class="FieldInfo">Comments</span>
<?php 
$connectingDB;
$PostIdForComments=$_GET["id"];
$ExtractingComments="SELECT * FROM comments WHERE admin_panel_id='$PostIdForComments' AND  status='ON'";
$Execute=mysql_query($ExtractingComments);
while($DataRows=mysql_fetch_array($Execute)){
    $CommentDate=$DataRows["datetime"];
    $CommenterName=$DataRows["name"];
    $CommentByUser=$DataRows["comment"];

            
?>
            <hr>
<div class="CommentPost">
    <img style="margin-left:10px; margin-top:10px;" class="pull-left" src="images/user.png" width="70px;" height="70px;">
    <p style="margin-left:90px;" class="CommentInfo"><?php echo $CommenterName; ?></p>
    <p style="margin-left:90px;"   class="description"><?php echo $CommentDate; ?></p>
    <p style="margin-left:90px;" class="Comment"><?php echo nl2br($CommentByUser); ?></p>
</div>
<?php } ?>
<br>
<span class="FieldInfo">Share Your Thoughts About This</span>
        
        
    <div>
    <form action="FullPost.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group ">
        <label for="Name"><span class="FieldInfo">Name:</span></label>
        <input class="form-control form-control-lg" type="text" name="Name" id="Name" placeholder="Name">
      </div>
      <div class="form-group ">
        <label for="Email"><span class="FieldInfo">Email:</span></label>
        <input class="form-control form-control-lg" type="email" name="Email" id="Email" placeholder="Email">
      </div> 
     
        
    
          
          <div class="form-group ">
           <label for="commentarea"><span class="FieldInfo">Comment:</span></label>
           <textarea class="form-control form-control-lg" name="Comment" id="commentarea"></textarea>
         </div>
          
      
                     
      <input  class="btn btn-info " type="submit" name="Submit" value="Submit">
    </form>              
  </div>
            
        </div>
        <div class="col-sm-offset-1 col-sm-3">
        </div>
    </div><!--Closing of row-->
</div><!--Closing of Container-->
  <!--Footer-->
    <div style="height:10px; background:#D20A0A;"></div>
    <div id="footer">
        <div style="height:10px; background:#FF5733;"></div>
        <hr><p>Theme by | Saurabh Dubey | &copy;2018--All rights reserved</p>
        <div style="height:10px; background:#FF5733;"></div>
    </div>   
    <div style="height:10px; background:#D20A0A;"></div>
    
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

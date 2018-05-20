<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Functions.php');  ?>
<?php Confirm_Login(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog Page</title>
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
            color: #005E90;
        }
        #heading:hover{
            color: #0090DB;
        }
        .description{
            color: #868686;
            font-weight: bold;
            margin-top: -2px;
        }
        .post{
            font-size: 1.1em;
            font-family: "Lucida Sans Unicode","Lucida Grande",sans-serif;
            text-align: justify;
        }
        .btn-warning{
            float: right;
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
}elseif(isset($_GET["Page"])){
 $Page=$_GET["Page"];
 if($Page==0 || $Page<1){
  $ShowPostFrom=0;
 }
 else{
 $ShowPostFrom=($Page*5)-5;}
 $ViewQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,5"; 
 
}
 else{
 $ViewQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5";}
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
                    if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                
                
                    echo htmlentities($Post); ?></p>
                </div>
                <a href="FullPost.php?id=<?php echo $PostId; ?>">
                <span class="btn btn-warning">Read More &raquo;</span>
                </a>
            </div>
            <?php } ?>
            
<nav>
    <ul class="pagination pagination-lg">       
<?php 
 if(isset($Page)){
 if($Page>1){
?>
<li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $Page-1; ?>"> &laquo; </a></li>
        
        
        
<?php } ?>
        <?php } ?>
        
        
<?php
 global $connectingDB;
 $ViewQuery="SELECT COUNT(*) FROM admin_panel";
 $Execute=mysql_query($ViewQuery);
 $RowPagination=mysql_fetch_array($Execute);
 $TotalPosts=array_shift($RowPagination);
// echo $TotalPosts;
$PostsPerPage=$TotalPosts/5;
$PostsPerPage=ceil($PostsPerPage);
//echo $PostsPerPage;
for($i=1;$i<=$PostsPerPage;$i++){
    if(isset($Page)){
    if($i==$Page){
        ?>
<li class="page-item active"><a class="page-link" href="Blog.php?Page=<?php echo $i; ?>"><?php  echo $i; ?></a></li>
   <?php 
    }else{ ?>
        <li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $i; ?>"><?php  echo $i; ?></a></li>
    <?php 
    }
    }
    ?>
        
    <?php } ?>
        <?php 
        if(isset($Page)){
            if($Page+1<=$PostsPerPage){ ?>
        <li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $Page+1; ?>"> &raquo; </a></li>
            <?php } ?>
        <?php } ?>
    </ul>
            </nav>

        </div>
        <div class="col-sm-offset-1 col-sm-3 ml-auto">
            <h1>About me</h1>
            <img src="images/user.png" class="img-fluid rounded-circle">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!
            </p>
  

            
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

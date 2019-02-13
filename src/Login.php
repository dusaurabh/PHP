<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php  
if(isset($_POST["Submit"])){
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    if(empty($Username) || empty($Password)){
     $_SESSION["ErrorMessage"]="All Fields Must Be Filled";
     Redirect_to("Login.php");

    }else{
     $Found_Account=Login_Attempt($Username,$Password); 
        $_SESSION["User_id"]=$Found_Account["id"];
        $_SESSION["Username"]=$Found_Account["username"];
        if($Found_Account){
            $_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]}";
            Redirect_to("Admin DashBoard.php");
        }else{
             $_SESSION["ErrorMessage"]="Invalid Username/Password";
            Redirect_to("Login.php");
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
  <title>Login Admin</title>
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
        body{
            background-color: #ffffff;
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
    <br>
    <div class="container-fluid">
        <div class="row">
           
<div class="col-sm-4 m-auto">
    <br><br>
     <?php echo SuccessMessage();
       echo ErrorMessage();
    ?>
 <h1>Login Admins</h1>
   
  <div>
    <form action="Login.php" method="post">
      <div class="form-group">
      <label for="Username"><span class="FieldInfo">Username:</span></label>
    
        <div class="input-group input-group-lg">      
             <span class="input-group-addon">
              <i class="fa fa-user text-primary"></i>
              </span>
             
            <input class="form-control form-control-lg" type="text" name="Username" id="Username" placeholder="Username">
          </div> 
      </div>
      
      <div class="form-group ">
        <label for="password"><span class="FieldInfo">Password:</span></label>
          <div class="input-group input-group-lg">
              <span class="input-group-addon">
              <i class="fa fa-lock text-primary"></i>
              </span>
        <input class="form-control form-control-lg" type="password" name="Password" id="password" placeholder="Password">
          </div>
      </div>
            

            
      <input  class="btn btn-success btn-block" type="submit" name="Submit" value="Login">
        <br>
        <br>
    </form>
                 
  </div>
    

                    
            </div>
        </div>
    </div>
    
   
   
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

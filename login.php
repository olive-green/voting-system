<?php
//session start
session_start();
if(isset($_SESSION['uEmail']))
{
    echo "<script>location.href='./includes/welcome.php'</script>";   
}


   require("./database_connection.php");

   if(isset($_POST['login']))
   {
       $email=$_POST['email'];
       $password=$_POST['password'];

       $query="SELECT * from user_db where email='$email' and password='$password';";
       $result=$conn->query($query);
       if($result->num_rows>0)
       {
        //    echo "<div class='alert-success  text-center alert alert-dismissible' role='alert'>
        //    <span class='h4'>Login successfully</span>
        //    <button type='submit' class='close' data-dismiss='alert'>&times;</button>
        //    </div>";
           while($row=$result->fetch_assoc())
            {
            $_SESSION['uEmail']=$uemail=$row['email'];
            $_SESSION['uName']=$uname=$row['firstName'];
            echo "<script>location.href='./includes/welcome.php'</script>";
           }
       }
       else
          echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
         <span class='h4'>Invalid email or password</span>
          <button type='submit' class='close' data-dismiss='alert'>&times;</button>
          </div>";
   }

?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>

    body{
        margin:0px;
        padding: 0px;
        font-family: sans-serif;
        background:url(./vote1.jpg) no-repeat center center fixed;
        background-size:cover;
        background-color: black;
        
    }
    @media only screen and(max-width:767px)
    {
        body{
            background:url(./vote1.jpg);
        }
    }
    
    .login-box{
        width: 280px; /*this width is given to login box bec to move a element easily as div element acquires the whole line that'why it cuts the whole line to 280px */
        position: absolute; /*here it can be relative also */
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        color: white;
    }
    .login-box h1{
        float:left;
        font-size: 40px;
        border-bottom:6px solid green;
        margin-bottom:50px ;
        padding:13px 0px;
    }
    .textbox{
        width:100%;
        overflow: hidden;/*scroll; it can be this also. overflow is used when the element overflows the given width fo an element.
        The overflow property specifies what should happen if content overflows an element's box.
   This property specifies whether to clip content or to add scrollbars when an element's content is too big to fit in a specified area.
         */
        padding:8px 0px;
        margin:8px 0px;
        border-bottom: 1px solid #4caf50;
    }
    .textbox i{
        width:26px;
        text-align: center;
        float: left;
    }
    .textbox input{
        border:none;
        outline:none;
        background: none;
        color:white;
        font-size: 18px;
        /* width:80%; */
        /* float:left; */
        margin:0 10px;
    }
    .signIn{
        width:100%;
        background: none;
        color:white;
        cursor:pointer;
        border:2px solid #4caf50;
        padding:5px;
        font-size: 18px;
        margin:12px 0px;
    }
    .signIn:hover{
        background: green;
        border:2px solid white;
    }
    .signIn:hover:active{
        background-color: darkgreen;
        border:2px solid green;
    }
    .newAccount small:hover{
        background-color:white; 
    }

   </style>
</head>

<body>
<form action="" method="POST">
<div class="login-box">
    <h1>Login</h1>
    <div class="textbox">
    <i class="fa fa-user"></i>
        <input type="email" name="email" id="email" placeholder="Enter your Email"  oninvalid="this.setCustomValidity('Enter valid email')" onchange="this.setCustomValidity('')" required/>
    </div>
    <div class="textbox">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Enter your Password"  oninvalid="this.setCustomValidity('Enter valid password')" onchange="this.setCustomValidity('')" required /> <!-- on change is required here if we don't write it then it even shows the error when we write correct thing-->
    </div>
    <button type="submit" name="login" class="signIn">Sign in</button>
    <div class="newAccount"><a href="./registration.php"><small class="text-muted" >Don't have an account? Register Now!</small></a></div>  

</div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>

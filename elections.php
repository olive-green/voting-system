<?php
//session start
session_start();
include("./includes/loginheader.php");
   require("./database_connection.php");
if(!$_SESSION['uEmail'])
{
    echo"<script>location.href='./login.php'</script>"; 
}

?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./electionsCss.css">
</head>

<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3 ">
                <form action="" method="POST">
            <div class="login-box form-group">
                <h1>Login</h1>
                <div class="textbox form-group">
                    <input  class="form-control" type="text" name="user_id" id="user_id" placeholder="Enter your ID"  required/>
                </div>
                <div class="textbox form-group">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter your Password"  oninvalid="this.setCustomValidity('Enter valid password')" onchange="this.setCustomValidity('')" required /> 
                </div>
                <button type="submit" class="btn btn-success btn-block" name="login" class="signIn">Enter Voting Area</button> 

            </div>
            </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>
<?php 
include("./database_connection.php");
    if(isset($_POST['login']))
    {
        $user_id=$_POST['user_id'];
        $password=$_POST['password'];
        $stmt="SELECT * from user_db where password='$password' AND id_generated='$user_id'";
        $result=$conn->query($stmt);
        if($result->num_rows>0)
        {
            while($row=$result->fetch_array())
            {
                $_SESSION['user_id_generated']=$user_id_generated=$row['id_generated'];
                echo "<script>location.href='./vote.php'</script>";
            }
        }
        else
        echo "Error";
    }
?>
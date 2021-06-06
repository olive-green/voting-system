<?php 
session_start();
if(!isset($_SESSION['uEmail']))
{
   echo"<script>location.href='./login.php'</script>"; 
}
include("./includes/loginheader.php");
include("./database_connection.php");
$user_email=$_SESSION['uEmail'];
$select="SELECT * from idRequest where userEmail='$user_email'";
$run=$conn->query($select);
if($run->num_rows>0)
{
    ?>

    <div class="col-sm-6 col-sm-offset-3 alert-success alert align-items-center justify-content-center ">
        <h2>Request has been already submited, please wait....</h2>
    </div>
    <?php 
}
else
{
    ?>
    <?php
$select= "SELECT  * from user_db where email='$user_email';";
$stmt=$conn->query($select);
if($stmt->num_rows>0)
{
    while($row=$stmt->fetch_array())
    {
        $firstName=$row['firstName']; 
        $lastName=$row['lastName'];
        $user_email=$row['email'];
        $id_generated=$row['id_generated'];
    }
}
    if($id_generated!="")
    {
        ?>

        <div class="col-sm-6 col-sm-offset-3 text-center  bg-success alert">
            <h4 >Your ID is "<span class="text text-danger"><?php echo $id_generated?></span>"</h4>
            <p><b>NOTE:</b>Use this ID with your login password to caste your vote</p>
        </div>

     <?php
    }
    else
    {

    ?>
<!-- -----------------------------------------------Style------------------------------------------------ -->

    <style>
    body{
        /* background: #19123b; */
    }
    .card{
        border:none;
        border-top: 5px solid rgb(176,106,252);
        background:#212042;
        color:#57557a;
    }
    .main_div{
        height: 50vh;
    }
</style>
        <div class="container">
    <div class="row w-100 d-flex justify-content-center align-items-center main_div">
        <div class="col-12 col-md-8">
            <div class="card py-3 px-2">
                <p class="text-center my-3 h2 text-white">Generate your ID</p>
            </div>
        <div class="division">
            <div class="row">
                <div class="col-6 mx-auto">
                    <span class="main-heading">Your details</span>
                </div>
            </div>
            <form action="" method="POST">
            <div class="mb-3">
                    <span>First Name:</span>
                    <input type="text" id="userName" name="userName" class="form-control" placeholder="Enter your name" required value='<?php echo "$firstName"." "."$lastName"?>'/>
                </div>
                
                <div class="form-group">
                <span>Email : </span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required value="<?php echo $user_email; ?>"/>
                <div class="form-group">
                <span>Roll No:</span>
                <input type="text" id="rollNo" name="rollNo" class="form-control" placeholder="Enter your Roll No.." required/>
                </div>
                <div class="form-group">
                <span>Branch:</span>
                <input type="text" id="branch" name="branch" class="form-control" placeholder="Enter your Branch.." required/>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-success btn-block"name="idRequest">ID request</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

 <?php  }
         } ?>



<!-- ----------------------------------------Middle content-------------------------------------------------- -->

<?php 
    if(isset($_POST['idRequest']))
    {
        $userName=$_POST['userName'];
        $userEmail=$_POST['email'];
        $rollNo=$_POST['rollNo'];
        $branch=$_POST['branch'];

        include('./database_connection.php');
       

            $stmt="INSERT into idRequest (userName,userEmail,rollNo,branch) values ('$userName','$userEmail','$rollNo','$branch');";
            $result=$conn->query($stmt);
            if($result)
            {
                echo "<script>alert('Your request has been submitted successfully')</script>";
            }
            else echo"error";
    }
        
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>



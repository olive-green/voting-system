<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- database connection -->
<?php
include("./database_connection.php");
    //retrieving data
    $emailError="";
    $accountSuccess="";
    if(isset($_POST['submit']))
    {
         $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $email=$_POST['email'];
         $password=$_POST['password'];
         $age=$_POST['age'];
         $gender=$_POST['gender'];
         $branch=$_POST['branch'];
         $check="SELECT * from user_db where email='$email';";
         $stmt=$conn->query($check);
         if($stmt->num_rows>0)
         {
             $emailError="<p class='text text-center text-danger'>Email already registered</p>";
         }
         else
         {   //inserting into table
             $query= " INSERT INTO user_db(firstName,lastName,email,password,age,gender,branch) values ('$firstName','$lastName','$email','$password','$age','$gender','$branch');";
             $result=$conn->query(($query));
            if($result)
             {
                 $accountSuccess="<p class='text-center text-success'>Account created successfully</p>";
             }
             else
             {
                 $accountSuccess="<p class='text-center text-danger'>Try again</p>";
             }           
         }
    }
?>
<style>
    body{
        background-color: black;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 alert alert-success">
            <form action="" method="POST">
                <h3 class="text-white text-center bg-primary alert">User Registration</h3>
                <?php 
                  if($emailError!="")
                  {
                      echo $emailError;
                  }
                  echo $accountSuccess;
                
                ?>
                <div class="form-group">
                    <label for="firstName"  >First Name:</label>
                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter your first name" required/>
                </div>
                <div class="form-group">
                    <label for="lastName" >Last Name:</label>
                    <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter your last name" required/>
                </div>
                
                <div class="form-group">
                    <label for="email" >Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required/>
                </div>

                <div class="form-group">
                    <label for="age" >Age:</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter your Age" required/>
                </div>
                <div class="form-group">
                    <label for="gender" >Gender:</label>
                    <input type="radio" id="male" name="gender" value="male" ><span>Male</span>
                    <input type="radio" id="female" name="gender" value="female"><span >Female</span>
                    <input type="radio" id="other" name="gender" value="other"><span >Other</span>
                </div>
                <div class="form-group">
                    <label for="branch" >Branch:</label>
                    <select name="branch" id="" class="form-control" required>
                        <option value="">select</option>
                        <option value="CSE">CSE</option>
                        <option value="IT">IT</option>
                        <option value="ECE">ECE</option>
                        <option value="EE">EE</option>
                        <option value="EEE">EEE</option>
                        <option value="CE">CE</option>
                        <option value="MH">MH</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" >Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    echo "<script>location.href='./includes/welcome.php'</script>"; 
}
?>
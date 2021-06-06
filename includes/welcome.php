<?php 
session_start();
if(!isset($_SESSION['uEmail']))
{
   echo"<script>location.href='../login.php'</script>"; 
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .ivoteImg{
        margin-top:90px;
    }
    .fa-user{
        margin-right: 6px;
    }
</style>

<!--------------------------------------------navbar ---------------------------------------->
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark "> 
<a href="#" class="navbar-brand">Online Voting </a>
<button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbar">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbar">
<ul class="navbar-nav">
<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
<li class="nav-item"><a href="#" class="nav-link" >Socities</a></li>
<li class="nav-item"><a href="../idGenerate.php" class="nav-link" >ID generate</a></li>
<li class="nav-item"><a href="../elections.php" class="nav-link" >Election</a></li>
<li class="nav-item"><a href="../vote.php" class="nav-link" >Vote</a></li>
<li class="nav-item"><a href="../result.php" class="nav-link" >Results</a></li>
<li class="nav-item"><a href="./logout.php" class="nav-link" >Logout</a></li>
</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item">
        <a href="#" class="nav-link"> <i class="fa fa-user"></i><?php echo $_SESSION['uName'];?></a></li>
</ul>
</div>
</nav>

<!--------------------------------------------middle content ---------------------------------------->
<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
        <div class="voteImg">
            <img src="../images.jpg" alt="" >
        </div>
    </div>
   
    <div class="col-sm-4 ">
        <div class="ivoteImg">
            <img src="../ivoting.png" alt="" width="100%" height="100%">
        </div>
    </div>
    <div class="col-sm-6">
        <h3 class="text-primary alert alert-primary text-center">How to Caste your vote</h3>
        <ul>
            <li>Firstly generate your id by clicking on<strong>"ID Generate" </strong>from above.</li>
            <li>Go to <strong>Election </strong>section</li>
            <li>Then select available election</li>
            <li>Vote to your favourite candidate</li>

        </ul>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

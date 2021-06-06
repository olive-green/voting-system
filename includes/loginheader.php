<!doctype html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark "> 
<a href="#" class="navbar-brand">Online Voting </a>
<button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbar">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbar">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
<li class="nav-item"><a href="#" class="nav-link" >Socities</a></li>
<li class="nav-item"><a href="./elections.php" class="nav-link" >Election</a></li>
<li class="nav-item"><a href="./vote.php" class="nav-link" >Vote</a></li>
<li class="nav-item"><a href="./result.php" class="nav-link" >Results</a></li>
<li class="nav-item"><a href="./includes/logout.php" class="nav-link" >Logout</a></li>
<li class="nav-item"><a href="#" class="nav-link" ><?php echo $_SESSION['uName'];?></a></li>
</ul>
</div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>




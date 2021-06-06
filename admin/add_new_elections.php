<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>

    </style>

</head>
<body>
        <div class="container">
            <div class="col-sm-6">
                <h2>All New elections</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="">Add Election Name</label>
                        <input type="text" name="elections_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Election Start Date</label>
                        <input type="date" name="elections_start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Election End Date</label>
                        <input type="date" name="elections_end_date" class="form-control">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-success" name="election_submit">
                </form>
                
            </div>
            
        </div>
</body>
</html>
<?php
    $conn=new mysqli("localhost","root","","voting_db");
    if(isset($_POST['election_submit']))
    {
        $elections_name=$_POST['elections_name'];
        $elections_start_date=$_POST['elections_start_date'];
        $elections_end_date=$_POST['elections_end_date'];

        $stmt="INSERT into elections (elections_name,election_start_date,election_end_date) values('$elections_name','$elections_start_date','$elections_end_date')";
        $result=$conn->query($stmt);
        if($result)
        {
            echo "success";
        }
        else 
        echo "error";
    }
?>
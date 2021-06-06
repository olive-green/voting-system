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
                <h2>All requested Data</h2>
                <table class="table table-responsive table-hover">
                    <tr>
                    <th>#</th>
                    <th>User Emails</th>
                    <th>Roll NO.</th>
                    <th>Branch</th>
                    <th>Action</th>
                    </tr>
                    <?php
                       include('../database_connection.php');
                       $select="SELECT * from idrequest";
                       $result=$conn->query(($select));
                       if($result->num_rows>0) 
                       {
                           $total=0;
                           while($row=$result->fetch_array())
                           {
                               $id=$row['id'];
                               $total=$total+1;
                               ?>
                            <tr>
                            <td><?php echo $total?></td>
                            <td><?php echo $row['userEmail']?></td>
                            <td><?php echo $row['rollNo']?></td>
                            <td><?php echo $row['branch']?></td>
                            <td><a href="updateid.php?id=<?php echo $id;?>">Update</a></td>
                            </tr>   
                          <?php }
                       }
                       else
                       {
                           ?>
                         <tr>
                         <td colspan="5">Record not found</td>
                         </tr>  
                        <?php 
                       }
                    ?>
                </table>
            </div>
            <div class="col-sm-6"></div>
        </div>
</body>
</html>
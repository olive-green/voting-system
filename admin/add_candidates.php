<?php
session_start();
include("../includes/loginheader.php");
?>

<div class="container">
    <div class="col-sm-6">
        <h2>Add Candidate details</h2>
        <form action="./add_candidate_details.php" method="GET">
            <label for="">
                Elections   
            </label>
            <select name="elections_name" id="" class="form-control">
            <option value="" selected="selected">Select Election</option>
                <?php 
                    include("../database_connection.php");
                    $stmt="SELECT * from elections";
                    $result=$conn->query($stmt);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_array())
                        {
                             $elections_name=$row['elections_name'];
                             ?>
                        <option  value="<?php echo $elections_name;?>"><?php echo $elections_name;?></option>     
                       <?php 
                        }
                    }
                ?>
            </select>
            <label >No. of Candidates</label>
            <input type="number" class="form-control" name="total_candidates"/>
            <br>
            <input type="submit" value="Submit" class="btn btn-success" name="submit_candidates" class=""/>
        </form>
    </div>


    
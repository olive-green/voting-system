<?php
session_start();
include("./includes/loginheader.php");

if(!$_SESSION['user_id_generated'])
{
    echo"<script>location.href='./elections.php'</script>"; 
}


?>

<div class="container">
    <div class="col-sm-6">
        <h3 class="text text-info text-center">Result Portion</h3>
        <p class="text text-danger">In this section those elections results are displayed which are closed</p>
        <form method="POST">
            <div class="form-group">
                <select class="form-control" name="elections_name">
                <option value="" selected="selected">Select Election</option>
                <?php
                $current_ts=time();
                include("./database_connection.php");
                $stmt="SELECT * from elections";
                $run=$conn->query($stmt);
                if($run->num_rows>0)
                {
                    while($row=$run->fetch_array())
                    {
                        $elections_name=$row['elections_name'];
                        $election_start_date=$row['election_start_date'];
                        $election_end_date=$row['$election_end_date'];
                        ?>
                        <?php
                         $election_end_date_ts=strtotime($election_end_date);
                         if($election_end_date_ts<$current_ts)
                         {
                             ?>
                         <option value="<?php echo $row['elections_name'];?>">
                    <?php echo $row['elections_name'];?></option>
                        <?php
                         }
                    
                        
                    }
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="search_results" class="btn btn-success" value="Search Result">
            </div>
        </form>
        <table class="table table-responsive table-hover table-bordered text-center">
                <tr>
                    <td>#</td>
                    <td>Candidate Name</td>
                    <td>Obtain votes</td>
                    <td>Winning Percentage</td>
                </tr>
        <?php
            if(isset($_POST['search_results']))
            {
                $elections_name=$_POST['elections_name'];
                $select="SELECT * from results where elections_name='$elections_name'";
                $result=$conn->query($select);
                if($result->num_rows>0)
                {
                    $total_elections_vote=0;
                    while($row=$result->fetch_array())
                    {
                        $total_elections_vote=$total_elections_vote+ 1;
                    }
                }
                // echo $total_elections_vote;
                $query="SELECT * from candidate_details where election_name='$elections_name'";
                $exe=$conn->query($query);
                if($exe->num_rows>0)
                {
                    while($row2=$exe->fetch_array())
                    {
                        $candidate_name=$row2['candidate_name'];
                        $total_votes=$row2['total_votes'];
                        $percentage=($total_votes/$total_elections_vote)*100;
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $candidate_name;?></td>
                            <td><?php echo $total_votes;?></td>
                            <td><?php echo $percentage;?>%</td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</div>

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
        <form method="POST">
            <label>Elections Name</label>
            <select class="form-control" name="elections_name">
                <option value="" selected="selected">Select Election</option>
                <?php 
                include("./database_connection.php");
                $stmt="SELECT * from elections";
                $result=$conn->query($stmt);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_array())
                    {

                    ?>
                    <option value="<?php echo $row['elections_name'];?>">
                    <?php echo $row['elections_name'];?>
                    </option>
                    <?php
                }
            }
                ?>
            </select>
            <br>
            <input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
        </form>
    </div>
</div>

<?PHP
    include("./database_connection.php");
    date_default_timezone_set("Asia/Karachi");
    if(isset($_POST['search_candidate']))
    {
         $elections_name=$_POST['elections_name'];
        $stmt="SELECT * from elections WHERE elections_name='".$elections_name."'";
        $result=$conn->query($stmt);
        // if($result)
        //     echo "success";
        // else
        //     echo "error";
        if($result->num_rows>0)
        {
            while($row=$result->fetch_array())
            {
                $election_start_date=$row['election_start_date'];
                $election_end_date=$row['election_end_date'];
            }
        }
        $current_ts=time();
        $election_start_date_ts=strtotime($election_start_date);
        $election_end_date_ts=strtotime($election_end_date);
        if($election_start_date_ts>$current_ts)
            echo "Election did not start please wait....";
        else if($election_end_date_ts<$current_ts)
        {
            echo "Election has been closed you did not caste your vote";
        }
        else
        {

            ?>
           <a href='./votecaste.php?elections_name=<?php echo str_replace('','-',$elections_name);?>'>Click Here</a>
        <?php
        }
    }
            
?>
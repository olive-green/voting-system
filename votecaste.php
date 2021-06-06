<?php
session_start();
include("./includes/loginheader.php");
include("./database_connection.php");
if(!$_SESSION['user_id_generated'])
{
    echo"<script>location.href='./elections.php'</script>"; 
    exit(); 
}


?>

<div class="container">
    <div class="col-sm-6">
        <form method="POST">
            <?php
                $elections_name=$_GET['elections_name'];
              $elections_name=str_replace('-',' ',$elections_name);
              ?>
              <div class="form-group">
              <input type="text" class="form-control" value="<?php echo $elections_name;?>" readonly    >
              </div>
              <?php 
                
                $stmt="SELECT * from candidate_details WHERE election_name='".$elections_name."'";
                $run=$conn->query($stmt);
        //           if($run)
        //     echo "success";
        // else
        //     echo "error";
                if($run->num_rows>0)
                {   
                    while($row=$run->fetch_array())
                    {
                        ?>
                     <div class="form-group">
                     <input type="radio" name="candidate_name" class="list_group" value="<?php echo $row['candidate_name'];?>">
                        <label><?php echo $row['candidate_name'];?></label>
                     </div>
                        <?php
                    }
                }
            ?>
            <input type="Submit" name="vote_caste" value="Caste your vote" class="btn btn-success" />
        </form>
    </div>
</div>

<?php

    if(isset($_POST['vote_caste']))
    {
        $candidate_name=$_POST['candidate_name'];
        $user_email= $_SESSION['uEmail'];

        $query="SELECT * from results where user_email='$user_email' and elections_name='$elections_name'";
        $result=$conn->query($query);
        if($result->num_rows>0)
        {
            echo "You have already caste your vote in this election";
        }
        else
        {
            $stmt="INSERT into results (user_email,candidates_name,elections_name) values ('$user_email','$candidate_name','$elections_name')";
            $run=$conn->query($stmt);
            if($run)
            {
                $update="UPDATE candidate_details SET total_votes=`total_votes`+1 WHERE candidate_name='".$candidate_name."' and election_name='".$elections_name."'";
                $exe=$conn->query($update);
                if($exe)
                {
                    echo "success";
                }
                else 
                    echo "you did error";
            
            }
            else 
                    echo "error";
        }
    }

?>

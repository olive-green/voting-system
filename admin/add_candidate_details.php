<?php
session_start();
include("../includes/loginheader.php");
?>

<div class="container">
    <div class="col-sm-6">
        <h2>Add Candidate details</h2>
        <?php
    if(isset($_GET['submit_candidates']))
    {
         $total_candidates=$_GET['total_candidates'];
         $elections_name=$_GET['elections_name'];
         echo "<h2>$elections_name election</h2>";
         
         for($i=1;$i<=$total_candidates;$i++)
         {
             ?>
            <form method="POST">
                <div class="form-group">
                    <label for="">Candidate Name <?php echo " $i";?></label>
                    <input type="text" name="candidate_name<?php echo $i;?>" class="form-control"/>
                </div>
          <?php  
         }
         echo "<input type='submit' value='Add' name='add_candidates' class='btn btn-success'/>";
         echo "</form>"; 
        }
        ?>
    </div>
</div>           

<?php
    if(isset($_POST['add_candidates']))
    {
        
        $conn=new mysqli("localhost","root","","voting_db");
        for($i=1;$i<=$total_candidates;$i++)
        {
             $candidates_name[]=$_POST['candidate_name'.$i]; 
        }
        for($i=0;$i<$total_candidates;$i++)
        {
        $stmt="INSERT INTO candidate_details (candidate_name,election_name) values('$candidates_name[$i]','$elections_name')";
       $run=$conn->query($stmt);    
        }
        if($conn)
        echo "success";
        else 
        echo "error";

    }
?>
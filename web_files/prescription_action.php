<?php
session_start();
include 'dbconnect.php';
$device_id=$_POST['device_id'];
$prescription=$_POST['prescription'];
$doc_id = $_SESSION['doc_id'];

if (!empty($device_id) && !empty($prescription)  )
{ 
	$query1 ="SELECT * FROM Prescription WHERE device_id='$device_id'";
        $query1_run=mysqli_query($con,$query1);
        $query_row=mysqli_fetch_array($query1_run);
        
        if(mysqli_num_rows($query1_run)==0)
        {
  			                 $query=mysqli_query($con,"INSERT INTO Prescription(device_id, doctor_id, prescription) values('$device_id','$doc_id', '$prescription')");
			                  if($query){
									  echo "success";
			 
								}
							else{
							  echo "failure";
							}
		}
		else
		{
						$query=mysqli_query($con,"UPDATE Prescription SET prescription = '$prescription' WHERE device_id = '$device_id'");
						if($query){
									  echo "success";
			 
								}
							else{
							  echo "failure";
							}
			}
}
    else{
    echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Fields cannot be empty!..</div>";
  }

  
 mysqli_close($con);
?>

<?php 
session_start();
include '../dbconnect.php';

$email=$_POST['patientid'];
$passwor=$_POST['password'];

    if(isset($email) && isset($passwor))
    {
        
        $email=addslashes($email);
        //$password=addslashes($passwor);
        $query1 ="SELECT * FROM Patient WHERE patient_id='$email' AND password='$passwor'";
        $query1_run=mysqli_query($con,$query1);
        $query_row=mysqli_fetch_array($query1_run);
        
        if(mysqli_num_rows($query1_run)>0)
        {  
		 $doc_id = $query_row['doc_id'];
		 $query2 ="SELECT doctor_name FROM Doctor WHERE doc_id='$doc_id'";
        	$query2_run=mysqli_query($con,$query2);
        	$query2_row=mysqli_fetch_array($query2_run);	
                  
		$dev_id = $query_row['device_id'];
            	$query3 ="SELECT prescription FROM Prescription WHERE device_id='$dev_id'";
        	$query3_run=mysqli_query($con,$query3);
        	$query3_row=mysqli_fetch_array($query3_run);	
                $res  = array('doctor' => $query2_row['doctor_name'], 'prescription' => $query3_row['prescription']);

		echo json_encode($res);
        }
     else
        {   
            echo "check";
        }
    }
    else
    {
        echo ("Fields can not be empty");
    }
 mysqli_close($con);
?>



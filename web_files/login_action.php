<?php 
session_start();
include 'dbconnect.php';

$email=$_POST['email'];
$passwor=$_POST['pass'];

    if(isset($email) && isset($passwor))
    {
        
        $email=addslashes($email);
        //$password=addslashes($passwor);
        $query1 ="SELECT * FROM Doctor WHERE email='$email' AND password='$passwor'";
        $query1_run=mysqli_query($con,$query1);
        $query_row=mysqli_fetch_array($query1_run);
        
        if(mysqli_num_rows($query1_run)>0)
        {  
				$_SESSION['doc_id']=$query_row['Doc_id'];
                $_SESSION['email']=$query_row['email'];
                $_SESSION['name'] = $query_row['doctor_name'];
                session_regenerate_id(true);
                  echo 'success';
            
        }
     else
        {   
            echo 'check';
        }
    }
    else
    {
        echo 'empty';
    }
 mysqli_close($con);?>

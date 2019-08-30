<?php
include 'dbconnect.php';
$name=$_POST['name'];
$password=$_POST['pass'];
$password_again=$_POST['cpass'];
$email=$_POST['email'];
$phone_no=$_POST['phone'];


if (!empty($name) && !empty($password_again) && !empty($password) && !empty($email) && !empty($phone_no))
{ 
  if($password==$password_again){
    $email=addslashes($email);
    $password=addslashes($password);
    $query1=mysqli_query($con,"SELECT * from Doctor where email='$email'");
    $count=mysqli_num_rows($query1);
	if(mysqli_num_rows($query1)==0){				
			   
			$query=mysqli_query($con,"INSERT INTO Doctor(doctor_name, email, password, phone) values('$name', '$email', '$password','$phone_no')");
			if($query){
				
			  //$_SESSION['reg_suc']="You have Successfully registered.";
			  echo "<center><div style=\"border-radius:5px;border-width:10px;border-color:#00b33c;color:green;background-color:#4dff88;height:40px;margin-top:auto;margin-bottom:auto;padding : 10px;\">Successfully Registered.You will be redirected to Login Page shortly.</div></center>";
			  //<META http-equiv=\"refresh\" content=\"5;http://www.epreuve.in/login\">";
			}
			else{
			  echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Something went wrong. Please try again</div>";
			}
		}
		
    else{
    echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Email already exists</div>";
  }
}
  else{
    echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Password didn't match</div>";
  }
}else{
  echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Fields cannot be empty!..</div>";
}

 mysqli_close($con);
?>

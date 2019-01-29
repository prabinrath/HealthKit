<?php
include 'dbconnect.php';
$username=$_POST['uname'];
  $password=$_POST['pass'];
  $password_again=$_POST['cpass'];
  $institute=$_POST['college'];
  $email=$_POST['email'];
  $phone_no=$_POST['phone'];
  $address=$_POST['add'];
  if (!empty($username) && !empty($institute) && !empty($password_again) && !empty($password) && !empty($email) && !empty($phone_no) && !empty($address))
{ 
  if($password==$password_again){
    $email=addslashes($email);
    $password=addslashes($password);
    $query1=mysqli_query($conn,"SELECT * from users where email='$email'");
    $count=mysqli_num_rows($query1);
	$query2=mysqli_query($conn,"SELECT * from users where username='$username'");
    $count2=mysqli_num_rows($query2);
    if(mysqli_num_rows($query1)==0){
		if(mysqli_num_rows($query2)==0){

			  // random salt generation
				$salt = base64_encode(openssl_random_pseudo_bytes(128, $secure));
				//The variable $secure is given by openssl_random_ps... and it will give a true or false if its tru then it means that the salt is secure for cryptologic.
				while(!$secure){
					$salt = base64_encode(openssl_random_pseudo_bytes(128, $secure));
				}
				$salted_pw = $password.$salt ;
				$hashed_pw = hash('sha256', $salted_pw);
			   
			$query=mysqli_query($conn,"INSERT INTO users (timeofreg,username, college, password, salt, email , phone, address,last_correct) values(NOW(),'$username', '$institute', '$hashed_pw','$salt', '$email', '$phone_no', '$address',NOW())");
			if($query){
				//include 'PHPmailer/mailMain.php';
				//mailSender($email, "http://epreuve.in/verify.php?code=".md5($email."AbCdEf987")."&id=".$email ,1);
			  $_SESSION['reg_suc']="You have Successfully registered.";
			  echo "<center><div style=\"border-radius:5px;border-width:10px;border-color:#00b33c;color:green;background-color:#4dff88;height:40px;margin-top:auto;margin-bottom:auto;padding : 10px;\">Successfully Registered.You will be redirected to Login Page shortly.</div></center>";
			  //<META http-equiv=\"refresh\" content=\"5;http://www.epreuve.in/login\">";
			}
			else{
			  echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Something went wrong. Please try again</div>";
			}
		}
		else{
			echo "<div style=\"background-color:#ff6666;height:40px;padding : 10px;\">Username already exists</div>";
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

                     mysqli_close($conn);?>

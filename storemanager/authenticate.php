<?php
error_reporting(E_ERROR | E_PARSE);

session_start();


include("php/link.php");
$username=$_POST['email-username'];
$password=$_POST['password'];
$hash=md5($password);



if($username!=NULL && $password!=NULL)
{
$query=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$hash'");
				while($result=mysqli_fetch_array($query))
				{
					$agent_id=$result['agent_id'];
					$farmer_id=$result['farmer_id'];
				 	$username2=$result['username'];
					$status=$result['status'];									
					$role=$result['role'];									
				}
				
				if($username2==NULL)
				{
					$null='yes';
					header("Location: login.php?msg=Wrong Credentials"); // Modify to go to the page you would like
                    exit;					
				}
				
				if($username2!=NULL)
				{
					// $_SESSION['user_id']=$user_id;
					$_SESSION['valid_user']=$username2;
					$_SESSION['name']=$username2;
					$_SESSION['role']=$role;
					$_SESSION['status']= $status;
					
					if ($_SESSION['role']==1)
					{
					$_SESSION['admin']='admin';
					header("Location: home.php");
					}
					
					if ($_SESSION['role']==2)
					{
					$_SESSION['agent']='agent';
					header("Location: all-insurances.php");
					}
					
					if ($_SESSION['role']==3)
					{
					$_SESSION['operator']='operator';
					header("Location: all-insurances.php"); // Modify to go to the page you would like
					}
										
                    exit; 										
				}
}
else
{
	include"login.php";
}


?>
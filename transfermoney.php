<?php include 'dbcon.php'?>
<?php
if(isset($_POST['transfer']))
{
		
	function function_alert($errors) { 
    // Display the alert box  
    echo "<script>alert('$errors');"; 
	echo "window.location.href = 'users.php'";
	echo "</script>";
	}
	  
	session_start();
    $from_id = trim($_POST['fromtc']);
    $to_id = trim($_POST['touser']);
    $amount = trim($_POST['amount']);  
    $error = false;
	
	$from_query = "SELECT * FROM users WHERE id='$from_id'";
	$from_result = mysqli_query($con,$from_query);
	$row_from = mysqli_fetch_assoc($from_result);
	$from_name = $row_from['Name'];
	
	$from_balance_db = $row_from['Balance']; 

	
	$to_query = "SELECT * FROM users WHERE id='$to_id'";
	$to_result = mysqli_query($con,$to_query);
    $row_to = mysqli_fetch_assoc($to_result);
    $to_name = $row_to['Name'];
	
	// To user's balance
    $to_balance_db = $row_to['Balance']; 
	
	 if((int)$amount > (int)$from_balance_db)
    {
        $errors = "Insufficient Balance"; 
        $error = true; 
    }
	
	if(!$error)
    {
        $current_date = date("Y-m-d H:i:s");
		// Update the sender's balance
        $userf_finalbalance = "UPDATE users SET ";
        $userf_finalbalance .= "Balance = Balance - $amount WHERE id=$from_id"; 
        $query = mysqli_query($con,$userf_finalbalance);
        
		if(!$query)
        {
            die("QUERY FAILED".mysqli_error($con));
				//echo("Error description: " . $mysqli -> error);
        }
		
		// Update the recipient's balance
        $userto_finalbalance = "UPDATE users SET ";
        $userto_finalbalance .= "Balance = Balance + $amount WHERE id=$to_id"; 
        $query = mysqli_query($con,$userto_finalbalance);
	
		// Insert into transactions table
        $query1 = "INSERT INTO transferre(From_User,To_User,AmountTransferred,Date_Time) VALUES('$from_name','$to_name','$amount','$current_date')"; 
        $res2 = mysqli_query($con,$query1);
		
		if($res2){
			
			$user1 = "SELECT * FROM users WHERE id='$from_id' OR id='$to_id'";
			$res=mysqli_query($con,$user1);
			$row_count=mysqli_num_rows($res);
			
		}
		else{
				die("QUERY FAILED".mysqli_error($con));
				//echo("Error description: " . $mysqli -> error);
		}
    }
	else{
		function_alert("Insufficient Balance!! Please Try Again"); 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>
		Final User Result
    </title>
	<link type="text/css" rel="stylesheet" href="css/users1.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	h1{
		font-size: 42px;
		margin-left: 80px;
		margin-top: 55px;
	}
	#my_table{
		margin-left: 115px;
		font-size: 20px;
		width: 550px;
		border-style: groove;
		border-collapse: collapse;
		background-color: #effbf7;
	}
	th{
		background-color: #82dfbf;
	
	}
	th,td{
		padding: 15px;
	}
	.success-msg {
		margin: 10px 10px 10px 10px;
		padding: 10px;
		border-radius: 3px 3px 3px 3px;
		color: #270;
		background-color: #DFF2BF;
	}
	</style>
    </head>
	
	<body>
	<ul>
	<div class="logo">
		<a href="Index.php"><img src="images/img4.jpg" alt="logo"></a>
	</div>
	<li><a class="active" href="transferhistory.php">Transfer History</a></li>
	<li><a href="Index.php">Home</a></li>
	</ul>
	<p>Easy Transfer</p>
	<div class="login-wrap1">
	<div class="login-form">
	<br>
		<div class="success-msg">
				<i class="fa fa-check"></i>
					Money is Successfully Transfered. Check the details Below!!
		</div>
        <h1>User Details After Money Transfer</h1>
	<?php
		echo "<table id=\"my_table\" border='1'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email Id</th>
		<th>Final Balance</th>
		</tr>";
		
		while($row = mysqli_fetch_assoc($res))
		{
		echo "<tr>";
		echo "<td>" . $row['Id'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Email'] . "</td>";
		echo "<td>" . $row['Balance'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
	?>
		<br><br>
		
	</div>
	</div>
	</body>
</html>

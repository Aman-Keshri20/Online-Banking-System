<?php include 'dbcon.php'?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="css/home.css" >
<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body { 
  background: url('Images/img1.jpg') no-repeat center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
}
h1 {
	font-size: 48px;
	margin-top: -16px;
	margin-left: 180px;
}
h2{
	margin-left: 345px;
	margin-top: 90px;
	font-size: 30px;
}
h4{
	font-size: 22px;
	margin-left: 230px;
	letter-spacing: 1px;
	color: #236B8E;
	text-shadow: 0px 1px;
}
.fa {
  padding: 8px;
  font-size: 20px;
  width: 22px;
  text-align: center;
  text-decoration: none;
  
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

</style>
</head>
<body>
<div class="logo">
	 <a href="Index.php"><img src="Images/img4.jpg" alt="logo"></a>
</div>
<p><b>Easy Transfer<b></p>
<div class="header">
<br>
<h2>Welcome To</h2>
<h1><strong>Online Banking System</strong></h1>
<h4><b>Choose a user and transfer the money <br>&nbsp;&nbsp;&nbsp;&nbsp; from one user to another user.<b></h4>
<form action="users.php">
<button class='button1' >Get Started</button>
</form>

</div>
</body>
<div class="fixed-footer">
        <div class="container">Copyright &copy; 2023 Online Banking System by Aman Keshri
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-google"></a>
			<a href="#" class="fa fa-linkedin"></a>
		</div>
    </div>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Employee's Payroll Management System</title>
  <link href="https://fonts.cdnfonts.com/css/fox-on-the-run" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>

@import url('https://fonts.cdnfonts.com/css/fox-on-the-run');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Fox on the Run', monospace;
	}

	body {
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 100vh;
		background: url(assets/img/galaxy.jpg) no-repeat;
		background-size: cover;
		background-position: center;
	}

	.wrapper {
		width: 420px;
		background: transparent;
		border: 2px solid rgba(255, 255, 255, .2);
		backdrop-filter: blur(20px);
		box-shadow: 0 0 10px rgba(0, 0, 0, .2);
		color: #fff;
		border-radius: 10px;
		padding: 30px 40px;
	}

	.wrapper h1 {
		font-size: 36px;
		text-align: center;
	}

	.wrapper .input-box {
		position: relative;
		width: 100%;
		height: 50px;
		margin: 30px 0;
	}

	.input-box input {
		width: 100%;
		height: 100%;
		background: transparent;
		border: none;
		outline: none;
		border: 2px solid rgba(255, 255, 255, .2);
		border-radius: 40px;
		font-size: 16px;
		color: #fff;
		padding: 20px 45px 20px 20px;
	}

	.input-box input::placeholder {
		color: #fff;
	}

	.input-box i {
		position: absolute;
		right: 20px;
		top: 50%;
		transform: translateY(-50%);
		font-size: 20px;
	}

	.wrapper .remember-forgot {
		display: flex;
		justify-content: space-between;
		font-size: 14.5px;
		margin: -15px 0 15px;
	}

	.remember-forgot label input {
		accent-color: #fff;
		margin-right: 3px;
	}

	.remember-forgot a {
		color: #fff;
		text-decoration: none;
	}

	.remember-forgot a:hover {
		text-decoration: underline;
	}

	.wrapper .btn  {
		width: 100%;
		height: 45px;
		color: #000;
		background: #fff;
		border: none;
		outline: none;
		border-radius: 40px;
		box-shadow: 0 0 10px rgba(0, 0, 0, .1);
		cursor: pointer;
		font-size: 20px;
		font-weight: 600;
	}

	.btn:hover {
		background: none;
		text-decoration: underline;
		color: #fff;
	}

	.wrapper .register-link {
		font-size: 14.5px;
		text-align: center;
		margin: 20px 0 15px;
	}

	.register-link p a {
		color: #fff;
		text-decoration: none;
		font-weight: 600;
	}

	.register-link p a:hover {
		text-decoration: underline;
	}


</style>

<body>


  <main id="main">

  		<div id="login-right" class="wrapper">
  					
  					 <form id="login-form" >
					   <h1>Login</h1>
  						<div class="input-box">
  							<input type="text" id="username" name="username" placeholder="username" required class="form-control">
							<i class='bx bxs-user'></i>
						</div>
  						<div class="input-box">
  							<input type="password" id="password" name="password" placeholder="password" class="form-control">
						<i class='bx bxs-lock-alt'></i>

  						</div>
					
						<!-- // find ways to implement the forgot password and registration of accounts	 
						<div class="remember-forgot">
							<label>
							<input type="checkbox"> remember me </label>

							<a href="#">Forgot password?</a>
						</div> -->
  						<center><button class="btn">Login</button></center>
						<!--
						<div class="register-link">
							<p>Don't have an account? <a href="#">register</a></p>
						</div> -->
  					</form> 

  		</div> 
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> 

</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
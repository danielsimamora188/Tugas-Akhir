<?php

	if (isset($_SESSION['login'])) {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/TA/admin">';
  	}

	if(isset($_POST['login'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];


		$result = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username'");
		
		if( mysqli_num_rows($result) === 1 ) {
			
			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {
				$_SESSION['login'] = true;
				$_SESSION['username'] = $username;
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/TA/admin/">';
				exit;
			} else {
				echo "<script>alert('Username & Password Salah')</script>";
			}

		}
	}
?>

<style>

	@charset "utf-8";
	@import url(http://weloveiconfonts.com/api/?family=fontawesome);

	[class*="fontawesome-"]:before {
	font-family: 'FontAwesome', sans-serif;
	}

	/* ---------- GENERAL ---------- */

	body {
		background-color : #f7f7f7;
	}

	input {
		border: none;
		font-weight: inherit;
		line-height: inherit;
		-webkit-appearance: none;
	}

	/* ---------- LOGIN ---------- */

	#login {
		margin: 33px auto;
		width: 400px;

	}

	#login h2 {
		background-color: #25c3f8;
		-webkit-border-radius: 20px 20px 0 0;
		-moz-border-radius: 20px 20px 0 0;
		border-radius: 20px 20px 0 0;
		color: #fff;
		font-size: 28px;
		text-align: center;
		padding: 20px 26px;
	}

	#login h2 span[class*="fontawesome-"] {
		margin-right: 14px;
	}

	#login fieldset {
		background-color: #25c3f8;
		-webkit-border-radius: 0 0 20px 20px;
		-moz-border-radius: 0 0 20px 20px;
		border-radius: 0 0 20px 20px;
		padding: 50px 26px;
	}

	#login fieldset p {
		color: #fff;
		margin-bottom: 14px;
	}

	#login fieldset p:last-child {
		margin-bottom: 0;
	}

	#login fieldset input {
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}

	#login fieldset input[type="text"], #login fieldset input[type="password"] {
		background-color: #eee;
		color: #484a49;
		padding: 4px 10px;
		width: 328px;
	}

	#login fieldset button[type="submit"] {
		background-color: #fff;
		color: #25c3f8;
		display: block;
		margin: 0 auto;
		padding: 4px 0;
		width: 100px;
	}

	#login fieldset input[type="submit"]:hover {
		background-color: #fff;
	}

</style>


	<div class="container-isi">
		<div class="box-2" style="padding: 0; margin:0;">

			<div id="login">
				<h2><span class="fontawesome-lock"></span>Login Admin</h2>
				<form action="" method="POST">

					<fieldset>

						<p><label for="email">Username</label></p>
						<p><input type="text" id="user" value="username" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''" name="username"></p>

						<p><label for="password">Password</label></p>
						<p><input type="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''" name="password"></p>

						<button class="btn" type="submit" name="login">Masuk</button>

					</fieldset>
				</form>
			</div>

		</div>
	</div>
</div>
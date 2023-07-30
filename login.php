<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$e = $_POST['e'];
	$p = $_POST['p'];

	if (empty($e) || empty($p)) {
		$err = "<font color='red'>Fill all the fields first</font>";
	} else {
		$mysqli = new mysqli('127.0.0.1', 'root', '', 'notice_board_system', '3307');

		if ($mysqli->connect_errno) {
			die("Database connection error: " . $mysqli->connect_error);
		}

		$pass = md5($p);

		$sql = "SELECT * FROM students WHERE email='$e' AND password='$pass'";
		$result = $mysqli->query($sql);

		if (!$result) {
			die("Query error: " . $mysqli->error);
		}

		$r = $result->num_rows;

		if ($r == 1) {
			$_SESSION['students'] = $e;
			header('Location: user/index.php');
			exit;
		} else {
			$err = "<font color='red'>Invalid login details</font>";
		}

		$mysqli->close();
	}
}
?>

<h2><b>LOGIN FORM</b></h2>
<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo isset($err) ? $err : ''; ?></div>
	</div>

	<div class="row">
		<div class="col-sm-4">Email ID</div>
		<div class="col-sm-5">
			<input type="email" name="e" class="form-control" />
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">Password</div>
		<div class="col-sm-5">
			<input type="password" name="p" class="form-control" />
		</div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<input type="submit" value="Login" name="save" class="btn btn-success" />
		</div>
	</div>
</form>
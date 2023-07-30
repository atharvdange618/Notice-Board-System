<?php
require('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);

    // Check if the email already exists in the database
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notice_board_system', '3307');
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($mysqli));
    }

    $r = mysqli_num_rows($result);

    if ($r > 0) {
        $err = "<font color='red'>This user already exists</font>";
    } else {
        //dob
        $dob = $yy . "-" . $mm . "-" . $dd;

        //encrypt your password
        $pass = md5($password);

        $query = "INSERT INTO students (name, rollNo, email, password, phoneNo, branch, dob) 
        VALUES ('$name', '$rollNo', '$email', '$pass', '$phoneNo', '$branch', '$dob')";

        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            die("Query error: " . mysqli_error($mysqli));
        } else {
            echo "Registration successful! Data inserted into the database.";
        }

        $err = "<font color='blue'>Registration successful!!</font>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Notice Board System</title>
</head>

<body>

    <!-- Registration form -->
    <div class="container">
        <h2>Registration Form</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="rollNo">Roll No:</label>
                <input type="text" id="rollNo" name="rollNo" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <select name="yy" required>
                    <option value="">Year</option>
                    <?php
                    for ($i = 1950; $i <= 2016; $i++) {
                        echo "<option>" . $i . "</option>";
                    }
                    ?>
                </select>

                <select name="mm" required>
                    <option value="">Month</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option>" . $i . "</option>";
                    }
                    ?>
                </select>

                <select name="dd" required>
                    <option value="">Date</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option>" . $i . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="phoneNo">Phone No:</label>
                <input type="tel" id="phoneNo" name="phoneNo" required>
            </div>
            <div class="form-group">
                <label for="branch">Branch:</label>
                <input type="text" id="branch" name="branch" required>
            </div>
            <button type="submit" name="save">Register</button>
        </form>
        <?php echo isset($err) ? $err : ''; ?>
    </div>

</body>

</html>
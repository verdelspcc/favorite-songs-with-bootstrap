<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>
<body>
    <h1>Signup page</h1>
    <form method="POST">
        <label>Full Name</label>
        <input type="text" name="fullName" />
        <br>
        <label>Username</label>
        <input type="text" name="username" />
        <br>
        <label>Password</label>
        <input type="password" name="password" />
        <br>
        <button type="submit" name="submit">Signup</button>
    </form>

    <?php 
        include 'db_connection.php';

        if (isset($_POST['submit'])) {
            $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $md5Password = md5($password);

            $sql = "INSERT INTO users (fullName, username, password)
                VALUES ('$fullName', '$username', '$md5Password')";

            if (mysqli_query($conn, $sql)) {
                header("Location: login.php");
                exit();
            } else {
                echo "There's something wrong with your database or query.";
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>
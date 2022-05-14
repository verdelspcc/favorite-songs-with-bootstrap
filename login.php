<?php 
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
?>

<?php include('template/header.php'); ?>
<body>
    <div class="row m-5">
        <div class="col-md-4">
            <h1>Login page</h1>
            <form method="POST">
                <?php 
                    if (isset($_GET['error'])) {
                ?>        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> <?= $_GET['error'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    }
                ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    <?php 
        include 'db_connection.php';

        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $md5Password = md5($password);

            $sql = "SELECT * FROM users WHERE
                username='$username' AND password='$md5Password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['fullName'] = $row['fullName'];
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Username or Password is incorrect.");
            }

            mysqli_close($conn);
        }
    ?>

<?php include 'template/footer.php' ?>
<?php

    include 'db_connection.php';

    include 'template/header.php';

    $id = $_GET['id'];

    if (!isset($id)) {
        header('location: index.php');
    }

    $sql = "SELECT * FROM songs WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

?>
<body>
    <p>Title: <?php echo $row['title'] ?></p>
    <p>Artist: <?php echo $row['artist'] ?></p>
    <p>Album: <?php echo $row['album'] ?></p>
    <p>Composer: <?php echo $row['composer'] ?></p>
    <p>Released Date: <?php echo $row['released_date'] ?></p>
</body>

<?php mysqli_close($conn); ?>

<?php include 'template/footer.php' ?>
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
<h1>Edit <?php echo $row['title'] ?></h1>
    <form method="POST" action="update.php?id=<?php echo $row['id'] ?>">
        <div>
            <label>Enter song title</label>
            <input value="<?php echo $row['title'] ?>" type="text" name="title" />
        </div>
        <div>
            <label>Enter song artist</label>
            <input value="<?php echo $row['artist'] ?>" type="text" name="artist" />
        </div>
        <div>
            <label>Enter song composer</label>
            <input value="<?php echo $row['composer'] ?>" type="text" name="composer" />
        </div>
        <div>
            <label>Enter song album</label>
            <input value="<?php echo $row['album'] ?>" type="text" name="album" />
        </div>
        <div>
            <label>Enter song released date</label>
            <input value="<?php echo $row['released_date'] ?>" type="text" name="released_date" />
        </div>
        <div>
            <button class="btn btn-green" type="submit" name="submit">Update song</button>
        </div>
    </form>
</body>

<?php mysqli_close($conn); ?>

<?php include 'template/footer.php' ?>
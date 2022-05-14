<?php include 'template/header.php' ?>

<body>
    <h1>Create new song</h1>
    <form method="POST" action="save.php">
        <div>
            <label>Enter song title</label>
            <input type="text" name="title" />
        </div>
        <div>
            <label>Enter song artist</label>
            <input type="text" name="artist" />
        </div>
        <div>
            <label>Enter song composer</label>
            <input type="text" name="composer" />
        </div>
        <div>
            <label>Enter song album</label>
            <input type="text" name="album" />
        </div>
        <div>
            <label>Enter song released date</label>
            <input type="text" name="released_date" />
        </div>
        <div>
            <label>Enter song genre</label>
            <select name="genre_id">
            <?php

                include 'db_connection.php';

                $sql = "SELECT * FROM genres";
              
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='". $row['id'] ."'>" . $row['name'] . "</option>";
                  }
              } else {
                  echo "<option>No genres found!</option>";
              }
            ?>
            </select>
        </div>
        <div>
            <button class="btn btn-green" type="submit" name="submit">Create song</button>
        </div>
    </form>
</body>


<?php include 'template/footer.php' ?>
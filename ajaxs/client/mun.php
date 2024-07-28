<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
$DB = new DB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $tmp_file = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        print_r(upload_imgur($tmp_file, $file_name));  // data->link
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Chọn file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>

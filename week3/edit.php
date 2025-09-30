<?php
include "connection.php";

$id = $_GET["id"];
$brand = "";
$model = "";
$price = "";
$origin = "";

// Lấy dữ liệu theo id
$res = mysqli_query($link, "SELECT * FROM table2 WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $brand = $row["brand"];
    $model = $row["model"];
    $price = $row["price"];
    $origin = $row["origin"];
}
?>

<html lang="en">
<head>
    <title>Edit Laptop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
        <h2>Edit Laptop Data</h2>
        <form action="" name="form1" method="post">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $brand; ?>">
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo $model; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
            </div>
            <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" class="form-control" id="origin" name="origin" value="<?php echo $origin; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
</body>

<?php
if (isset($_POST["update"])) {
    mysqli_query($link, "UPDATE table2 SET brand='$_POST[brand]', model='$_POST[model]', price='$_POST[price]', origin='$_POST[origin]' WHERE id=$id");
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}
?>
</html>

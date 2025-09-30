<?php
include "connection.php";
?>

<html lang="en" xmlns="">
<head>
    <title>User Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <!-- short column display for forms rows -->
   <!--visit https://www.w3schools.com/bootstrap/bootstrap_forms.asp search for forms template and use it.-->
    <div class="col-lg-4">
    <h2>User data form</h2>
    <form action="" name="form1" method="post">
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand">
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" placeholder="Enter model" name="model">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
        </div>
        <div class="form-group">
            <label for="origin">Origin:</label>
            <input type="text" class="form-control" id="origin" placeholder="Enter origin" name="origin">
        </div>
        <button type="submit" name="insert" class="btn btn-default">Insert</button>
        <button type="submit" name="update" class="btn btn-default">Update</button>
        <button type="submit" name="delete" class="btn btn-default">Delete</button>

    </form>
</div>
</div>

<!-- new column inserted for records -->
<!-- Search for boostrap table template online and copy code -->
<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price</th>
            <th>Origin</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <!-- Database connection -->
        <?php
        if (!empty($link)) {
            $res=mysqli_query($link,"select * from table2");
        }
        while($row=mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["brand"]."</td>";
            echo "<td>".$row["model"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["origin"]."</td>";
            echo "<td><a href='edit.php?id=".$row["id"]."'><button type='button' class='btn btn-success'>Edit</button></a></td>";
            echo "<td><a href='delete.php?id=".$row["id"]."'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>

<!-- new records insertion into database table -->
<!-- records delete from database table -->
<!-- records update from database table -->

<!-- to automatically refresh the pages after crud activity   window.location.href=window.location.href; -->
<?php
if(isset($_POST["insert"]))
{
    mysqli_query($link,"insert into table1 values (NULL,'$_POST[firstname]' ,'$_POST[lastname]','$_POST[email]','$_POST[contact]')");
   ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php

}

if(isset($_POST["delete"]))
{
    mysqli_query($link,"delete from table1 where firstname='$_POST[firstname]'");
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}

if(isset($_POST["update"]))
{
    mysqli_query($link,"update table1 set firstname='$_POST[lastname]'where firstname='$_POST[firstname]'");
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>
</html>
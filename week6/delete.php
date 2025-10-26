<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý khi user nhấn Yes hoặc No
    if (isset($_POST['confirm'])) {
        if ($_POST['confirm'] === 'Yes' && isset($_POST['id'])) {
            $id = intval($_POST['id']);
            mysqli_query($link, "DELETE FROM table1 WHERE id=$id");
        }
        // Quay lại trang index bất kể Yes hay No
        header("Location: index.php");
        exit();
    }
} else {
    // Hiển thị form xác nhận
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }
    $id = intval($_GET['id']);
    ?>
    <h3>Are you sure to delete this item with ID = <?php echo $id; ?>?</h3>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" name="confirm" value="Yes">Yes</button>
        <button type="submit" name="confirm" value="No">No</button>
    </form>
    <?php
}
?>

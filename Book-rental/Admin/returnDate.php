<?php
// Xử lý action TRƯỚC KHI require topNav (để tránh lỗi headers already sent)
require_once(__DIR__ . '/../config/connection.php');
require_once(__DIR__ . '/../includes/function.php');

// Kiểm tra đăng nhập
if (!isset($_SESSION['ADMIN_LOGIN']) || $_SESSION['ADMIN_LOGIN'] == ' ') {
    header('Location: login.php');
    exit;
}

// Xử lý cập nhật trạng thái (nếu có)
if (isset($_POST['status_id'])) {
    $orderId = (int)$_POST['orderId'];
    $statusId = (int)$_POST['status_id'];
    
    // Nếu đơn hàng bị hủy hoặc trả lại, tăng lại số lượng sách
    if (in_array($statusId, [4, 6])) {
        $qtyRes = mysqli_query($con, "SELECT books.id FROM orders
                                       JOIN order_detail ON orders.id=order_detail.order_id
                                       JOIN books ON order_detail.book_id=books.id
                                       WHERE order_detail.order_id=$orderId");
        if ($qtyRow = mysqli_fetch_assoc($qtyRes)) {
            mysqli_query($con, "UPDATE books SET qty = qty + 1 WHERE id={$qtyRow['id']}");
        }
    }
    
    mysqli_query($con, "UPDATE orders SET order_status=$statusId WHERE id=$orderId");
    header('Location: returnDate.php');
    exit;
}

require('topNav.php');

// Lấy danh sách đơn hàng đã hủy hoặc đã trả
$sql = "SELECT orders.*, name, status_name 
        FROM orders
        JOIN order_detail ON orders.id=order_detail.order_id
        JOIN books ON order_detail.book_id=books.id
        JOIN order_status ON orders.order_status=order_status.id
        WHERE status_name IN ('Cancelled', 'Returned')
        ORDER BY date DESC";
$res = mysqli_query($con, $sql);
?>
<!--Main layout-->
<main>
    <div class="container pt-4">
        <h4 class="fs-2 text-center">Return Date</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Order Date</th>
                    <th>Return Date</th>
                    <th>Book Name</th>
                    <th>Book Price</th>
                    <th>Rent Duration</th>
                    <th>Address</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res && mysqli_num_rows($res) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($res)): 
                        // Tính ngày trả dự kiến (Order Date + Duration)
                        $orderDate = new DateTime($row['date']);
                        $returnDate = clone $orderDate;
                        $returnDate->modify('+' . $row['duration'] . ' days');
                    ?>
                    <tr>
                        <td>#<?php echo $row['id'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $returnDate->format('Y-m-d') ?></td>
                        <td><?php echo htmlspecialchars($row['name']) ?></td>
                        <td>₫<?php echo number_format($row['total']) ?></td>
                        <td><?php echo $row['duration'] ?> days</td>
                        <td><?php echo htmlspecialchars($row['address']) ?><?php echo $row['address2'] ? ', ' . htmlspecialchars($row['address2']) : '' ?></td>
                        <td><?php echo $row['status_name'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No returned or cancelled orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/admin.js"></script>
</body>

</html>
<?php
/**
 * Làm sạch và bảo mật dữ liệu đầu vào
 */
function getSafeValue($con, $str)
{
  if (empty($str)) {
    return '';
  }
  $str = trim($str);
  $str = stripslashes($str);
  $str = htmlspecialchars($str);
  return mysqli_real_escape_string($con, $str);
}

/**
 * Lấy danh sách sách từ database
 * @param mysqli $con - Kết nối database
 * @param int|string $limit - Số lượng sách (mặc định: không giới hạn)
 * @param int|string $categoryId - ID danh mục (mặc định: tất cả)
 * @param int|string $bookId - ID sách cụ thể (mặc định: tất cả)
 * @param string $orderBy - Sắp xếp (mặc định: không sắp xếp)
 * @return array - Mảng chứa thông tin sách
 */
function getProduct($con, $limit = '', $categoryId = '', $bookId = '', $orderBy = '')
{
  $sql = "SELECT * FROM books WHERE status = 1";
  
  // Nếu có bookId cụ thể, chỉ lấy sách đó (bỏ qua categoryId)
  if (!empty($bookId)) {
    $bookId = (int)$bookId;
    $sql .= " AND id = $bookId";
  } elseif ($categoryId !== '' && $categoryId !== null && $categoryId !== 0) {
    $categoryId = (int)$categoryId;
    $sql .= " AND category_id = $categoryId";
  }
  
  if (!empty($orderBy)) {
    $sql .= " ORDER BY $orderBy";
  }
  
  if (!empty($limit)) {
    $limit = (int)$limit;
    $sql .= " LIMIT $limit";
  }
  
  $res = mysqli_query($con, $sql);
  if (!$res) {
    return [];
  }
  
  $data = [];
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}

/**
 * Lấy sách bán chạy (best seller)
 */
function getBook($con, $limit = 8)
{
  $limit = (int)$limit;
  $sql = "SELECT * FROM books WHERE best_seller = 1 AND status = 1 LIMIT $limit";
  $res = mysqli_query($con, $sql);
  
  if (!$res) {
    return [];
  }
  
  $data = [];
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}

/**
 * Tìm kiếm sách theo tên hoặc tác giả
 */
function searchBooks($con, $keyword)
{
  $keyword = getSafeValue($con, $keyword);
  $sql = "SELECT * FROM books WHERE status = 1 
          AND (name LIKE '%$keyword%' OR author LIKE '%$keyword%')";
  $res = mysqli_query($con, $sql);
  
  if (!$res) {
    return [];
  }
  
  $data = [];
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}
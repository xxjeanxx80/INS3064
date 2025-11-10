<?php
/**
 * In mảng để debug (không dừng script)
 */
function pr($arr)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

/**
 * In mảng và dừng script (để debug)
 */
function prx($arr)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
  die();
}

/**
 * Làm sạch và bảo mật dữ liệu đầu vào
 * @param mysqli $databaseConnection - Kết nối database
 * @param string $inputString - Chuỗi cần làm sạch
 * @return string - Chuỗi đã được làm sạch và escape
 */
function getSafeValue($databaseConnection, $inputString)
{
  if (empty($inputString)) {
    return '';
  }
  $cleanedString = trim($inputString);
  $cleanedString = stripslashes($cleanedString);
  $cleanedString = htmlspecialchars($cleanedString);
  return mysqli_real_escape_string($databaseConnection, $cleanedString);
}

/**
 * Lấy danh sách sách từ database
 * @param mysqli $databaseConnection - Kết nối database
 * @param int|string $limitCount - Số lượng sách (mặc định: không giới hạn)
 * @param int|string $categoryId - ID danh mục (mặc định: tất cả)
 * @param int|string $bookId - ID sách cụ thể (mặc định: tất cả)
 * @param string $orderByClause - Sắp xếp (mặc định: không sắp xếp)
 * @return array - Mảng chứa thông tin sách
 */
function getProduct($con, $limitCount = '', $categoryId = '', $bookId = '', $orderByClause = '')
{
  $query = "SELECT * FROM books WHERE status = 1";
  
  // Nếu có bookId cụ thể, chỉ lấy sách đó (bỏ qua categoryId)
  if (!empty($bookId)) {
    $bookId = (int)$bookId;
    $query .= " AND id = $bookId";
  } elseif ($categoryId !== '' && $categoryId !== null && $categoryId !== 0) {
    $categoryId = (int)$categoryId;
    $query .= " AND category_id = $categoryId";
  }
  
  if (!empty($orderByClause)) {
    $query .= " ORDER BY $orderByClause";
  }
  
  if (!empty($limitCount)) {
    $limitCount = (int)$limitCount;
    $query .= " LIMIT $limitCount";
  }
  
  $queryResult = mysqli_query($con, $query);
  if (!$queryResult) {
    return [];
  }
  
  $booksList = [];
  while ($bookRecord = mysqli_fetch_assoc($queryResult)) {
    $booksList[] = $bookRecord;
  }
  return $booksList;
}

/**
 * Lấy sách bán chạy (best seller)
 * @param mysqli $databaseConnection - Kết nối database
 * @param int $limitCount - Số lượng sách cần lấy (mặc định: 8)
 * @return array - Mảng chứa thông tin sách bán chạy
 */
function getBook($con, $limitCount = 8)
{
  $limitCount = (int)$limitCount;
  $query = "SELECT * FROM books WHERE best_seller = 1 AND status = 1 LIMIT $limitCount";
  $queryResult = mysqli_query($con, $query);
  
  if (!$queryResult) {
    return [];
  }
  
  $bestSellerBooks = [];
  while ($bookRecord = mysqli_fetch_assoc($queryResult)) {
    $bestSellerBooks[] = $bookRecord;
  }
  return $bestSellerBooks;
}

/**
 * Tìm kiếm sách theo tên hoặc tác giả
 * @param mysqli $databaseConnection - Kết nối database
 * @param string $searchKeyword - Từ khóa tìm kiếm
 * @return array - Mảng chứa thông tin sách tìm được
 */
function searchBooks($con, $searchKeyword)
{
  $safeKeyword = getSafeValue($con, $searchKeyword);
  $query = "SELECT * FROM books WHERE status = 1 
          AND (name LIKE '%$safeKeyword%' OR author LIKE '%$safeKeyword%')";
  $queryResult = mysqli_query($con, $query);
  
  if (!$queryResult) {
    return [];
  }
  
  $searchResults = [];
  while ($bookRecord = mysqli_fetch_assoc($queryResult)) {
    $searchResults[] = $bookRecord;
  }
  return $searchResults;
}
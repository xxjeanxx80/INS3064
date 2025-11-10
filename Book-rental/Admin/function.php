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
 */
function getSafeValue($con, $str)
{
  if (empty($str)) {
    return '';
  }
  $str = trim($str);
  return mysqli_real_escape_string($con, $str);
}


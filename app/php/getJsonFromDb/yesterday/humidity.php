<?php
require '../../config/connectPernamentDb.php';

$date = date('Y-m-d', strtotime("-1 days"));
$result = mysqli_query($conn,"SELECT value, time, date FROM `humidity` WHERE date = '".$date."' ");

$tempToday = array();

if ($result->num_rows > 0) {
  $i = 0;
    while($row = $result->fetch_assoc()) {
      $x = explode(":", $row["time"]);
      $time = $x[0] . "h.";
      $tempToday[$i] = ($row["value"] . ", " . $row["date"] . ", " . $time);
      $i++;
    }
  }
echo json_encode($tempToday);

$conn->close();

$date = date('Y-m-d', strtotime("-1 days"));

?>

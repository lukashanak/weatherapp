<?php
require '../../config/connectPernamentDb.php';

$startDate = date('Y-m-d', strtotime("-6 days"));
$endDate = date('Y-m-d');
$result = mysqli_query($conn,"SELECT value, time, date FROM `temp` WHERE date BETWEEN '".$startDate."' AND '".$endDate."' ");

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

?>
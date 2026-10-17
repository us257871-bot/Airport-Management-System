<?php
$conn = new mysqli("localhost", "root", "", "airport db");
$source = $_GET['source'] ?? '';
$dest = $_GET['dest'] ?? '';
?>
<!DOCTYPE html>
<html>
<head><title>Airport System</title>
<style>
body{font-family:Arial; padding:20px;}
table{width:100%; border-collapse:collapse; margin-top:15px;}
th,td{border:1px solid #ccc; padding:8px; text-align:center;}
th{background:#007bff; color:white;}
input,button{padding:8px;}
</style>
</head>
<body>
<h2>✈️ Airport Management - Multan</h2>
<form method="GET">
From: <input type="text" name="source" placeholder="Multan" value="<?php echo $source ?>">
To: <input type="text" name="dest" placeholder="Dubai" value="<?php echo $dest ?>">
<button type="submit">Search Flights</button>
</form>

<table>
<tr>
<th>Flight No</th><th>Airline</th><th>From</th><th>To</th><th>Departure</th><th>Arrival</th><th>Price</th><th>Booking</th>
</tr>
<?php
$sql = "SELECT * FROM `flights` WHERE 1";
if($source != '') $sql .= " AND source_city LIKE '%$source%'";
if($dest != '') $sql .= " AND destination_city LIKE '%$dest%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
echo "<tr>
<td>".$row['flight no']."</td>
<td>".$row['airline']."</td>
<td>".$row['source_city']."</td>
<td>".$row['destination_city']."</td>
<td>".$row['departure_time']."</td>
<td>".$row['arrival_time']."</td>
<td>".$row['price']."</td>
<td><a href='book.php?id=".$row['id']."'>Book Now</a></td>
</tr>";
}
?>
</table>
</body>
</html>
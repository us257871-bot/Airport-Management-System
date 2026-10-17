<?php
$conn = new mysqli("localhost", "root", "", "airport db");
$conn->query("CREATE TABLE IF NOT EXISTS bookings (id INT AUTO_INCREMENT PRIMARY KEY, flight_id INT, passenger_name VARCHAR(100), passport_no VARCHAR(50))");
$id = $_GET['id'];
if(isset($_POST['book'])){
 $conn->query("INSERT INTO bookings (flight_id, passenger_name, passport_no) VALUES ('$id', '".$_POST['name']."', '".$_POST['passport']."')");
 echo "<h3>Booking Done! Mubarak Ho!</h3><a href='index.php'>Back</a>"; exit;
}
$f = $conn->query("SELECT * FROM flights WHERE id=$id")->fetch_assoc();
?>
<h2>Booking for <?php echo $f['flight no'] ?> - <?php echo $f['airline'] ?></h2>
<form method="POST">
Name: <input type="text" name="name" required><br><br>
Passport: <input type="text" name="passport" required><br><br>
<button type="submit" name="book">Confirm Booking</button>
</form>
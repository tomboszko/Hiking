<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'toms', 'root');

// Get the ID from the URL
$id = $_GET['id'];

// Prepare the SQL statement
$stmt = $db->prepare('DELETE FROM hiking WHERE id = ?');

// Execute the statement with the ID
$stmt->execute([$id]);

// Redirect to read.php
header('Location: read.php');
exit;
?>
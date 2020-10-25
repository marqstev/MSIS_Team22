<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM Certifications';
// $vars = [];

if (isset($_GET['certificationId'])) {
  // This is an example of a parameterized query
  $sql = 'SELECT * FROM Certifications';
  // $vars = [ $_GET['certificationId'] ];
}

$stmt = $db->prepare($sql);
$stmt->execute();

$certfied= $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($certfied, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;

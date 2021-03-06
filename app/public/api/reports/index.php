<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM certificationList WHERE expirationStatus = "Expired"';

$stmt = $db->prepare($sql);
$stmt->execute();

$index = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($index, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;

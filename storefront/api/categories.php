<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once dirname(__DIR__) . '/config.php';

$db = db();

$result = $db->query("
    SELECT c.id, c.category_name, COUNT(i.id) AS product_count
    FROM db_category c
    INNER JOIN db_items i ON i.category_id = c.id AND i.status = 1
    GROUP BY c.id, c.category_name
    HAVING product_count > 0
    ORDER BY product_count DESC
");

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode($categories);

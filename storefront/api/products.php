<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once dirname(__DIR__) . '/config.php';

$db = db();

$category_id = isset($_GET['category']) ? (int)$_GET['category'] : 0;
$search      = isset($_GET['search'])   ? $db->real_escape_string(trim($_GET['search'])) : '';
$page        = isset($_GET['page'])     ? max(1, (int)$_GET['page']) : 1;
$limit       = 24;
$offset      = ($page - 1) * $limit;

$where = "i.status = 1";
if ($category_id > 0) $where .= " AND i.category_id = $category_id";
if ($search !== '')   $where .= " AND (i.item_name LIKE '%$search%' OR i.item_code LIKE '%$search%')";

$count_row = $db->query("
    SELECT COUNT(*) AS total
    FROM db_items i
    LEFT JOIN db_category c ON c.id = i.category_id
    WHERE $where
")->fetch_assoc();

$total = (int)($count_row['total'] ?? 0);

$result = $db->query("
    SELECT i.id, i.item_name, i.item_code, i.item_image,
           i.final_price, i.stock, i.status,
           c.category_name,
           b.brand_name
    FROM db_items i
    LEFT JOIN db_category c ON c.id = i.category_id
    LEFT JOIN db_brands   b ON b.id = i.brand_id
    WHERE $where
    ORDER BY i.id DESC
    LIMIT $limit OFFSET $offset
");

$products = [];
while ($row = $result->fetch_assoc()) {
    $row['image_url'] = item_image_url($row['item_image']);
    $products[] = $row;
}

echo json_encode([
    'total'    => $total,
    'page'     => $page,
    'pages'    => ceil($total / $limit),
    'products' => $products,
]);

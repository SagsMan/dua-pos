<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'duafrqco_dua');
define('DB_PASS', 'duastore2580');
define('DB_NAME', 'duafrqco_dua');
define('POS_BASE', 'https://pos.duafashion.store');

function db() {
    static $conn = null;
    if ($conn === null) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn->set_charset('utf8mb4');
    }
    return $conn;
}

function item_image_url($img) {
    if (empty($img)) return POS_BASE . '/theme/images/no_image.png';
    return POS_BASE . '/' . ltrim($img, '/');
}

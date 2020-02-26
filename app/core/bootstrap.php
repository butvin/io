<?php

require_once 'DB.php';

$conn = \Butvin\Core\DB::getInstance();
if ($conn) {
    var_dump($conn);
}

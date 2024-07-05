<?php
require '../config/config.php';

$query = select("SELECT * FROM barang");

echo json_encode($query);
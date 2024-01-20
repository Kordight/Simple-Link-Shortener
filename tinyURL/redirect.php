<?php
// Pobierz public ID z parametru zapytania
$publicID = isset($_GET['target']) ? $_GET['target'] : '';

// Wyświetl zawartość public ID
echo "Zawartość public ID: $publicID";
?>

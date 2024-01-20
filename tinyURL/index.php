<?php
// Pobierz public ID z parametru zapytania
$publicID = isset($_GET['publicID']) ? $_GET['publicID'] : '';

// Wyświetl zawartość public ID
echo "Zawartość public ID: $publicID";
?>

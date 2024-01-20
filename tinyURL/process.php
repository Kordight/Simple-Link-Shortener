<?php
require "library.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $longUrl = $_POST["UserUrl"];
    $expires = $_POST["vol"];
    echo "<p><strong>Long Url: </strong> $longUrl</p>";
    echo "<p><strong>Expire: </strong> $expires</p>";
    // echo "<p><strong>Short URL</strong></p>";
    $dbConfig = getDatabaseConfig();
    $conn = new mysqli($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);
    if ($conn) {
        // Implement tinyUrl generation
    }
} else {
    // Redirect back to the form if accessed directly
    header("Location: index.php");
    exit();
}

<?php
require "library.php";
// Pobierz public ID z parametru zapytania
$tinyUrl = isset($_GET['target']) ? $_GET['target'] : '';

// Wyświetl zawartość public ID
$dbConfig = getDatabaseConfig();
$conn = new mysqli($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);

if ($conn) {
    // Using prepared statement to avoid SQL injection
    $query = "SELECT * FROM url_list WHERE tinyUrl = ?";
    $stmt = $conn->prepare($query);

    // Bind the parameter
    $stmt->bind_param("s", $tinyUrl);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the data
    while ($row = $result->fetch_assoc()) {
        // Access the 'longUrl' column from the result
        $longUrl = $row['longUrl'];

        // Do something with $longUrl
        echo "Long URL: $longUrl";

        header("Location: $longUrl");
        die();
    }
    echo "This URL is invalid!";
    // Close the statement
    $stmt->close();
}



$conn->close();

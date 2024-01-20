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

    //$conn = mysqli_connect("localhost", "root", "", "url_library");
    if ($conn) {
        while (true) {
            $tinyUrl = bin2hex(random_bytes(3));
            $urlExpireDate = calcExpireDate($expires);

            $tinyUrl = $conn->real_escape_string($tinyUrl);

            $sql_check_player = "SELECT * FROM url_list WHERE tinyUrl = '$tinyUrl'";
            $result_check_player = $conn->query($sql_check_player);

            if ($result_check_player->num_rows === 0) {
                $longUrl = $conn->real_escape_string($longUrl);
                $sql_insert = "INSERT INTO url_list (longUrl, tinyUrl, urlExpireDate) 
                               VALUES ('$longUrl', '$tinyUrl', '$urlExpireDate')";

                if ($conn->query($sql_insert) === true) {
                    //Success 
                    echo("<p>Added: " .$longUrl ." as: " .$tinyUrl ."</p>");
                } else {
                    //Failure
                }
                break;
            }
        }
        $conn->close();
    }
} else {
    // Redirect back to the form if accessed directly
    header("Location: index.php");
    exit();
}

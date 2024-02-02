<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
</head>

<body>
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

    ?>
    <br>
    <hr>
    <footer>
        <h3>Authors:</h3>
        <div class="links">
            <a href="https://github.com/seba0456">
                <img src="images/github-mark.png" alt="Github profile" style="width:42px;height:42px;">
                <br><b>seba0456</b>
            </a>
        </div>
</body>

</html>
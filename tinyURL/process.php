<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Link Shortener - Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
</head>

<body>
    <a href="index.php"><img src="images/app-icon.png" style="width:150px;height:150px;" alt="App logo" class="center"></a>
    <div class="border-box">
        <?php
        session_start(); // Start session

        require "library.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $longUrl = $_POST["UserUrl"];

            $dbConfig = getDatabaseConfig();
            $conn = new mysqli($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);

            if ($conn) {
                if (!isset($_SESSION['tinyUrl'])) { // Check if short URL has already been generated
                    while (true) {
                        $tinyUrl = bin2hex(random_bytes(3));
                        $tinyUrl = $conn->real_escape_string($tinyUrl);

                        $sql_check_player = "SELECT * FROM url_list WHERE tinyUrl = '$tinyUrl'";
                        $result_check_player = $conn->query($sql_check_player);

                        if ($result_check_player->num_rows === 0) {
                            $longUrl = $conn->real_escape_string($longUrl);
                            $sql_insert = "INSERT INTO url_list (longUrl, tinyUrl) 
                               VALUES ('$longUrl', '$tinyUrl')";

                            if ($conn->query($sql_insert) === true) {
                                // Save the short URL in session
                                $_SESSION['tinyUrl'] = $tinyUrl;
                                break;
                            } else {
                                // Failure
                            }
                        }
                    }
                } else {
                    // If user already has assigned short URL, retrieve it from session
                    $tinyUrl = $_SESSION['tinyUrl'];
                }
                // Get URL
                $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
                $serverName = $_SERVER['HTTP_HOST'];
                $scriptName = $_SERVER['SCRIPT_NAME'];
                $baseURL = $protocol . '://' . $serverName . "/tinyURL";
                $fullURL = $baseURL . '/' . $tinyUrl;

                echo ("<h1 style='text-align: center; font-size: 40px; '>Your short URL is ready!</h1><br>");
                echo "<p style='font-size: 25px;'>Your short URL is <a href='$fullURL'>$fullURL</a></p>";
                // Close database connection
                $conn->close();
            }
        } else {
            // If user is not redirected from the form, redirect them back to the form
            header("Location: index.php");
            exit();
        }

        ?>
        <hr>
        <p>Your URL will never expire!</p>
        <p>Keep in mind that this tool may not be stable and could contain issues. For any inconvenience, I apologize!</p>
    </div>
    <hr><br>
    <footer>
        <h3>Authors:</h3>
        <div class="links">
            <a href="https://github.com/kordight">
                <img src="images/github-mark.png" alt="Github profile" style="width:42px;height:42px;">
                <br><strong>Kordight</strong>
            </a>
        </div>
    </footer>
</body>

</html>
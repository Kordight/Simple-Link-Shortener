<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
</head>

<body>
    <div class="border-box">
        <?php
        require "library.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $longUrl = $_POST["UserUrl"];
            //$expires = $_POST["vol"];
            //$urlExpireDate = calcExpireDate($expires);
            $dbConfig = getDatabaseConfig();
            $conn = new mysqli($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);

            if ($conn) {
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
                            //Success 
                            echo ("<h1 style='text-align: center; font-size: 45px; '>Your short URL is ready!</h1><br>");
                            // Get the protocol (http or https)
                            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

                            // Get the server name
                            $serverName = $_SERVER['HTTP_HOST'];

                            // Get the script name (current script)
                            $scriptName = $_SERVER['SCRIPT_NAME'];

                            // Combine the protocol, server name, and script name to form the base URL
                            $baseURL = $protocol . '://' . $serverName . "/tinyURL";

                            // Construct the full URL
                            $fullURL = $baseURL . '/' . $tinyUrl;

                            // Display the result

                            echo "<p style='font-size: 25px;'>Your short URL is <a href='$fullURL'>$fullURL</a></p>";
                            /*
                    // Convert the string to a timestamp
                    $urlExpireTimestamp = strtotime($urlExpireDate);

                    // Format the timestamp into a readable date and time
                    $formattedExpireDate = date('Y-m-d H:i:s', $urlExpireTimestamp);
                    echo "<br><p>Your link will expire on: $formattedExpireDate</p>";
                */
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
        ?>
        <hr>
        <p>Your URL will never expire!</p>
        <p>Keep in mind that this tool may not be stable and could contain issues. For any inconvenience, I apologize!</p>
    </div>
    <hr><br>
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
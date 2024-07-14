<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Link Shortener</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
</head>

<body>
    <a href="index.php"><img src="images/app-icon.png" style="width:150px;height:150px;" alt="App logo" class="center"></a>
    <div class="border-box">
        <form action="process.php" method="post">
            <label for="UserUrl">Paste your long URL:</label>
            <div class="input-wrapper">
                <input type="url" id="UserUrl" name="UserUrl" placeholder="Enter the link here..." style="width: 100%;" required>
                <input type="submit" value="Shorten URL!" style="padding-left: 15px; padding-right:15px">
            </div>
        </form>
    </div>
    <div class="border-box">
        <h2>What is this?</h2>
        <p>This tool was created by <a href="https://github.com/kordight">Sebastian Legieziński</a>. It is my own approach to creating a URL shortener tool. You can find this tool in <a href="https://github.com/Kordight/Simple-Link-Shortener">Simple Link Shortener repository</a>. Feel free to use it. If you have any ideas or you've found a bug, please open a new issue on this project's repository.</p>
        <p>Keep in mind that this tool may not be stable and could contain issues. For any inconvenience, I apologize!</p>
        <h2>How does it work?</h2>
        <p>Currently, this tool operates in a straightforward manner. Users submit lengthy URLs to the server, which then generates a unique random ID and returns it to the user. When the server receives the ID associated with a link from the user, it searches the database for the corresponding long URL and redirects the user to the target website.</p>
        <h2>Is it free?</h2>
        <p>Yes, it is! I want to host my tools and other assets for free just to make knowledge available to everyone!</p>

        <h2>Future Plans for the Project</h2>
        <p>I intend to enhance this project by introducing new features. One upcoming addition will be a stats tab, allowing you to manage your links, view statistics, and remove your links as needed.</p>
        <p>If you appreciate my efforts and would like to support further development, please consider making a donation. Your support will enable me to broaden my skillset and improve the project.</p>

    </div>
    <hr>
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
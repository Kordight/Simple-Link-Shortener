<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten your URL!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

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
        <p>This tool was created by <a href="https://github.com/seba0456">Sebastian Legieziśki</a>. It is my own approach to creating a URL shortener tool. You can find this tool in <a href="https://github.com/seba0456/Simple-Link-Shortener">this repository</a>. Feel free to use it. If you have any ideas or you've found a bug, please open a new issue on this project's repository.</p>
        <p>Keep in mind that this tool may not be stable and could contain issues. For any inconvenience, I apologize!</p>
        <h2>How does it work?</h2>
        <p>This is a very simple tool. It simply stores your long link, generates a short link ID, and stores that data in a database.</p>
        <h2>Is it free?</h2>
        <p>Yes, it is! I want to host my tools and other assets for free just to make knowledge available to everyone!</p>
    </div>
    <hr>
    <footer>
        <h3>Authors:</h3>
        <div class="links">
            <a href="https://github.com/seba0456">
                <img src="images/github-mark.png" alt="Github profile" style="width:42px;height:42px;">
                <br><strong>seba0456</strong>
            </a>
        </div>
    </footer>
</body>
</html>

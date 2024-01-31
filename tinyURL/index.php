<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten your URL!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Shorten your URL!</h2>

    <form action="process.php" method="post">

        <label for="UserUrl">Paste yours long Url:</label><br>
        <input type="url" id="UserUrl" name="UserUrl" required><br>
        <label for="vol">Select expire date:</label><br>
        <input type="range" id="vol" name="vol" min="0" max="5" value="0" step="1" onchange="updateRangeValue()">
        <br><input type="submit" value="Shorten URL!">
        <!-- add Captcha someday...-->
        <div class="expires">
            <p>Yours link expires <span id="rangeValue">Next day</span>.</p>
        </div>

    </form>


    <script>
        function updateRangeValue() {
            var rangeInput = document.getElementById('vol');
            var rangeValueSpan = document.getElementById('rangeValue');
            var rangeToStr = "";
            switch (parseInt(rangeInput.value)) {
                case 0:
                    rangeToStr = "Next day";
                    break;
                case 1:
                    rangeToStr = "In 3 days";
                    break;
                case 2:
                    rangeToStr = "Next Week";
                    break;
                case 3:
                    rangeToStr = "Next Month";
                    break;
                case 4:
                    rangeToStr = "In 3 Months";
                    break;
                case 5:
                    rangeToStr = "Next Year";
                    break;
                default:
                    rangeToStr = "Next day";
                    break;
            }
            rangeValueSpan.innerHTML = rangeToStr;
        }
    </script>
    <hr>
    <footer>
        <h3>Authors:</h3>
        <div class="links">
            <a href="https://github.com/seba0456">
                <img src="images/github-mark.png" alt="Github profile" style="width:42px;height:42px;">
                <br><b>seba0456</b>
            </a>
        </div>

    </footer>
</body>

</html>
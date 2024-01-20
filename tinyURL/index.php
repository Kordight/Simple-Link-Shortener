<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten your URL!</title>
</head>

<body>

    <h2>Shorten your URL!</h2>

    <form action="process.php" method="post">
        <label for="url">Full Url:</label>
        <input type="text" name="name" required><br>
        <label for="vol">Expires:</label>
        <input type="range" id="vol" name="vol" min="0" max="5" value="0" step="1" onchange="updateRangeValue()">
        <div class="expires">
            <p>Expires <span id="rangeValue">Next day</span>.</p>
        </div>

<input type="submit" value="Submit">
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
</body>

</html>
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
document.addEventListener('DOMContentLoaded', function () {
    // Get all the buttons
    var minusButtons = document.querySelectorAll('#minus-btn');
    var plusButtons = document.querySelectorAll('#plus-btn');

    // Loop through all the buttons and add event listeners
    minusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Get the input field associated with this button
            var inputField = button.nextElementSibling;
            var value = parseInt(inputField.value, 10);

            // Decrement the value, but don't let it go below zero
            if (value > 0) {
                value--;
            }

            // Set the new value
            inputField.value = value;
        });
    });

    plusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Get the input field associated with this button
            var inputField = button.previousElementSibling;
            var value = parseInt(inputField.value, 10);

            // Increment the value
            value++;

            // Set the new value
            inputField.value = value;
        });
    });
});
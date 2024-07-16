

function sendRdvData() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL /mycontroller/create
    xhr.open('POST', "./../../index.php/Rendez_vous/create", true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // Set up the onload function to handle the response
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Success! Here is the response
            var response = JSON.parse(xhr.responseText);
            console.log(response);
        } else {
            // Handle errors
            console.error('Request failed with status: ' + xhr.status);
        }
    };

    // Set up the onerror function to handle network errors
    xhr.onerror = function() {
        console.error('Network error');
    };

    // Get form data
    var form = document.getElementById('rdvForm');
    var formData = new FormData(form);

    // Convert form data to JSON
    var object = {};
    formData.forEach((value, key) => {
        object[key] = value;
    });
    var json = JSON.stringify(object);

    // Send the request with the data
    xhr.send(json);
}

var form = document.getElementById('rdvForm');
form.onsubmit = function(event) {
    event.preventDefault();
    sendRdvData();
};
const form = document.getElementById("rdvForm");
const error = document.querySelector(".error");
let result = null;

function sendRdvData(){
    const formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: './../../index.php/Rendez_vous/create',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            result = JSON.parse(response)
            console.log(result);
            if (result.status == "error") {
                error.style.color = "red";
                error.textContent = result.message;
                // fields.forEach(field => {
                //     field.style.outline = "3px solid #E11F1F";
                //     setTimeout(() => {
                //         field.style.outline = "none";
                //     }, 1500);
                // })
            } 
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

form.onsubmit = function(event) {
    event.preventDefault();
    sendRdvData();
};
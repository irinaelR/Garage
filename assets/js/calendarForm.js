const form = document.getElementById('calendarRdvForm');
const error = document.querySelector('.error');
let result = null;

function sendCalendarRdvData(){
    const formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: './../../index.php/Rendez_vous/rdv_for_client',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            result = JSON.parse(response)
            console.log(result);
            if (result.status === "error") {
                error.style.color = "red";
                error.textContent = result.message;
                // fields.forEach(field => {
                //     field.style.outline = "3px solid #E11F1F";
                //     setTimeout(() => {
                //         field.style.outline = "none";
                //     }, 1500);
                // })
            } else {
                window.location.href =  './../../index.php/Devis/exportDevisPdf?id=' + result.devis;
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

form.onsubmit = function(event) {
    event.preventDefault();
    sendCalendarRdvData();
};
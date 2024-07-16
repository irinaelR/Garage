const form = document.getElementById("form");
const fields = document.querySelectorAll(".field");
const error = document.querySelector(".error");
let result = null;

function sendLoginData(){
    const formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: './../../index.php/Client/create',
        data: formData,
        contentType: false,
        processData: false,
        xhrFields: {
            withCredentials: true
        },
        success: function(response) {
            result = JSON.parse(response);
            console.log(result);
            if (result.status === "error") {
                error.style.color = "red";
                error.textContent = result.message;
                fields.forEach(field => {
                    field.style.outline = "3px solid #E11F1F";
                    setTimeout(() => {
                        field.style.outline = "none";
                    }, 1500);
                })
            } else {
                window.location.href =  './../../index.php/Rendez_vous/nouveau_rdv';
                // window.location.href =  './../../index.php/User/check_session/'+fields[0].value;
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

form.onsubmit = async  e => {
    e.preventDefault();
    await sendLoginData();
}
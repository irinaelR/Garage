const deleteButton = document.getElementById("suppr-base");
let result = []
const message = document.querySelector(".message");
const modal = document.getElementById("modal");

function eraseBase(){
    $.ajax({
        type: 'GET',
        url: './../../index.php/Csv_traitement/deleteData',
        contentType: false,
        processData: false,
        xhrFields: {
            withCredentials: true
        },
        success: function(response) {
            result = response;
            if(result === "Base supprimée avec succès") {
                message.style.color = "#15d515";
                message.innerHTML = result;
                modal.click();
            } else {
                message.style.color = "red";
                message.innerHTML = result;
                modal.click();
            }
            console.log(result);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

deleteButton.onclick = async () => {
    await eraseBase()
}
const form = document.getElementById("dayForm");
const error = document.querySelector(".error");
let result = null;

function createTable(tab_info) {
    var html = '';

    if(tab_info !== undefined) {
        tab_info.forEach(element => {
            html += '<tr class="bg-white hover:bg-gray-50"> <td class="size-px whitespace-nowrap"> <span class="block px-6 py-2"> <span class="font-mono text-sm text-primary-500">'+ element.numVoiture +'</span> </span> </td> <td class="size-px whitespace-nowrap">  <span class="block px-6 py-2"> <span class="text-sm text-gray-600">' + element.dateDebut + '</span> </span> </td> <td class="size-px whitespace-nowrap">  <span class="block px-6 py-2"> <span class="text-sm text-gray-600">' + element.nomService + '</span> </span> </td> </tr>';
        });
    }


    
    // html += '</tbody> </table> </div> </div>';

    return html;
                
}

function createSlotCard(slot_info, tab) {
    var html = '<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden"> <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">' +
              '<div> <h2 class="text-xl font-semibold text-gray-800"> ' + slot_info.nomSlot + ' </h2> <p class="text-sm text-gray-600"> Clients : ' + slot_info.count + ' </p> </div> </div>' + '<div class="border-b min-w-full border-gray-200 hover:bg-gray-50"> <button type="button" class="hs-collapse-toggle py-4 px-6 w-full flex items-center gap-2 font-semibold text-gray-800" id="hs-basic-collapse" data-hs-collapse="#hs-as-table-collapse"> <svg class="hs-collapse-open:rotate-90 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg> Détails </button>' +
              '<div id="hs-as-table-collapse" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-collapse">'
                
    var filtered_arr = tab.filter(function(el) {
        return el.idSlot == slot_info.idSlot;
    });
          
    html += createTable(filtered_arr);
            
    html += '</div> </div> </div>';

    return html;
}

const slotCardContainer = document.getElementById("slotCardContainer");
function sendToDayOccup(){
    const formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: './../../index.php/Slot/get_day_occupation',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            result = JSON.parse(response);
            console.log(result);
            result[0].forEach(slot => {
                var slotName = document.getElementById("slot_name_" + slot.idSlot);
                slotName.innerHTML = slot.nomSlot;

                var slotCount = document.getElementById("slot_count_" + slot.idSlot);
                slotCount.innerHTML = "Clients : " + slot.count;
                
                var tbody = document.getElementById("t_body_" + slot.idSlot);
                tbody.innerHTML = "";
                var filtered_arr = result[1].filter(function(el) {
                    return el.idSlot == slot.idSlot;
                });
                tbody.innerHTML = createTable(filtered_arr);
            });
            // console.log(result);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    sendToDayOccup();
});

form.onsubmit = function(event) {
    event.preventDefault();
    sendToDayOccup();
};
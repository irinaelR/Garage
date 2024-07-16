$(document).ready(function() {
    function loadDevis() {
        $.ajax({
            url: './../../index.php/Devis/devis_with_prestation',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var tableBody = '';
                console.log(response);
                response.forEach(function(devis) {
                    tableBody += '<tr class="bg-white hover:bg-gray-50">' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="font-mono text-sm text-primary-500">' + devis.idDevis + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.numVoiture + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.nomService + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.dateDevis + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.slot + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.dureeService + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.prixService + '</span></span>' +
                        '</button></td>'+
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">';
                    
                    if (devis.datePayement === null) {
                        tableBody += '<form class="update-date-payement-form" data-id-devis="' + devis.idDevis + '">' +
                            '<input type="dateTime-local" name="datePayement" required>' +
                            '<input type="submit">' +
                            '</form>';
                    } else {
                        tableBody += '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + devis.datePayement + '</span></span>';
                    }
                    
                    tableBody += '</button></td>' +
                        '</tr>';
                });
                $('tbody').html(tableBody);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }

    $(document).on('submit', '.update-date-payement-form', function(e) {
        e.preventDefault();

        var form = $(this);
        var idDevis = form.data('id-devis');
        var datePayement = form.find('input[name="datePayement"]').val();

        $.ajax({
            url: './../../index.php/Devis/update_date_payement',
            type: 'POST',
            data: {
                idDevis: idDevis,
                datePayement: datePayement
            },
            success: function(response) {
                if (response.status == 'success') {
                    // alert('Date de paiement mise à jour avec succès.');
                    loadDevis();
                }else if(response.status==null) {
                    // alert('Date non valide');
                    loadDevis();
                }else{
                    loadDevis();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    loadDevis();
});
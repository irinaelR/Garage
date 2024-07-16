$(document).ready(function() {
    $('#serviceForm').on('submit', function(e) {
        e.preventDefault();
        let idService = $('#serviceForm').data('id');
        let url = idService ? './../../index.php/Service/update/' + idService : './../../index.php/Service/create';
        console.log(url);
        
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    alert(response.message);
                    loadServices();
                    $('#serviceForm')[0].reset();
                    $('#serviceForm').removeData('id');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('click', '.modifier-btn', function() {
        let idService = $(this).data('id');
        
        $.ajax({
            url: './../../index.php/Service/view/' + idService,
            type: 'GET',
            dataType: 'json',
            success: function(service) {
                // console.log(service);
                $('#serviceForm').data('id', service.idService);
                $('#nom').val(service.nom);
                $('#duree').val(service.duree);
                $('#prix').val(service.prix);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    function loadServices() {
        $.ajax({
            url: './../../index.php/Service/index',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var tableBody = '';
                response.forEach(function(service) {
                    tableBody += '<tr class="bg-white hover:bg-gray-50">' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="font-mono text-sm text-primary-500">' + service.idService + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + service.nom + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + service.duree + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="block px-6 py-2"><span class="text-sm text-gray-600">' + service.prix + '</span></span>' +
                        '</button></td>' +
                        '<td class="size-px whitespace-nowrap">' +
                        '<button class="modifier-btn" data-id="' + service.idService + '" type="button" data-hs-overlay="#hs-ai-invoice-modal">' +
                        '<span class="px-6 py-1.5"><span class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">' +
                        '<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">' +
                        '<path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>' +
                        '<path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>' +
                        '</svg> Modifier</span></span></button></td></tr>';
                });
                $('tbody').html(tableBody);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }
    
    loadServices();
});

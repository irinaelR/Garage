<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-0">
    <div class="max-w-xl mx-auto">
    <div class="text-start">
        <h1 class="text-3xl font-bold text-primary-50 sm:text-4xl">
        Rendez-vous
        </h1>
        <p class="mt-1 text-primary-50">
        Réservez votre prochain rendez-vous chez nous 
        </p>
    </div>

    <div class="mt-12">
        <!-- Form -->
        <form id="rdvForm">
        <div class="grid gap-4 lg:gap-6">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <div>
                <label for="hs-work-email-hire-us-2" class="block mb-2 text-sm text-primary-50 font-medium">Date</label>
                <input type="datetime-local" name="dateDebut" id="hs-work-email-hire-us-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="hs-company-hire-us-2" class="block mb-2 text-sm text-primary-50 font-medium">Service</label>
                    <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="idService">
                        <?php
                            foreach ($services as $key => $service) { ?>
                                <option value="<?php echo($service["idService"]) ?>"><?php echo($service["nom"]." (".$service["duree"].")") ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Grid -->

        
        <div class="mt-6 grid">
            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-500 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">Confirmer</button>
        </div>

        
        </form>
        <!-- End Form -->
    </div>
    </div>
</div>

<script src="<?php echo(base_url("assets/js/rdv.js")) ?>"></script>
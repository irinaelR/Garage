<div class="flex flex-col lg:flex-row mx-2 justify-evenly">
    

  <!-- Table Section -->
  <div class="w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-0">
    <!-- Card -->
    <div class="flex min-w-full flex-col">
      <div class="-m-1.5 min-w-full overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="w-1/2 mb-7">
            <form id="dayForm">
            <div class="flex flex-col">
              <label for="dateInput" class="block mb-2 text-sm text-primary-50 font-medium">Jour d'activité</label>
              <div class="flex flex-row">
                <input type="date" value="<?php echo($referenceDate) ?>" name="day" id="dateInput" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                <button type="submit" class="px-4 mx-3  inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-500 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">Valider</button>
              </div>
              </div>
            </form>
          </div>
          <div class="flex flex-row">
            <?php
            
            for($i=1; $i <= 3; $i++) { ?>
              <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden m-4 w-1/3">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
              <div>
                <h2 id="<?php echo("slot_name_".$i) ?>" class="text-xl font-semibold text-gray-800">
                  Slot A
                </h2>
                <p class="text-sm text-gray-600" id="<?php echo("slot_count_".$i) ?>">
                  Clients : 3
                </p>
              </div>
            </div>
  
            <div class="border-b min-w-full border-gray-200 hover:bg-gray-50">
              <button type="button" class="hs-collapse-toggle py-4 px-6 w-full flex items-center gap-2 font-semibold text-gray-800" id="hs-basic-collapse<?php echo($i) ?>" data-hs-collapse="#hs-as-table-collapse<?php echo($i) ?>">
                <svg class="hs-collapse-open:rotate-90 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                Détails
              </button>
              <div id="hs-as-table-collapse<?php echo($i) ?>" class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-collapse">
                
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Immatriculation voiture
                      </span>
                    </div>
                  </th>
  
                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Date de début
                      </span>
                    </div>
                  </th>
  
                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Service effectué
                      </span>
                    </div>
                  </th>
  
                  
                </tr>
              </thead>
  
              <tbody class="divide-y divide-gray-200" id="<?php echo("t_body_".$i) ?>">
                <tr class="bg-white hover:bg-gray-50">
                  <td class="size-px whitespace-nowrap">
                    <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                      <span class="block px-6 py-2">
                        <span class="font-mono text-sm text-primary-500" <?php echo("slot_name_".$i) ?>>#ADUQ2189H1-0038</span>
                      </span>
                    </button>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                      <span class="block px-6 py-2">
                        <span class="text-sm text-gray-600">US $400.00</span>
                      </span>
                    </button>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                      <span class="block px-6 py-2">
                        <span class="text-sm text-gray-600">10 Jan 2023</span>
                      </span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- End Table -->
  
              </div>
              
            </div>
            <!-- End Accordion -->
          </div>
            <?php }
            
            ?>
  
            
            
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Table Section -->
</div>

<script src="<?php echo(base_url('assets/js/slotOccupation.js')) ?>"></script>
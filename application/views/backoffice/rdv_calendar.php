<div id='calendar' class="w-2/3 self-center mt-7"></div>

<div id="hs-modal-rdvForm" class="hs-overlay bg-dark-transparent size-full fixed hidden top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-20 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
      <div class="p-4 sm:p-7">
        <button onclick="closeModal()">Close</button>
        <div class="text-center">
          <h2 class="block text-2xl font-bold text-gray-800 ">Nouveau rendez-vous</h2>
          <div class="h-[30px] border border-b">
            <p class="error"></p>
          </div>
        </div>

        <div class="mt-5">

          <!-- Form -->
          <form id="calendarRdvForm">
            <div class="grid gap-y-4">
              <!-- Form Group -->
               <input type="hidden" id="rdvDate" name="rdvDate">
              <div>
                <label for="email" class="block text-sm mb-2 ">Heure du rendez-vous</label>
                <div class="relative">
                  <input type="time" id="rdvHeure" name="rdvHeure" class="py-3 px-4 block w-full border border-gray-700 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " required >
                </div>
              </div>
              <!-- End Form Group -->

              <!-- Form Group -->
              <div>
                <div class="flex justify-between items-center">
                  <label for="idClient" class="block text-sm mb-2 ">Client</label>
                </div>
                <div class="relative">
                    <select id="idClient" name="idClient" class="py-3 px-4 block w-full border border-gray-700 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " required >
                        <?php
                        
                        foreach ($listeClients as $key => $c) { ?>
                            <option value="<?php echo($c["idClient"]) ?>"><?php echo($c["numVoiture"]) ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
              <!-- End Form Group -->

              <!-- Form Group -->
              <div>
                <div class="flex justify-between items-center">
                  <label for="idService" class="block text-sm mb-2 ">Service</label>
                </div>
                <div class="relative">
                    <select id="idService" name="idService" class="py-3 px-4 block w-full border border-gray-700 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " required >
                        <?php
                        
                        foreach ($services as $key => $s) { ?>
                            <option value="<?php echo($s["idService"]) ?>"><?php echo($s["nom"]) ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
              <!-- End Form Group -->

              <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Ajouter rendez-vous</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>

<script src=<?php echo(base_url('assets/js/fullcalendar/dist/index.global.js')) ?>></script>
<script src=<?php echo(base_url('assets/js/calendarForm.js')) ?>></script>
<script>
    const modal = document.getElementById('hs-modal-rdvForm');

    const rdvs = JSON.parse(<?php echo $rdv ?>);

    const array = []


    rdvs.foreach(rdv => {
        const tempObj = {
            title: rdv.
        }
    })

    function closeModal() {
        modal.style.display = "none";
    }

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    const rdvForm = document.getElementById('calendarRdvForm');
    const hiddenInput = document.getElementById('rdvDate');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: '2023-01-12',
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        modal.style.display = "block";
        var formattedDate = arg.start.getFullYear() + '-' + 
                    ('0' + (arg.start.getMonth() + 1)).slice(-2) + '-' + 
                    ('0' + arg.start.getDate()).slice(-2);
        hiddenInput.value = formattedDate;

        // var title = prompt('Event Title:');
        // if (title) {
        //   calendar.addEvent({
        //     title: title,
        //     start: arg.start,
        //     end: arg.end,
        //     allDay: arg.allDay
        //   })
        // }
        calendar.unselect()
      },
      eventClick: function(arg) {
        // if (confirm('Are you sure you want to delete this event?')) {
        //   arg.event.remove()
        // }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [

        {
          title: 'All Day Event',
          start: '2023-01-01'
        },
        {
          title: 'Long Event',
          start: '2023-01-07',
          end: '2023-01-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-01-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-01-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2023-01-11',
          end: '2023-01-13'
        },
        {
          title: 'Meeting',
          start: '2023-01-12T10:30:00',
          end: '2023-01-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2023-01-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2023-01-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2023-01-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2023-01-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2023-01-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2023-01-28'
        }
      ]
    });



    calendar.render();
  });

</script>
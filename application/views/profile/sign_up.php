<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto"><!-- Card -->
  <div class="p-4 sm:p-7">
    <div class="mb-8 text-center">
      <h2 class="text-3xl  text-primary-50 font-bold ">
        Sign Up
      </h2>
      <p class="mt-2 text-sm text-primary-50">
        Already have an account?
        <a class="text-secondary decoration-2 hover:underline font-medium" href="<?php echo(site_url("User/signIn")) ?>">
        Sign in here
        </a>
    </p>
    </div>

    <form>
      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
        <div class="sm:col-span-3">
          <label class="inline-block text-sm text-primary-50 mt-2.5">
            Profile photo
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="flex items-center gap-5">
            <!-- <img class="inline-block size-16 rounded-full ring-2 ring-white" src="https://via.placeholder.com/160x160" alt="Image Description"> -->
            <div class="flex gap-x-2">
            <label class="custum-file-upload py-5" for="file">
                <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                </div>
                <div class="text">
                <span>Click to upload an image</span>
                </div>
                <div class="file-name mt-2 text-gray-600"></div>
                <input type="file" id="file">
            </label>

            </div>
          </div>
        </div>

        <script>
            document.getElementById('file').addEventListener('change', function(event) {
                const fileName = event.target.files[0] ? event.target.files[0].name : '';
                document.querySelector('.file-name').textContent = fileName;
            });
        </script>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-full-name" class="inline-block text-sm text-primary-50 mt-2.5">
            Full name
          </label>
          <div class="hs-tooltip inline-block">
            <button type="button" class="hs-tooltip-toggle ms-1">
              <svg class="inline-block size-3 text-primary-50" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            </button>
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible w-40 text-center z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
              Displayed on public forums, such as Preline
            </span>
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <input id="af-account-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="John">
            <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Doe">
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-password" class="inline-block text-sm text-primary-50 mt-2.5">
            Date of birth
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="space-y-2">
            <input id="af-account-dob" type="date" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm  disabled:opacity-50 disabled:pointer-events-none">
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-gender-checkbox" class="inline-block text-sm text-primary-50 mt-2.5">
            Gender
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <label for="af-account-gender-checkbox" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
              <input type="radio" name="af-account-gender-checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="af-account-gender-checkbox" checked>
              <span class="text-sm text-primary-50 ms-3">Male</span>
            </label>

            <label for="af-account-gender-checkbox-female" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
              <input type="radio" name="af-account-gender-checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="af-account-gender-checkbox-female">
              <span class="text-sm text-primary-50 ms-3">Female</span>
            </label>

            <label for="af-account-gender-checkbox-other" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
              <input type="radio" name="af-account-gender-checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="af-account-gender-checkbox-other">
              <span class="text-sm text-primary-50 ms-3">Other</span>
            </label>
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-email" class="text-primary-50 inline-block text-sm mt-2.5">
            Email
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <input id="af-account-email" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none" placeholder="maria@site.com">
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-password" class="inline-block text-sm text-primary-50 mt-2.5">
            Password
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="space-y-2">
            <input id="af-account-password" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm  disabled:opacity-50 disabled:pointer-events-none" placeholder="Must be at least 8 characters long">
          </div>
        </div>
        <!-- End Col -->

        

        <div class="sm:col-span-3">
          <div class="inline-block">
            <label for="af-account-phone" class="inline-block text-sm text-primary-50 mt-2.5">
              Phone
            </label>
            <span class="text-sm text-gray-400">
              (Optional)
            </span>
          </div>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <input id="af-account-phone" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="+x(xxx)xxx-xx-xx">
            <select class="py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
              <option selected>Mobile</option>
              <option>Home</option>
              <option>Work</option>
              <option>Fax</option>
            </select>
          </div>

          
        </div>
        <!-- End Col -->

        

        
      </div>
      <!-- End Grid -->

      <div class="mt-5 flex w-full gap-x-2">
        <!-- <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
          Cancel
        </button> -->
        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-secondary text-white hover:bg-primary-50 hover:text-secondary disabled:opacity-50 disabled:pointer-events-none">Sign up</button>
      </div>
    </form>
  </div>
  <!-- End Card -->
</div>
<!-- End Card Section -->
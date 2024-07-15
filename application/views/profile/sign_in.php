<div class="my-7 h-fit relative self-center flex flex-col lg:flex-row-reverse items-center justify-between">
    <div class="lg:w-1/2 lg:block hidden relative z-10 lg:z-20">
        <img src="https://via.placeholder.com/800x800" alt="">
        <div class="absolute inset-0 bg-dark bg-opacity-50 lg:bg-opacity-0"></div>
    </div>
    <div class="lg:w-1/3  pt-12 pb-10 px-4 sm:px-6 lg:px-8 md:pt-24 ">
        <div class="p-4 sm:p-7">
            <div class="text-center">
            <h1 class="block text-3xl font-bold text-primary-50">Sign in</h1>
            <p class="mt-2 text-sm text-primary-50 error">
                Connectez-vous ou inscrivez-vous
            </p>
            </div>

            <div class="mt-5">
            <!-- <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                <path d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z" fill="#4285F4"/>
                <path d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z" fill="#34A853"/>
                <path d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z" fill="#FBBC05"/>
                <path d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z" fill="#EB4335"/>
                </svg>
                Sign in with Google
            </button> -->

            <!-- <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6">Or</div> -->

            <!-- Form -->
            <form id="form">
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div class="mb-2">
                        <label for="numVoiture" class="block text-primary-50 text-sm mb-2">Numero voiture</label>
                        <input type="text" id="numVoiture" name="numVoiture" class="py-3 px-4 block w-full rounded-lg text-sm focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none field" required aria-describedby="numero-voiture-error">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="mb-2">
                        <label for="idTypeVoiture" class="block text-sm mb-2 text-primary-50">Type voiture</label>
                        <select id="idTypeVoiture" name="idTypeVoiture" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none field" required aria-describedby="type-error">
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type['idTypeVoiture'] ?>"><?php echo $type["nom"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- End Form Group -->

                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-secondary text-white hover:bg-primary-50 hover:text-secondary disabled:opacity-50 disabled:pointer-events-none">Sign in</button>
                </div>
            </form>
            <!-- End Form -->
            </div>
        </div>
    </div>
    
</div>

<script src="<?php echo base_url("assets/js/login.js")?>" type="module"></script>

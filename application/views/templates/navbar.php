

<!-- ========== HEADER ========== -->
<header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full text-sm sticky top-0">
  <nav class="mt-6 max-w-[85rem] w-full bg-primary-50 border border-light-transparent rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex-none text-xl text-primary-500 font-bold" href="#" aria-label="Brand">Garage</a>
      <div class="md:hidden">
        <button type="button" class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full border border-gray-200 text-gray-800 disabled:opacity-50 disabled:pointer-events-none" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
          <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
      <div class="flex flex-col md:flex-row md:items-center md:justify-end py-2 md:py-0 md:ps-7">
        <?php 
        
        $links = [];
        $links["Home"] = "#";
        $links["List"] = site_url("GeneralEntity/list");
        foreach ($links as $key => $value) {
          $text = "text-secondary hover:text-gray-400";
          if(isset($active) && strcasecmp($key, $active) == 0) {
            $text = "text-primary-500";
          }  
          
        ?>
          <a class="py-3 ps-px sm:px-3 font-medium <?php echo($text) ?> " href="<?php echo($value) ?>"><?php echo($key) ?></a>
        <?php } ?>
        

        <a class="flex items-center gap-x-2 font-medium text-primary-50 bg-secondary rounded px-4 py-2 m-4" href="<?php echo(site_url("User/signIn")) ?>">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Log in
        </a>
      </div>
    </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->

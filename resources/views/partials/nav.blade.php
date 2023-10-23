<div class="w-full py-5 bg-fuchsia-900">
  <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
      <x-logo></x-logo>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          
          <x-search></x-search>
          <x-browse></x-browse>
          <x-write></x-write>
          <x-library></x-library>
          <x-button url="/login" text="Login" color="bg-fuchsia-700 text-white" hover="hover:bg-fuchsia-800"></x-button>
          <x-button url="/register" text="Register" color=" border-2 border-solid text-fuchsia-400 border-fuchsia-400 bg-transparent" hover="hover:bg-fuchsia-500 hover:text-white"></x-button>
        </ul>
      </div>
        
    </div>
  </nav>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table of Authors</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resorces/js/dropdown.js'); ?>
</head>
<body>
    <nav
    class="relative flex w-full flex-nowrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:flex-wrap lg:justify-start lg:py-4"
    data-te-navbar-ref>
    <div class="flex flex-wrap items-center justify-around w-full px-3">
      <div class="flex flex-row ml-2">
        <a class="text-xl text-neutral-800 dark:text-neutral-200" href="/authors"
          >Navbar</a
        >
        <div class="flex items-center justify-between w-1/3 ml-5 md:w-20">
            
            <input
                type="search"
                class="relative m-0 block w-[1px] min-w-5 flex-auto rounded border-solid border-2 border-neutral-300 bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-neutral-400 focus:border-none motion-reduce:transition-none"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="button-addon2"
            />
            
            
            <span
                class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base text-neutral-700 font-normal"
                id="basic-addon2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="w-6 h-6 text-neutral-700 hover:cursor-pointer hover:text-neutral-900"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd"
                    />
                </svg>
            </span>
            
        </div>
      </div>
      
      <!-- Hamburger button for mobile view -->
      <button
        class="block px-2 bg-transparent border-0 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
        type="button"
        data-te-collapse-init
        data-te-target="#navbarSupportedContent2"
        aria-controls="navbarSupportedContent2"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <!-- Hamburger icon -->
        <span class="[&>svg]:w-7">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-7 w-7">
            <path
              fill-rule="evenodd"
              d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
              clip-rule="evenodd" />
          </svg>
        </span>
      </button>
  
      <!-- Collapsible navbar container -->
      <div
        class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
        id="navbarSupportedContent2"
        data-te-collapse-item>
        <!-- Left links -->
        <ul
          class="flex flex-col pl-0 mr-auto list-style-none lg:mt-1 lg:flex-row"
          data-te-navbar-nav-ref>
          <!-- Home link -->
          <li
            class="pl-2 my-4 lg:my-0 lg:pl-2 lg:pr-1"
            data-te-nav-item-ref>
            <a
              class="active disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              aria-current="page"
              href="#"
              data-te-nav-link-ref
              >Home</a
            >
          </li>
          <!-- Features link -->
          <li
            class="pl-2 mb-4 lg:mb-0 lg:pl-0 lg:pr-1"
            data-te-nav-item-ref>
            <a
              class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              href="#"
              data-te-nav-link-ref
              >Features</a
            >
          </li>
          <!-- Pricing link -->
          <li
            class="pl-2 mb-4 lg:mb-0 lg:pl-0 lg:pr-1"
            data-te-nav-item-ref>
            <a
              class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              href="#"
              data-te-nav-link-ref
              >Pricing</a
            >
          </li>
          <!-- Disabled link -->
          <li
            class="pl-2 mb-4 lg:mb-0 lg:pl-0 lg:pr-1"
            data-te-nav-link-ref>
            <a
              class="text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              >Disabled</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html><?php /**PATH C:\xampp\htdocs\uniread\resources\views/table.blade.php ENDPATH**/ ?>
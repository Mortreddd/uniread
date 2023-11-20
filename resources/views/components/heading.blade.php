<div id="{{$id}}" class="min-h-full text-center bg-fixed bg-center bg-no-repeat bg-cover py-44" style="background-image: url('{{ asset($backgrounds) }}');" :id="$id" :backgrounds="$backgrounds" :heading="$heading" :description="$description">
    <h1 class="h-full mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">{{$heading}}</h1>
    <p class="mb-6 text-lg font-normal text-gray-100 lg:text-xl sm:px-16 xl:px-48 ">{{$description}}</p>
    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">
        Learn more
        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
    </svg>
    </a>
</div>

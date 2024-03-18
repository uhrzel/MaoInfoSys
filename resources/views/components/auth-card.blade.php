<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2">

        <a href="/">
            <img src="{{ asset('img/logo5.png') }}" class="logo block h-20 w-auto" alt="Logo">

        </a>
        <span class="sr-only">Dashboard</span>
    </a>

    <div class="w-full px-6 py-4 my-6 overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</main>
<!DOCTYPE html>
<html>

<head>
    <title>Teste - IESB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-[#f3f4f6]">
    <div class="container mx-auto">
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center">
                    <img src="/img/logo.png" class="h-15 mr-3" alt="Flowbite Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Teste Prático</span>
                </a>
                <div class="flex md:order-2 gap-2">
                    <button type="button" class="text-red-700 border border-red-800 bg-white hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center md:mr-0 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 relative group">
                        <i class="fas fa-file"></i> Relatórios
                        <ul class="absolute hidden shadow-lg text-gray-700 group-hover:block group-focus:block right-0 mt-2 w-[25rem] bg-white border border-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 rounded-lg shadow-lg">
                            <li>
                                <a href="/relatorio-alunos-por-curso" class=" block w-[25rem] py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-400">Quantitativo de alunos por curso</a>
                            </li>
                            <li>
                                <a href="/relatorio-alunos-por-curso-ordem-alfabetica" class=" block w-[25rem] py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-400">Alunos por curso e posteriormente ordem alfabética</a>
                            </li>
                        </ul>
                    </button>
                    <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center md:mr-0 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 relative group">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                        <ul class="absolute hidden text-gray-700 group-hover:block group-focus:block right-0 mt-2 w-48 bg-white border border-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 rounded-lg shadow-lg">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" class=" block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-400">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </button>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col items-center p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/aluno" class="block py-2 pl-3 pr-4 {{ (Route::currentRouteName() === 'aluno.index') ? 'text-red-700' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Alunos</a>
                        </li>
                        <li>
                            <a href="/curso" class="block py-2 pl-3 pr-4 {{ (Route::currentRouteName() === 'curso.index') ? 'text-red-700' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Cursos</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container mx-auto mt-48">
            @yield('content')
        </div>

    </div>
</body>

</html>
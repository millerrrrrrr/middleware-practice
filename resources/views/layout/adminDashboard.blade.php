<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <nav class="bg-gray-700 flex justify-between px-4 py-2.5">
        <h2 class="text-xl font-bold text-gray-400 hover:text-gray-300">Admin</h2>
        <div>
            <ul class="">
                <a href="" class="px-2 text-gray-400 hover:text-gray-300 hover:underline transition ease-in ">Home</a>
                <a href="" class="px-2 text-gray-400 hover:text-gray-300 hover:underline transition ease-in ">About</a>
                <a href="" class="px-2 text-gray-400 hover:text-gray-300 hover:underline transition ease-in ">Contact</a>
                </a>

                
            </ul>

            
        </div>

        
    </nav>

    <div>
        @yield('main')
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: @json(session('success'))
                })
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: @json(session('error'))
                })
            @endif

            @if (session('warning'))
                Toast.fire({
                    icon: 'warning',
                    title: @json(session('warning'))
                })
            @endif

            @if (session('info'))
                Toast.fire({
                    icon: 'info',
                    title: @json(session('info'))
                })
            @endif

            @if (session('question'))
                Toast.fire({
                    icon: 'question',
                    title: @json(session('question'))
                })
            @endif
        });
    </script>
    
</body>
</html>
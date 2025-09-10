<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6 text-black">Register</h2>

            <form action="{{ route('registerPost') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="input input-bordered w-full" required
                        autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="input input-bordered w-full" minlength="8" required>
                </div>

                <div class="mb-4">
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" id="age" name="age" class="input input-bordered w-full" required >
                </div>

                <div class="w-full mb-4">
                    <label for="dropdown" class="block text-sm font-medium text-gray-700">Select an Option</label>
                    <select id="dropdown" name="role" class="select select-bordered w-full">
                        <option disabled selected>Choose an option</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>



               <div class="mb-4">
                <button type="submit" class="btn btn-primary w-full">Register</button>
               </div>
            </form>

            <div class="text-center mt-4">
                <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
            </div>
        </div>
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

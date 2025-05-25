<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-700 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-8 w-full max-w-md shadow-2xl">
        <div class="text-center mb-8">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-20 h-20 mx-auto mb-4 object-contain">
            <h1 class="text-2xl font-bold text-gray-800">Welcome Back!</h1>
        </div>

        <x-validation-errors class="mb-4 bg-red-50 text-red-600 p-3 rounded-lg text-sm" />

        @session('status')
            <div class="mb-4 bg-green-50 text-green-600 p-3 rounded-lg text-sm">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus
                    placeholder="Email Address"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                >
            </div>

            <div>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required
                    placeholder="Password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
                >
            </div>

            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="remember_me" 
                    name="remember" 
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-right">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 transition duration-200">
                        Forgot your password?
                    </a>
                </div>
            @endif

            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:opacity-90 transform hover:-translate-y-0.5 transition duration-200 shadow-lg"
            >
                Sign In
            </button>
        </form>
    </div>
</body>
</html>

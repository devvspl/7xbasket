<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - 7x Basket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <div class="text-center mb-8">
        <div class="inline-flex items-center gap-2 mb-4">
            <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center">
                <span class="text-white font-bold">7x</span>
            </div>
            <span class="text-2xl font-bold text-gray-900">Basket Admin</span>
        </div>
        <p class="text-gray-500 text-sm">Sign in to manage your franchise portal</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-3 mb-5 text-sm text-red-700">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="admin@7xbasket.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="••••••••">
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" class="rounded text-green-600">
                <label for="remember" class="text-sm text-gray-600">Remember me</label>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 rounded-xl hover:bg-green-700 transition-colors">
                Sign In
            </button>
        </form>
    </div>
</div>

</body>
</html>

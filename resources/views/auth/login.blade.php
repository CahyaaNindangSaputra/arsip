<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - ARSIP</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-sm">
            
            <!-- Branding -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-black text-gray-900 tracking-tighter">ARSIP</h1>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mt-1">Sistem Manajemen Kearsipan</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100">
                
                @if (session('status'))
                    <div class="mb-4 text-xs font-bold text-green-600 text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                               class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-xs font-bold text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-600 transition" 
                               placeholder="Email Address">
                        @error('email')
                            <span class="text-red-500 text-[10px] font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input id="password" type="password" name="password" required 
                               class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-xs font-bold text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-600 transition" 
                               placeholder="Password">
                        @error('password')
                            <span class="text-red-500 text-[10px] font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-[10px] font-bold text-gray-500 uppercase tracking-wider">Remember</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-blue-600 uppercase tracking-wider hover:underline">Forgot?</a>
                        @endif
                    </div>

                    <button type="submit" 
                            class="w-full bg-gray-900 text-white rounded-2xl py-4 font-black text-xs uppercase tracking-widest hover:bg-black transition-all transform active:scale-95 shadow-lg">
                        Sign In
                    </button>
                </form>
            </div>

            <p class="text-center text-[10px] font-bold text-gray-400 mt-6 uppercase tracking-widest">
                &copy; {{ date('Y') }} ARSIP
            </p>
        </div>
    </div>
</body>
</html>
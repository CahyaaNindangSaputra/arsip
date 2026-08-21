<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Arsip Kelurahan Pulau</title>

    <!-- Font & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js & Tailwind CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Kustomisasi scrollbar biar rapi */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body x-data="{ sidebarOpen: true }" class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">
    
    <!-- Panggil Sidebar -->
    @include('layouts.navigation')

    <!-- Konten Utama -->
    <div class="transition-all duration-300 ease-in-out min-h-screen flex flex-col" :class="sidebarOpen ? 'ml-[260px]' : 'ml-[80px]'">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
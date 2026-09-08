<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Arsip</title>

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
    
 
    @include('layouts.navigation')

    <!-- Konten Utama -->
    <div class="transition-all duration-300 ease-in-out min-h-screen flex flex-col" :class="sidebarOpen ? 'ml-[260px]' : 'ml-[80px]'">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
    <!-- OVERLAY LOADING SPINNER -->
<div x-data="{ pageLoading: false }" 
@beforeunload.window="pageLoading = true"
x-show="pageLoading" 
style="display: none;" 
class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-xs transition-opacity">
<div class="bg-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border border-slate-100">
   <i class="fas fa-circle-notch text-blue-600 text-2xl animate-spin"></i>
   <span class="text-sm font-bold text-slate-700">Memuat Sistem...</span>
</div>
</div>

</body>
</html>
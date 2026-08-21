<nav :class="sidebarOpen ? 'w-[260px]' : 'w-[80px]'" class="fixed inset-y-0 left-0 bg-[#1e293b] text-slate-300 transition-all duration-300 ease-in-out z-50 flex flex-col border-r border-slate-800 shadow-xl">
    
    <!-- Tombol Toggle (Putih bersih) -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -right-3 top-6 w-6 h-6 bg-white rounded-full flex items-center justify-center text-slate-600 border border-slate-200 shadow-md hover:text-blue-600 hover:bg-slate-50 transition-colors z-50 cursor-pointer">
        <i class="fas fa-chevron-left text-[10px] transition-transform duration-300" :class="sidebarOpen ? '' : 'rotate-180'"></i>
    </button>

    <!-- Logo -->
    <div class="h-16 flex items-center border-b border-slate-700/50 transition-all duration-300" :class="sidebarOpen ? 'px-6' : 'justify-center px-0'">
        <div class="w-8 h-8 rounded bg-blue-600 flex items-center justify-center shrink-0 shadow-sm">
            <i class="fas fa-archive text-white text-sm"></i>
        </div>
        <span x-show="sidebarOpen" class="ml-3 text-lg font-bold text-white tracking-wide transition-opacity duration-300">
            E-ARSIP
        </span>
    </div>

    <!-- Profil User -->
    <div class="my-4 transition-all duration-300 bg-slate-800/50 border border-slate-700/50 rounded-xl flex items-center" :class="sidebarOpen ? 'mx-4 p-3' : 'mx-2 p-2 justify-center'">
        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold shrink-0 bg-blue-500 relative">
            {{ substr(Auth::user()->name ?? 'A', 0, 2) }}
            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-400 border-2 border-[#1e293b] rounded-full"></span>
        </div>
        <div x-show="sidebarOpen" class="ml-3 overflow-hidden">
            <p class="font-semibold text-sm text-slate-100 truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
            <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@gmail.com' }}</p>
        </div>
    </div>

    <!-- Menu Links -->
    <div class="py-2 flex-1 overflow-y-auto overflow-x-hidden transition-all duration-300" :class="sidebarOpen ? 'px-3' : 'px-2'">
        
        <a href="{{ route('dashboard') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-border-all w-5 text-center {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Dashboard</span>
        </a>

        <!-- Header Menu Arsip -->
        <div x-show="sidebarOpen" class="mt-6 mb-2 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">Data Master</div>
        <div x-show="!sidebarOpen" class="mt-6 mb-2 mx-2 border-t border-slate-700"></div>
        
        <a href="{{ route('arsip.aktif') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('arsip.aktif') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-folder-open w-5 text-center {{ request()->routeIs('arsip.aktif') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Arsip Aktif</span>
        </a>
        
        <a href="{{ route('arsip.inaktif') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('arsip.inaktif') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-box-archive w-5 text-center {{ request()->routeIs('arsip.inaktif') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Arsip Inaktif (Pindah)</span>
        </a>

        <a href="{{ route('arsip.musnah') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('arsip.musnah') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-fire-alt w-5 text-center {{ request()->routeIs('arsip.musnah') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Arsip Usul Musnah</span>
        </a>

        <a href="{{ route('arsip.serah') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('arsip.serah') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-file-export w-5 text-center {{ request()->routeIs('arsip.serah') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Arsip Usul Serah</span>
        </a>

        @if(auth()->check() && auth()->user()->role == 'admin')
        <div x-show="sidebarOpen" class="mt-6 mb-2 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">Administrator</div>
        <div x-show="!sidebarOpen" class="mt-6 mb-2 mx-2 border-t border-slate-700"></div>
        
        <a href="{{ route('users.index') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-users-cog w-5 text-center {{ request()->routeIs('users.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Kelola Akun</span>
        </a>

        <a href="{{ route('rak.index') }}" class="flex items-center py-2.5 rounded-lg transition-all duration-200 group mt-1 {{ request()->routeIs('rak.*') ? 'bg-blue-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white' }}" :class="sidebarOpen ? 'px-3' : 'justify-center'">
            <i class="fas fa-server w-5 text-center {{ request()->routeIs('rak.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
            <span x-show="sidebarOpen" class="text-sm font-medium">Lokasi Rak</span>
        </a>
        @endif
    </div>

    <!-- Logout -->
    <div class="p-4 border-t border-slate-700/50">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button title="Log Out" type="submit" class="w-full flex items-center py-2.5 rounded-lg text-slate-400 hover:bg-rose-500 hover:text-white transition-colors duration-200 group" :class="sidebarOpen ? 'px-4 justify-start' : 'justify-center px-0'">
                <i class="fas fa-power-off text-sm" :class="sidebarOpen ? 'mr-3' : 'mr-0'"></i>
                <span x-show="sidebarOpen" class="text-sm font-medium">Keluar Sistem</span>
            </button>
        </form>
    </div>
</nav>
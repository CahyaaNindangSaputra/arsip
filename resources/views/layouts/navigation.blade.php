<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-xs">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo Teks Modern & Elegan -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-black text-base tracking-wider text-blue-700 hover:text-blue-800 transition">
                        ARSIP
                    </a>
                </div>

                <!-- Navigation Links dengan Font Lebih Tegas -->
                <div class="hidden space-x-6 sm:flex sm:items-center">
                    
                    <!-- Dropdown Menu Arsip -->
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen" type="button" class="inline-flex items-center px-1 pt-1 text-xs font-bold text-gray-700 hover:text-blue-700 focus:outline-none transition">
                            <span>Menu Arsip</span>
                            <svg class="ml-1 h-4 w-4 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Box Dropdown Absolute Terkontrol -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute left-0 mt-2 w-52 rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 py-2 z-50">
                            <a href="{{ route('arsip.aktif') }}" class="block px-4 py-2 text-xs font-bold text-gray-800 hover:bg-blue-50 hover:text-blue-700 transition">🟢 Daftar Arsip Aktif</a>
                            <a href="{{ route('arsip.inaktif') }}" class="block px-4 py-2 text-xs font-bold text-gray-800 hover:bg-blue-50 hover:text-blue-700 transition">📦 Arsip Inaktif (Pindah)</a>
                            <a href="{{ route('arsip.musnah') }}" class="block px-4 py-2 text-xs font-bold text-gray-800 hover:bg-blue-50 hover:text-blue-700 transition">🔥 Arsip Usul Musnah</a>
                            <a href="{{ route('arsip.serah') }}" class="block px-4 py-2 text-xs font-bold text-gray-800 hover:bg-blue-50 hover:text-blue-700 transition">📋 Arsip Usul Serah</a>
                        </div>
                    </div>

                    <!-- Menu Kelola Akun & Lokasi Rak (Hanya Admin) -->
                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="text-xs font-bold text-gray-700 hover:text-blue-700">
                            {{ __('Kelola Akun') }}
                        </x-nav-link>
                        <x-nav-link :href="route('rak.index')" :active="request()->routeIs('rak.*')" class="text-xs font-bold text-gray-700 hover:text-blue-700">
                            {{ __('Lokasi Rak') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown Kanan -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-extrabold rounded-lg text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="text-xs font-bold text-red-600">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard Arsip') }}
            </x-responsive-nav-link>

            <div class="px-4 py-2 font-black text-xs text-gray-400 uppercase tracking-wider">Menu Arsip</div>
            <x-responsive-nav-link :href="route('arsip.aktif')">🟢 Daftar Arsip Aktif</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('arsip.inaktif')">📦 Arsip Inaktif (Pindah)</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('arsip.musnah')">🔥 Arsip Usul Musnah</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('arsip.serah')">📋 Arsip Usul Serah</x-responsive-nav-link>

            @if(auth()->check() && auth()->user()->role == 'admin')
                <div class="pt-2"></div>
                <x-responsive-nav-link :href="route('users.index')">Kelola Akun</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('rak.index')">Lokasi Rak</x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-extrabold text-sm text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
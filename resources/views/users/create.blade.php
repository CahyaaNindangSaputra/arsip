<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Akun Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required value="{{ old('name') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required value="{{ old('email') }}">
                    </div>

                    <!-- Input Password dengan Fitur Show/Hide -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 pr-16 border" required>
                            <button type="button" onclick="togglePassword()" id="toggle-btn" class="absolute inset-y-0 right-0 px-3 text-xs font-semibold text-gray-600 hover:text-gray-900 focus:outline-none">
                                Show
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Role / Hak Akses</label>
                        <select name="role" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 border" required>
                            <option value="user">User Biasa</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('users.index') }}" style="background-color: #6b7280; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; text-decoration: none;">Batal</a>
                        <button type="submit" style="background-color: #16a34a; color: white; padding: 8px 20px; border-radius: 6px; font-weight: 600; font-size: 14px; border: none; cursor: pointer;">Simpan Akun</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Script JavaScript untuk Toggle Show/Hide Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.getElementById('toggle-btn');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        }
    </script>
</x-app-layout>
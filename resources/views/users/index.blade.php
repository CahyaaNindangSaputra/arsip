<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Akun Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-6 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Kelola Akun</h3>
                        <a href="{{ route('users.create') }}" style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; text-decoration: none;">+ Tambah Akun</a>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                        <table class="w-full divide-y divide-gray-200 text-left text-sm">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="p-3.5" width="5%">No</th>
                                    <th class="p-3.5">Nama</th>
                                    <th class="p-3.5">Email</th>
                                    <th class="p-3.5">Role</th>
                                    <th class="p-3.5 text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse ($users as $index => $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3.5">{{ $index + 1 }}</td>
                                        <td class="p-3.5 font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="p-3.5 text-gray-700">{{ $user->email }}</td>
                                        <td class="p-3.5">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $user->role == 'super_admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="p-3.5 text-center">
                                            <a href="{{ route('users.edit', $user->id) }}" style="background-color: #0284c7; color: white; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: 600; text-decoration: none;">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-6 text-center text-gray-500">Tidak ada data pengguna.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto" />
                    </div>
                
                    <div class="mt-8 text-2xl">
                        Selamat Datang {{auth()->user()->name}} !
                    </div>
                
                    <div class="mt-6 text-gray-500">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium et reprehenderit architecto facilis. Corporis voluptas voluptatem saepe molestias aliquid enim veniam consectetur mollitia, odit explicabo autem ex est labore eveniet?
                    </div>
                </div>
                
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href={{route("items.index", ['category' => 1])}}>Komponen</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Data Item Komponen, Karyawan dapat mengambil data namun tidak dapat menambah data. Admin Memiliki otoritas untuk menambah atau mengubah data. Setiap Perubahan data akan di catat.
                            </div>
                
                            <a href="{{route("items.index", ['category'=>1])}}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>Jelajahi Data Komponen</div>
                
                                        <div class="ml-1 text-indigo-500">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route("items.index", ['category'=>2])}}">Inventaris</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Data Item Inventaris, Karyawan dapat mengambil data namun tidak dapat menambah data. Admin Memiliki otoritas untuk menambah atau mengubah data. Setiap Perubahan data akan di catat.
                            </div>
                
                            <a href="{{route("items.index", ['category'=>2])}}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>Jelajahi Data Inventaris</div>
                
                                        <div class="ml-1 text-indigo-500">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route("items.index", ['category'=>3])}}">Alat</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Data Item Alat, Karyawan dapat mengambil data namun tidak dapat menambah data. Admin Memiliki otoritas untuk menambah atau mengubah data. Setiap Perubahan data akan di catat.
                            </div>
                
                            <a href="{{route("items.index", ['category'=>2])}}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                        <div>Jelajahi Data Alat</div>
                
                                        <div class="ml-1 text-indigo-500">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @can('user_access')
                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <a class="ml-4 text-lg text-gray-600 leading-7 font-semibold" href="{{route("users.index")}}">Tambah User</a>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Tambah User Karyawan atau User Admin. Kategori User untuk user biasa, tindakannya di batasi, Kategori User Admin memiliki otoritas lebih tinggi. 
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

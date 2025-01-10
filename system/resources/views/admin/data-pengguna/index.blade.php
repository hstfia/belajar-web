<x-layouts.app>
    <div class="col-span-12">
        <h2 class="section-content-title">DATA PENGGUNA</h2> <br>

        {{-- Alert untuk notifikasi sukses atau gagal --}}
        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-700" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700" role="alert">
                {{ session('danger') }}
            </div>


        @endif

        <div class="col-span-12">
            <div class="box">
                <div class="header">
                    <a href="{{ url('admin/data-pengguna/create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Tambah Pengguna
                    </a>
                </div>
                <div class="body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $pengguna)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>{{ $pengguna->nama_kk }}</td>
                                    <td>{{ $pengguna->tlp_kk }}</td>
                                    <td>{{ $pengguna->alamat_kk }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('admin/pengguna/detail', $pengguna->id) }}"
                                                class="btn btn-outline-warning">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/pengguna/edit', $pengguna->id) }}"
                                                class="btn btn-outline-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ url('admin/pengguna/delete', $pengguna->id) }}"
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

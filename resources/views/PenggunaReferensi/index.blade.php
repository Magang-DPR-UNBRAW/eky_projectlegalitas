@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
        <div>
            <ol class="breadcrumb fs-sm mb-1 ">
                <li class="breadcrumb-item">Menu</li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
            </ol>
            <h4 class="main-title mb-0">Daftar Pengguna</h4>
        </div>
        <div>
            <a href="{{ route('Add Pengguna Referensi') }}" class="btn btn-success">
                <i class="ri-pencil-line"></i> Tambah Pengguna
            </a>
        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').remove();
                    }, 3000);
                </script>
            @endif
            

            <div class="table-responsive">
                <table id="tableGrid3">
                    <thead>
                        <tr>
                            <th scope="col" class="p-1 text-center" style="width: 5%;">No</th>
                            <th scope="col" class="p-1 text-center" style="width: 15%;">Pegawai</th>
                            <th scope="col" class="p-1 text-center" style="width: 15%;">Peran</th>
                            <th scope="col" class="p-1 text-center" style="width: 15%;">Unit Kerja</th>
                            <th scope="col" class="p-1 text-center" style="width: 15%;">Handphone</th>
                            <th scope="col" class="p-1 text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $val)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $val->id_pegawai}}</td>
                                <td class="text-center">{{ $val->id_jabatan}}</td>
                                <td class="text-center">{{ $val->id_satker}}</td>
                                <td class="text-center">{{ $val->handphone}}</td>
                                <td class="text-center">
                                    <a href="{{ route('Edit Pengguna Referensi', $val->id) }}" class="btn btn-primary p-1">
                                        <i class="ri-edit-2-line"></i> Edit
                                    </a>
                                    <form action="{{ route('Hapus Pengguna Referensi', $val->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger p-1">
                                            <i class="ri-delete-bin-line"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

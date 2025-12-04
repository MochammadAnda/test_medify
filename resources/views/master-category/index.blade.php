@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ url('/master-category/form/new') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ url('/master-category') }}" class="row mb-3">

    <div class="col-md-4">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control"
               value="{{ request('nama') }}" placeholder="Cari nama kategori...">
    </div>

    <div class="col-md-4">
        <label>Kode Kategori</label>
        <input type="text" name="kode" class="form-control"
               value="{{ request('kode') }}" placeholder="Cari kode kategori...">
    </div>

    <div class="col-md-4 d-flex align-items-end">
        <button type="submit" class="btn btn-primary me-2">Filter</button>

        <a href="{{ url('/master-category') }}" class="btn btn-secondary">
            Reset
        </a>
    </div>

</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Kategori</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $k)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $k->nama }}</td>
                <td>
                    <a href="{{ url('/master-category/detail/'.$k->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ url('/master-category/form/edit/'.$k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('/master-category/delete/'.$k->id) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Apakah yakin ingin menghapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

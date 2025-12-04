@extends('layouts.app')

@section('content')
<div class="container">

    <h4>{{ $method == 'edit' ? 'Edit Kategori' : 'Tambah Kategori' }}</h4>

    <form method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="nama"
                   value="{{ $item->nama ?? '' }}" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ url('/master-category') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection

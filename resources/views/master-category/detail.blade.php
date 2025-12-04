@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Detail Kategori</h3>
    <a href="{{ url('/master-category/print/'.$kategori->id) }}" 
   target="_blank" 
   class="btn btn-danger mb-3">
   Print PDF
</a>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Nama Kategori:</strong> {{ $kategori->nama }}</p>
            <p><strong>Kode Kategori:</strong> {{ $kategori->kode }}</p>
        </div>
    </div>

    <h4>List Item dengan Kategori Ini:</h4>

    @if($kategori->items->count() == 0)
        <div class="alert alert-warning">Belum ada item dalam kategori ini.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori->items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection

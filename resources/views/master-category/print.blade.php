<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kategori</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }

        .footer {
            position: fixed;
            bottom: -20px;
            left: 0;
            right: 0;
            text-align: right;
            font-size: 11px;
            color: #555;
        }

        .info {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Detail Kategori</h2>
    </div>

    <div class="info">
        <p><strong>Nama Kategori:</strong> {{ $kategori->nama }}</p>
        <p><strong>Kode Kategori:</strong> {{ $kategori->kode }}</p>
    </div>

    <h4>Daftar Item Pada Kategori Ini:</h4>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kode Item</th>
                <th>Nama Item</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori->items as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align:center;">Tidak ada item pada kategori ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ $tanggal }} pukul {{ $waktu }}
    </div>

</body>
</html>

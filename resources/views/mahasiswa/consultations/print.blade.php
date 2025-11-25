<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Bimbingan Akademik</title>
    <style>
        body { font-family: Arial, sans-serif; color: #000; padding: 40px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 20px; }
        .header h1 { margin: 0; font-size: 20px; text-transform: uppercase; }
        .header h2 { margin: 5px 0; font-size: 16px; font-weight: normal; }

        .biodata { margin-bottom: 20px; width: 100%; }
        .biodata td { padding: 4px; vertical-align: top; }

        table.log { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.log th, table.log td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 12px; }
        table.log th { background-color: #f0f0f0; text-align: center; }

        .footer { margin-top: 50px; display: flex; justify-content: space-between; }
        .sign-box { text-align: center; width: 200px; float: right; }
        .sign-space { height: 80px; }

        @media print {
            button { display: none; }
            @page { margin: 2cm; }
        }
    </style>
</head>
<body onload="window.print()">

    <button onclick="window.print()" style="position: fixed; top: 20px; right: 20px; padding: 10px 20px; cursor: pointer;">🖨️ Cetak</button>

    <div class="header">
        <h1>KARTU KENDALI BIMBINGAN AKADEMIK</h1>
        <h2>Fakultas Teknologi Informasi</h2>
    </div>

    <table class="biodata">
        <tr>
            <td width="150"><strong>Nama Mahasiswa</strong></td>
            <td>: {{ $user->name }}</td>
        </tr>
        <tr>
            <td><strong>NIM</strong></td>
            <td>: {{ $user->identity_number }}</td>
        </tr>
        <tr>
            <td><strong>Program Studi</strong></td>
            <td>: {{ $user->prodi }}</td>
        </tr>
    </table>

    <table class="log">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="40%">Materi / Topik Konsultasi</th>
                <th width="20%">Dosen Pembimbing</th>
                <th width="20%">Paraf</th>
            </tr>
        </thead>
        <tbody>
            @forelse($consultations as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="text-align: center;">{{ $item->consultation_date->format('d/m/Y') }}</td>
                <td>
                    <strong>{{ $item->topic }}</strong><br>
                    <span style="font-size: 10px; color: #555;">{{ Str::limit($item->description, 100) }}</span>
                </td>
                <td>{{ $item->lecturer->name }}</td>
                <td style="text-align: center;">
                    <span style="font-size: 10px; color: green;">[Validasi Sistem]</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">Belum ada riwayat bimbingan yang selesai.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="sign-box">
            <p>Mengetahui,<br>Ketua Program Studi</p>
            <div class="sign-space"></div>
            <p>( ..................................... )</p>
        </div>
    </div>

</body>
</html>

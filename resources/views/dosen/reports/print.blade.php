<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kinerja Dosen</title>
    <style>
        body { font-family: 'Times New Roman', serif; color: #000; padding: 40px; }
        .header { text-align: center; margin-bottom: 40px; border-bottom: 3px double #000; padding-bottom: 20px; }
        .header h1 { margin: 0; font-size: 24px; text-transform: uppercase; }
        .header p { margin: 5px 0; font-size: 14px; }

        .meta { margin-bottom: 30px; }
        .meta table { width: 100%; }
        .meta td { padding: 5px; }

        .content table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .content th, .content td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 12px; }
        .content th { background-color: #f0f0f0; }

        .footer { margin-top: 50px; text-align: right; }
        .signature { margin-top: 80px; font-weight: bold; text-decoration: underline; }

        @media print {
            @page { margin: 2cm; }
            body { padding: 0; }
            button { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <button onclick="window.print()" style="position: fixed; top: 20px; right: 20px; padding: 10px 20px; background: #000; color: #fff; cursor: pointer; border: none;">🖨️ Cetak PDF</button>

    <div class="header">
        <h1>Laporan Kinerja Pembimbing Akademik</h1>
        <p>Universitas Teknologi Digital Indonesia</p>
        <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
    </div>

    <div class="meta">
        <table>
            <tr>
                <td width="150"><strong>Nama Dosen</strong></td>
                <td>: {{ $lecturer->name }}</td>
            </tr>
            <tr>
                <td><strong>NIP / NIDN</strong></td>
                <td>: {{ $lecturer->identity_number }}</td>
            </tr>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td>: {{ $lecturer->prodi }}</td>
            </tr>
        </table>
    </div>

    <div class="content">
        <h3>Rekapitulasi Bimbingan Selesai</h3>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Tanggal</th>
                    <th width="25%">Nama Mahasiswa</th>
                    <th width="15%">NIM</th>
                    <th width="30%">Topik Bimbingan</th>
                    <th width="10%">Metode</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultations as $index => $item)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $item->consultation_date->format('d/m/Y') }}</td>
                    <td>{{ $item->student->name }}</td>
                    <td>{{ $item->student->identity_number }}</td>
                    <td>{{ $item->topic }}</td>
                    <td>{{ ucfirst($item->mode) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data bimbingan pada periode ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y') }}</p>
        <br>
        <p>Dosen Pembimbing,</p>
        <div class="signature">{{ $lecturer->name }}</div>
        <div>NIP. {{ $lecturer->identity_number }}</div>
    </div>

</body>
</html>

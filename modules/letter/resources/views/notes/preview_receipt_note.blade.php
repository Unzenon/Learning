<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tanda Terima Nota</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
        }

        body {
            background: #eee;
            padding: 30px;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .page {
            background: white;
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 20mm;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 100px;
        }

        .title {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            margin: 20px 0;
        }

        .info {
            margin-bottom: 10px;
            font-size: 12pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12pt;
        }

        th {
            background: #f0f0f0;
            text-align: center;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            font-size: 12pt;
        }

        .signature {
            width: 40%;
            text-align: center;
        }

        .note-box {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 30px;
            font-style: italic;
            background: #f8f8f8;
        }

        @media print {
            body {
                background: none;
                padding: 0;
                margin: 0;
            }

            .page {
                box-shadow: none;
                margin: 0;
                width: auto;
                min-height: auto;
                padding: 0;
            }

            .note-box {
                background: none;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <img src="{{ public_path('logo.png') }}" alt="Logo Perusahaan">
            <div style="text-align: right; font-size: 12pt;">
                <strong>No. Tanda Terima - {{ $note->id }}</strong>
            </div>
        </div>

        <div class="title">TANDA TERIMA NOTA</div>

        <div class="info">
            <p><strong>Hari:</strong> {{ $note->day }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($note->date)->translatedFormat('d F Y') }}</p>
            <p><strong>Dari:</strong> {{ $note->from }}</p>
            <p><strong>Kepada:</strong> <strong>{{ $note->to }}</strong></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL INVOICE</th>
                    <th>NO. INVOICE</th>
                    <th>KETERANGAN</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($note->entries as $index => $entry)
                    @php $total += $entry->amount; @endphp
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($entry->invoice_date)->translatedFormat('d F Y') }}</td>
                        <td>{{ $entry->invoice_number }}</td>
                        <td>{{ $entry->description }}</td>
                        <td style="text-align: right;">Rp {{ number_format($entry->amount, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                    <td style="text-align: right;"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <div class="signature">
                <p>Yang menerima</p>
                <br><br><br>
                _____________________
            </div>
            <div class="signature">
                <p>Yang memberikan</p>
                <br><br><br>
                _____________________
            </div>
        </div>

        @if ($note->notes)
            <div class="note-box">
                <strong>Catatan:</strong><br>
                {{ strtoupper($note->notes) }}
            </div>
        @endif
    </div>
</body>
</html>

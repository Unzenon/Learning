<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Preview Kwitansi</title>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 2cm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            width: 21cm;
            margin: 0 auto;
            padding: 2cm;
            background: #fff;
        }

        .kwitansi-box {
            border: 1px solid #000;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .section {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
            width: 25%;
            display: inline-block;
        }

        .value {
            display: inline-block;
            width: 70%;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature p {
            margin-bottom: 60px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="kwitansi-box">
        <div class="header">
            <h2>KWITANSI</h2>
            <p>No: {{ $receipt->id }}</p>
        </div>

        <div class="section">
            <span class="label">Sudah terima dari</span>
            <span class="value">{{ $receipt->received_from }}</span>
        </div>

        <div class="section">
            <span class="label">Uang Sebesar</span>
            <span class="value"><strong>Rp {{ number_format($receipt->amount, 0, ',', '.') }}</strong></span>
        </div>

        <div class="section">
            <span class="label">Untuk pembayaran</span>
            <span class="value">{{ $receipt->payment_for }}</span>
        </div>

        <div class="section">
            <span class="label">Tanggal</span>
            <span class="value">{{ \Carbon\Carbon::parse($receipt->date)->format('d F Y') }}</span>
        </div>

        <div class="signature">
            <p>{{ \Carbon\Carbon::parse($receipt->date)->format('d F Y') }}</p>
            <p>{{ $receipt->createdBy?->name ?? '........................' }}</p>
        </div>
    </div>

    <div class="footer">
        Dicetak oleh sistem — {{ config('app.name') }}
    </div>
</body>
</html>

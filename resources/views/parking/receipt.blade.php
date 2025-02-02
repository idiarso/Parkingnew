<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Parkir</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 10px;
        }
        .receipt {
            width: 80mm;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            max-width: 50px;
            margin-bottom: 5px;
        }
        .title {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
        }
        .info {
            margin: 5px 0;
        }
        .divider {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 10px;
        }
        .qr-code {
            text-align: center;
            margin: 10px 0;
        }
        .qr-code img {
            max-width: 100px;
        }
        @media print {
            @page {
                margin: 0;
                size: 80mm 150mm;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <div class="title">PARKIR RSI</div>
            <div>Jl. Example No. 123</div>
            <div>Telp: (031) 1234567</div>
        </div>

        <div class="divider"></div>

        <div class="info">
            <table style="width: 100%">
                <tr>
                    <td>No. Tiket</td>
                    <td>: {{ $parking->ticket_number }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $parking->waktu_masuk->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Jam Masuk</td>
                    <td>: {{ $parking->waktu_masuk->format('H:i') }}</td>
                </tr>
                <tr>
                    <td>Jam Keluar</td>
                    <td>: {{ $parking->waktu_keluar->format('H:i') }}</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>: {{ $parking->durasi }}</td>
                </tr>
                <tr>
                    <td>No. Plat</td>
                    <td>: {{ $parking->nomor_plat }}</td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>: {{ ucfirst($parking->jenis_kendaraan) }}</td>
                </tr>
                <tr>
                    <td>Biaya</td>
                    <td>: Rp {{ number_format($parking->biaya, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>

        <div class="divider"></div>

        <div class="qr-code">
            {!! QrCode::size(100)->generate($parking->ticket_number) !!}
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan parkir kami</p>
            <p>Simpan struk ini sebagai bukti parkir yang sah</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.close();
            }, 500);
        }
    </script>
</body>
</html>
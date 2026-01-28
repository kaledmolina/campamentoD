<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ticket Campamento</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
            font-family: 'Helvetica', sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .ticket {
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iZyIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzEwMTAxMCIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzIwMjAyMCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZykiLz48L3N2Zz4=');
            position: relative;
        }

        .border-gold {
            border: 2px solid #D4AF37;
            margin: 20px;
            height: 95%;
            position: relative;
            background: rgba(0, 0, 0, 0.5);
        }

        .header {
            text-align: center;
            padding-top: 40px;
            border-bottom: 1px solid #D4AF37;
            padding-bottom: 20px;
            margin: 0 40px;
        }

        .header h1 {
            font-size: 40px;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin: 0;
            color: #D4AF37;
            text-shadow: 2px 2px 4px #000;
        }

        .header h2 {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 8px;
            margin: 10px 0 0 0;
            color: #fff;
        }

        .content {
            padding: 40px;
            text-align: center;
        }

        .camper-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: #fff;
        }

        .camper-doc {
            font-size: 18px;
            color: #aaa;
            margin-bottom: 40px;
            letter-spacing: 2px;
        }

        .info-grid {
            width: 80%;
            margin: 0 auto;
            border-top: 1px dashed #555;
            border-bottom: 1px dashed #555;
            padding: 20px 0;
        }

        .info-item {
            display: inline-block;
            width: 45%;
            margin-bottom: 15px;
            text-align: left;
        }

        .label {
            font-size: 10px;
            color: #D4AF37;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 5px;
        }

        .value {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .qr-section {
            margin-top: 40px;
            text-align: center;
        }

        .qr-box {
            background: #fff;
            padding: 15px;
            display: inline-block;
            border-radius: 10px;
        }

        .status-badge {
            background-color: #D4AF37;
            color: #000;
            padding: 10px 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            margin-top: 20px;
            transform: rotate(-2deg);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
        }

        .footer {
            position: absolute;
            bottom: 30px;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 100px;
            color: rgba(255, 255, 255, 0.03);
            font-weight: bold;
            z-index: 0;
            pointer-events: none;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="watermark">CAMP 2026</div>
        <div class="border-gold">
            <div class="header">
                <h2>Ticket de Acceso</h2>
                <h1>INVESTI2</h1>
                <h2>Campamento Distrital</h2>
            </div>

            <div class="content">
                <div class="camper-name">{{ $user->name }} {{ $user->last_name }}</div>
                <div class="camper-doc">{{ $user->document_type }} {{ $user->document_number }}</div>

                <div class="info-grid">
                    <div class="info-item">
                        <span class="label">Zona</span>
                        <span class="value">{{ $user->zone }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Congregación</span>
                        <span class="value">{{ $user->congregacion }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">Fecha Emisión</span>
                        <span class="value">{{ now()->format('d M Y') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="label">ID Único</span>
                        <span class="value">#{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>

                <div class="qr-section">
                    <div class="qr-box">
                        <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" width="180">
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <span class="status-badge">ACCESO AUTORIZADO</span>
                </div>
            </div>

            <div class="footer">
                Conquistadores Pentecostales - Distrito 27 - IPUC<br>
                Presenta este código QR en la entrada
            </div>
        </div>
    </div>
</body>

</html>
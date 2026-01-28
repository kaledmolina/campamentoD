<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ticket Campamento</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .header {
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .header h1 {
            color: #4f46e5;
            margin: 0;
        }

        .details {
            margin-top: 20px;
            text-align: left;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .details table {
            width: 100%;
        }

        .details td {
            padding: 8px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            color: #666;
        }

        .qr-code {
            margin-top: 30px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #888;
        }

        .status-paid {
            color: green;
            font-weight: bold;
            border: 1px solid green;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>TICKET DE INGRESO</h1>
            <p>Campamento Distrital 2026</p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <td width="30%">
                        <!-- If you have user photos, you can put an img tag here -->
                        <div style="width: 100px; height: 100px; background: #eee; border-radius: 50%; margin: 0 auto;">
                        </div>
                    </td>
                    <td width="70%">
                        <h2>{{ $user->name }} {{ $user->last_name }}</h2>
                        <p><span class="label">Documento:</span> {{ $user->document_type }} {{ $user->document_number }}
                        </p>
                        <p><span class="label">Zona:</span> {{ $user->zone }}</p>
                        <p><span class="label">Congregación:</span> {{ $user->congregacion }}</p>
                        <p><span class="label">Estado:</span> <span class="status-paid">PAGADO</span></p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="qr-code">
            <p>Presenta este código QR al ingreso</p>
            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" width="200">
        </div>

        <div class="footer">
            <p>Este ticket es personal e intransferible.</p>
            <p>Generado el: {{ now()->format('d/m/Y H:i A') }}</p>
        </div>
    </div>
</body>

</html>
<x-layouts.app>
    <div class="h-screen flex flex-col items-center justify-center p-4">
        <div
            class="max-w-md w-full bg-black/80 backdrop-blur-md border border-gold-500/30 rounded-lg p-6 shadow-[0_0_30px_rgba(212,175,55,0.2)] text-center relative">
            <h1 class="text-2xl font-bold text-gold-500 mb-4 cinzel">Escaner de Tickets</h1>

            <div id="reader" class="w-full bg-black border border-gray-700 rounded-lg overflow-hidden mb-4"></div>

            <div id="result" class="text-gray-300 text-sm hidden">
                Redirigiendo...
            </div>

            <p class="text-xs text-gray-500 mt-4">
                Apunta la cámara al código QR del ticket.
            </p>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            if (decodedText.startsWith('http')) {
                window.location.href = decodedText;
                document.getElementById('result').classList.remove('hidden');
                html5QrcodeScanner.clear();
            } else {
                alert("QR no válido: " + decodedText);
            }
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: { width: 250, height: 250 } },
            /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</x-layouts.app>
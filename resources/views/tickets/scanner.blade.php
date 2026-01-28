<x-layouts.app>
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="max-w-md w-full bg-black/80 backdrop-blur-md border border-gold-500/30 rounded-lg p-6 shadow-[0_0_30px_rgba(212,175,55,0.2)] text-center relative">
            <h1 class="text-2xl font-bold text-gold-500 mb-4 cinzel">Escaner de Tickets</h1>
            
            <!-- Instructions and Status -->
            <div id="status-message" class="text-white mb-4 text-sm bg-blue-900/40 p-3 rounded-lg border border-blue-500/50">
                <i class="fas fa-info-circle mr-2"></i> Por favor permite el acceso a la cámara.
            </div>

            <div class="relative w-full aspect-square bg-black border border-gray-700 rounded-lg overflow-hidden mb-4">
                <div id="reader" class="w-full h-full"></div>
                <!-- Overlay for targeting -->
                <div class="absolute inset-0 border-2 border-gold-500/50 pointer-events-none rounded-lg z-10">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48 border-2 border-gold-500 rounded-lg box-border shadow-[0_0_0_9999px_rgba(0,0,0,0.5)]"></div>
                </div>
            </div>
            
            <div id="result" class="text-green-400 font-bold hidden mb-4 bg-green-900/30 p-3 rounded border border-green-500">
                <i class="fas fa-spinner fa-spin mr-2"></i> Procesando ticket...
            </div>

            <button id="start-button" class="w-full bg-gold-500 hover:bg-gold-400 text-black font-bold py-3 px-4 rounded-lg shadow-lg mb-2 hidden">
                <i class="fas fa-camera mr-2"></i> Activar Cámara
            </button>
            <button id="switch-camera" class="w-full bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg shadow-lg hidden">
                <i class="fas fa-sync mr-2"></i> Cambiar Cámara
            </button>

            <p class="text-xs text-gray-500 mt-4">
                Asegúrate de tener buena iluminación apuntando al código QR.
            </p>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        const statusMsg = document.getElementById('status-message');
        const startBtn = document.getElementById('start-button');
        const switchBtn = document.getElementById('switch-camera');
        const resultDiv = document.getElementById('result');
        let html5QrCode;
        let currentCameraId = null;
        let cameras = [];

        function showStatus(msg, type = 'info') {
            statusMsg.innerHTML = msg;
            statusMsg.className = `text-white mb-4 text-sm p-3 rounded-lg border ${
                type === 'error' ? 'bg-red-900/40 border-red-500/50' : 
                type === 'success' ? 'bg-green-900/40 border-green-500/50' : 
                'bg-blue-900/40 border-blue-500/50'
            }`;
            statusMsg.classList.remove('hidden');
        }

        async function startScanner() {
            try {
                // Check if browser supports media devices
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    showStatus('<i class="fas fa-exclamation-triangle"></i> Tu navegador no soporta acceso a cámaras.', 'error');
                    return;
                }

                html5QrCode = new Html5Qrcode("reader");

                // Get cameras
                cameras = await Html5Qrcode.getCameras();
                
                if (cameras && cameras.length) {
                    // Try to pick the back camera
                    currentCameraId = cameras[cameras.length - 1].id; 
                    startCamera(currentCameraId);
                } else {
                    showStatus('<i class="fas fa-video-slash"></i> No se encontraron cámaras.', 'error');
                }
            } catch (err) {
                console.error(err);
                showStatus('<i class="fas fa-lock"></i> Permiso de cámara denegado. Por favor permítelo en tu navegador.', 'error');
                startBtn.classList.remove('hidden');
                startBtn.onclick = () => {
                   // Reload page to try asking again as simple JS restart might not trigger prompt again in some mobile browsers
                   window.location.reload();
                };
            }
        }

        function startCamera(cameraId) {
            html5QrCode.start(
                cameraId, 
                {
                    fps: 10,
                    qrbox: { width: 250, height: 250 },
                    aspectRatio: 1.0
                },
                (decodedText, decodedResult) => {
                    // Success
                    onScanSuccess(decodedText);
                },
                (errorMessage) => {
                    // Scanning... usually ignore
                }
            ).then(() => {
                showStatus('<i class="fas fa-check"></i> Escáner activo.', 'success');
                startBtn.classList.add('hidden');
                if(cameras.length > 1) {
                    switchBtn.classList.remove('hidden');
                }
            }).catch(err => {
                showStatus('<i class="fas fa-exclamation-circle"></i> Error al iniciar cámara: ' + err, 'error');
                startBtn.classList.remove('hidden');
            });
        }

        function onScanSuccess(decodedText) {
            // Stop scanning
            html5QrCode.stop().then(() => {
                resultDiv.classList.remove('hidden');
                if (decodedText.startsWith('http')) {
                    window.location.href = decodedText;
                } else {
                    alert("QR inválido: " + decodedText);
                    window.location.reload();
                }
            }).catch(err => {
                console.error("Failed to stop", err);
            });
        }

        switchBtn.addEventListener('click', () => {
            if(cameras.length > 1) {
                // Find current index
                let currentIndex = cameras.findIndex(c => c.id === currentCameraId);
                // Next index
                let nextIndex = (currentIndex + 1) % cameras.length;
                currentCameraId = cameras[nextIndex].id;
                
                html5QrCode.stop().then(() => {
                    startCamera(currentCameraId);
                });
            }
        });

        // Start automatically on load
        document.addEventListener('DOMContentLoaded', startScanner);
    </script>
</x-layouts.app>
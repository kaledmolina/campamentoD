<x-layouts.app>
    <div
        class="min-h-screen flex flex-col items-center justify-center p-4 bg-gradient-to-b from-[#422006] to-[#1a0b03]">
        <div
            class="max-w-md w-full bg-black/40 backdrop-blur-xl border border-gold-500/30 rounded-2xl p-6 shadow-[0_0_40px_rgba(212,175,55,0.15)] text-center relative">
            <h1
                class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600 mb-6 cinzel">
                Escaner de Tickets</h1>

            <!-- Instructions and Status -->
            <div id="status-message"
                class="text-white mb-6 text-sm bg-blue-900/40 p-3 rounded-lg border border-blue-500/50">
                <i class="fas fa-info-circle mr-2"></i> Por favor permite el acceso a la cámara.
            </div>

            <div
                class="relative w-full aspect-square bg-black/50 border-2 border-gold-500/20 rounded-xl overflow-hidden mb-6 shadow-inner">
                <div id="reader" class="w-full h-full"></div>
                <!-- Overlay for targeting -->
                <div class="absolute inset-0 pointer-events-none rounded-xl z-10 flex items-center justify-center">
                    <div
                        class="w-64 h-64 border-2 border-gold-500 rounded-lg relative shadow-[0_0_0_9999px_rgba(0,0,0,0.7)]">
                        <!-- Corner Accents -->
                        <div
                            class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-gold-400 rounded-tl-sm">
                        </div>
                        <div
                            class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-gold-400 rounded-tr-sm">
                        </div>
                        <div
                            class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-gold-400 rounded-bl-sm">
                        </div>
                        <div
                            class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-gold-400 rounded-br-sm">
                        </div>

                        <!-- Scanning Line Animation -->
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-gold-400/80 shadow-[0_0_10px_rgba(251,191,36,0.8)] animate-scan">
                        </div>
                    </div>
                </div>
            </div>

            <div id="result"
                class="text-emerald-400 font-bold hidden mb-4 bg-emerald-900/30 p-3 rounded-lg border border-emerald-500/50">
                <i class="fas fa-spinner fa-spin mr-2"></i> Procesando ticket...
            </div>

            <button id="start-button"
                class="w-full bg-gradient-to-r from-gold-500 to-yellow-600 hover:from-gold-400 hover:to-yellow-500 text-black font-extrabold py-4 px-6 rounded-xl shadow-lg mb-3 hidden transition-transform transform hover:scale-[1.02]">
                <i class="fas fa-camera mr-2"></i> ACTIVAR CÁMARA
            </button>
            <button id="switch-camera"
                class="w-full bg-white/10 hover:bg-white/20 text-white font-bold py-3 px-4 rounded-xl shadow-lg hidden border border-white/10 transition-colors">
                <i class="fas fa-sync mr-2"></i> Cambiar Cámara
            </button>

            <p class="text-[10px] text-gray-500 mt-6 uppercase tracking-widest font-medium">
                Apunta al código QR del ticket
            </p>
        </div>
    </div>

    <style>
        @keyframes scan {
            0% {
                top: 0%;
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                top: 100%;
                opacity: 0;
            }
        }

        .animate-scan {
            animation: scan 2s linear infinite;
        }
    </style>

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
            statusMsg.className = `text-white mb-4 text-sm p-3 rounded-lg border ${type === 'error' ? 'bg-red-900/40 border-red-500/50' :
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
                if (cameras.length > 1) {
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
            if (cameras.length > 1) {
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
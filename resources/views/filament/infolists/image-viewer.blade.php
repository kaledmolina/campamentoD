@php
    $imageUrl = \Illuminate\Support\Facades\Storage::disk('public')->url($infoList->getRecord()->proof_path);
@endphp

<div x-data="{ 
    open: false, 
    scale: 1,
    imageUrl: '{{ $imageUrl }}',
    
    zoomIn() {
        this.scale = this.scale + 0.5;
    },
    
    zoomOut() {
        this.scale = Math.max(0.5, this.scale - 0.5);
    },
    
    reset() {
        this.scale = 1;
        this.open = false;
    }
}">
    <!-- Thumbnail Preview -->
    <div class="rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 cursor-pointer group relative shadow-sm hover:shadow-md transition-all duration-300"
        style="width: 200px; height: 150px;" @click="open = true">
        <img :src="imageUrl" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
            alt="Comprobante">

        <div
            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
            </svg>
        </div>
    </div>

    <!-- Modal Lightbox -->
    <div x-show="open" style="display: none;"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-md"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @keydown.escape.window="reset()">

        <!-- Toolbar -->
        <div class="absolute top-4 right-4 flex items-center gap-3 z-[101]">
            <!-- Download -->
            <a :href="imageUrl" download
                class="p-3 bg-white/10 hover:bg-white/20 text-white rounded-full transition backdrop-blur-sm group"
                title="Descargar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M12 12.75l-3-3m3 3l3-3m-3 3V3" />
                </svg>
            </a>

            <!-- Divider -->
            <div class="h-6 w-px bg-white/20"></div>

            <!-- Zoom In -->
            <button @click="zoomIn()"
                class="p-3 bg-white/10 hover:bg-white/20 text-white rounded-full transition backdrop-blur-sm"
                title="Zoom In">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>

            <!-- Zoom Out -->
            <button @click="zoomOut()"
                class="p-3 bg-white/10 hover:bg-white/20 text-white rounded-full transition backdrop-blur-sm"
                title="Zoom Out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
            </button>

            <!-- Close -->
            <button @click="reset()"
                class="ml-4 p-3 bg-red-600 hover:bg-red-700 text-white rounded-full transition shadow-lg hover:shadow-red-600/50"
                title="Cerrar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Image Container -->
        <div class="h-full w-full flex items-center justify-center p-8 overflow-hidden" @click.self="reset()">
            <div class="relative transition-transform duration-200 ease-out" :style="`transform: scale(${scale})`"
                @click.stop>
                <!-- Stop prop to allow dragging if we added it, but here it prevents close on image click -->
                <img :src="imageUrl" class="max-w-full max-h-[90vh] object-contain rounded shadow-2xl"
                    alt="Comprobante Full">
            </div>
        </div>

        <!-- Zoom Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 px-4 py-2 bg-black/60 backdrop-blur text-white rounded-full text-sm font-mono pointer-events-none"
            x-show="scale !== 1" x-transition.opacity>
            <span x-text="`${Math.round(scale * 100)}%`"></span>
        </div>
    </div>
</div>
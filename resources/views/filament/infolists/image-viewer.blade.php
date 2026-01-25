@php
    $record = $getRecord();
    $imagePath = $record->proof_path ?? null;
    $imageUrl = (is_string($imagePath) && !empty($imagePath))
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($imagePath)
        : null;
@endphp

<div x-data="{ 
    open: false, 
    imageUrl: '{{ $imageUrl }}',
    
    reset() {
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
        <div class="absolute top-4 right-4 flex items-center gap-4 z-[101]">
            <!-- Download Button (High Visibility) -->
            <a :href="imageUrl" download
                class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg transition transform hover:scale-105"
                title="Descargar Original">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M12 12.75l-3-3m3 3l3-3m-3 3V3" />
                </svg>
                <span>Descargar</span>
            </a>

            <!-- Close Button -->
            <button @click="reset()"
                class="p-2 bg-gray-800 hover:bg-gray-700 text-white rounded-full transition shadow-lg border border-gray-600"
                title="Cerrar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Image Container -->
        <div class="h-full w-full flex items-center justify-center p-8 overflow-hidden" @click.self="reset()">
            <div class="relative max-h-full max-w-full flex items-center justify-center" @click.stop>
                <img :src="imageUrl" class="max-w-full max-h-[90vh] object-contain rounded shadow-2xl"
                    alt="Comprobante Full">
            </div>
        </div>
    </div>
</div>
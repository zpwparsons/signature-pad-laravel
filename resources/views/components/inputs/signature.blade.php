<div
    x-data="signature({
        signaturePadId: $id('signature'),
        state: null,
    })"
    x-on:resize.window="resizeCanvas"
    wire:ignore
    class="group"
>
    <div class="mt-8 relative">
        {{-- Actions --}}
        <div class="absolute hidden group-hover:block top-0 right-0">
            <button
                x-on:click.prevent="clear()"
                type="button"
                class="mt-2 mr-0.5 px-2 py-1 text-xs text-slate-500 ring-1 ring-slate-200 rounded-lg"
            >
                Clear
            </button>

            <button
                x-on:click.prevent="$refs.fileInput.click()"
                type="button"
                class="mt-2 mr-2 px-2 py-1 text-xs text-white bg-blue-600 rounded-lg"
            >
                Upload
            </button>
        </div>

        {{-- Hidden file upload input --}}
        <input
            {{ $attributes->wire('model') }}
            x-ref="fileInput"
            @change="uploadImage"
            type="file"
            class="hidden"
            accept="image/jpeg, image/png"
        >

        {{-- Signature --}}
        <canvas
            x-ref="canvas"
            x-intersect="resizeCanvas"
            class="w-full h-full border border-gray-300 border-dashed rounded-lg"
        ></canvas>
    </div>
</div>

<div class="relative flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full max-w-[48rem] flex-row">

    <div class="p-6">
        <div
            class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
            {{ $localizacion }}
        </div>
        <h4
            class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
            {{ $descripcion }}
        </h4>
        <div
            class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none bg-clip-border rounded-xl shrink-0">
            <img src="{{ $imagen }}">
        </div>


    </div>
</div>
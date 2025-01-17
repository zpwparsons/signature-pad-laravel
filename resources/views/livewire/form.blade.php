<form wire:submit.prevent="save" method="post" class="grid place-items-center h-screen">
    <div class="max-w-2xl mx-auto">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm/6 font-medium text-gray-900">
                    First name
                </label>

                <div class="mt-2">
                    <input
                        wire:model="first_name"
                        type="text"
                        name="first-name"
                        id="first-name"
                        autocomplete="given-name"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6"
                    >
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm/6 font-medium text-gray-900">
                    Last name
                </label>

                <div class="mt-2">
                    <input
                        wire:model="last_name"
                        type="text"
                        name="last-name"
                        id="last-name"
                        autocomplete="family-name"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6"
                    >
                </div>
            </div>
        </div>

        <x-inputs.signature wire:model="signature" />

        <div class="mt-8 flex justify-end">
            <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Submit
            </button>
        </div>
    </div>
</form>

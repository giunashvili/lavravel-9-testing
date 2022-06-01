<div class="hidden left-0 top-0 w-full h-full fixed bg-backdrop" id="add-company-modal">
    <div class="w-1/2 h-1/2 bg-white fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md">
        <h5 class="font-bold text-center mt-4">Add Comapny</h5>

        <form class="flex flex-col px-10">
            @csrf
            <input class="my-3" type="text" name="title" placeholder="Company Title" required />
            <input class="my-3" type="file" name="logo" placeholder="Company Logo" required />
            <input class="my-3" type="text" name="address" placeholder="Company Address" required />
            <input class="my-3" type="date" name="founding-date" placeholder="Founding Date" required />
            <button class="border border-blue-900 w-24 self-center bg-blue-900 text-white rounded h-10">Create</button>
        </form>
    </div>

</div>

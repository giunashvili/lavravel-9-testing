<div class="@if(!$errors->any()) hidden @endif left-0 top-0 w-full h-full fixed bg-backdrop" id="add-company-modal">
    <div class="w-1/2 h-1/2 bg-white fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-md">
        <h5 class="font-bold text-center mt-4">Add Comapny</h5>

        <form class="flex flex-col px-10 items-center" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="relative">
                <input class="my-3 w-80" type="text" name="title" value="{{ old('title') }}" placeholder="Company Title" />
                @error('title')
                <span class="text-xs text-red-600 absolute top-14 left-0">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mt-4">
                <input class="my-3" type="file" name="logo" placeholder="Company Logo" />

                @error('logo')
                <span class="text-xs text-red-600 absolute top-14 left-0">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mt-4">
                <input class="my-3 w-80" type="text" name="address" value="{{ old('address') }}" placeholder="Company Address" />
                @error('address')
                <span class="text-xs text-red-600 absolute top-14 left-0">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative mt-4">
                <input class="my-3 w-80" type="date" name="founded_at" value="{{ old('founded_at') }}" placeholder="Founding Date" />

                @error('founded_at')
                <span class="text-xs text-red-600 absolute top-14 left-0">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="border border-blue-900 w-24 self-center bg-blue-900 text-white rounded h-10 mt-6">Create</button>
        </form>
    </div>

</div>

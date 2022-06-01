<x-base>
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between mx-auto my-6 items-center">
                <h2 class="text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Companies</h2>
                <button id="add-company-modal-btn" class="border border-blue-900 w-24 self-center bg-blue-900 text-white rounded h-10">Create</button>
            </div>
            <x-companies-wrapper>
                @foreach($companies as $company)
                    <x-company-item
                        :name="$company->title"
                        :logo="$company->logo"
                        :foundingDate="$company->founded_at"
                        :address="$company->address">
                    </x-company-item>
                @endforeach
            </x-companies-wrapper>
            <x-add-company-modal></x-add-company-modal>
        </div>
    </div>

    <x-slot:script>
        <script>
           const createCompanyModal = document.querySelector('#add-company-modal');
           const createCompanyModalButton = document.querySelector('#add-company-modal-btn');

           createCompanyModalButton.addEventListener('click', function() {
               createCompanyModal.classList.remove('hidden');
           });

           createCompanyModal.addEventListener('click', function(e) {
               if(e.target === createCompanyModal) {
                   createCompanyModal.classList.add('hidden');
               }
           });
        </script>
    </x-slot:script>
</x-base>

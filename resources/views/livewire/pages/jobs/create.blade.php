<div class="container mx-auto py-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Create New Job Posting</h1>
    </div>

    <div class="flex mt-4">
        <!-- Left Section: Job Details -->
        <div class="w-1/2 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Job Details</h2>

            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" wire:model="title" class="w-full border rounded p-2" placeholder="Job posting title">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea wire:model="description" class="w-full border rounded p-2" placeholder="Job posting Description"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Experience</label>
                    <input type="text" wire:model="experience" class="w-full border rounded p-2" placeholder="Eg. 1-3 Yrs">
                    @error('experience') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Salary</label>
                    <input type="text" wire:model="salary" class="w-full border rounded p-2" placeholder="Eg. 2.75-5 Lacs PA">
                    @error('salary') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Location</label>
                    <input type="text" wire:model="location" class="w-full border rounded p-2" placeholder="Eg. Remote/Pune">
                    @error('location') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Extra Info</label>
                    <input type="text" wire:model="extra_info" class="w-full border rounded p-2" placeholder="Eg. Full Time, Urgent / Part Time, Flexible">
                    <p class="text-xs text-gray-400 mt-1">Please use comma separated values</p>
                </div>
            </div>
        </div>

        <!-- Right Section: Company Details -->
        <div class="w-1/2 bg-white shadow-md rounded-lg p-6 ml-6">
            <h2 class="text-lg font-semibold mb-4">Company Details</h2>

            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" wire:model="company_name" class="w-full border rounded p-2" placeholder="Company Name">
                @error('company_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Logo</label>
                <input type="file" wire:model="company_logo" class="w-full border rounded p-2">
                @error('company_logo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Skills</label>
                <select wire:model="selectedSkills" multiple class="w-full border rounded p-2">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('selectedSkills') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button wire:click="saveJob" class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>
    </div>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600">{{ session('message') }}</div>
    @endif
</div>

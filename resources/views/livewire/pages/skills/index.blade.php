<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        <div class="flex">
                <div class="w-1/2">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Name</th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill)
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{ $skill->name }} </th>
                                            <td class="px-4 py-3 flex items-center justify-end">
                                                <button wire:click="editSkill({{ $skill->id }})" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-blue-500">
                                                    Edit
                                                </button>
                                                <button wire:click="deleteSkill({{ $skill->id }})" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 px-10">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-4">
                            {{ $editingMode ? 'Edit Skill' : 'Add New Skill' }}
                        </h2>
                        <input type="text" wire:model="name" class="p-2 border rounded w-full" placeholder="Skill Name">
                        
                        @if ($editingMode)
                            <button wire:click="updateSkill" class="bg-green-600 text-white px-4 py-2 rounded mt-2">
                                Update
                            </button>
                            <button wire:click="resetInput" class="bg-gray-500 text-white px-4 py-2 rounded mt-2">
                                Cancel
                            </button>
                        @else
                            <button wire:click="addSkill" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">
                                Save
                            </button>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>

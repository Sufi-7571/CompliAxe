<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Project</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('projects.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
                @csrf
                <div>
                    <label class="block font-medium text-gray-700">Project Name</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2 mt-1" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Project URL</label>
                    <input type="url" name="url" class="w-full border rounded px-3 py-2 mt-1" required>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Project</button>
            </form>
        </div>
    </div>
</x-app-layout>

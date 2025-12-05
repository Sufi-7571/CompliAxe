<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <p class="text-gray-600 mb-4">{{ $project->url }}</p>
            <p>Scans and reports will appear here in the next steps.</p>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Your Projects</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('projects.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Project</a>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($projects as $project)
                    <div class="p-4 border rounded shadow">
                        <h2 class="text-xl font-semibold">{{ $project->name }}</h2>
                        <p class="text-gray-600">{{ $project->url }}</p>
                        <a href="{{ route('projects.show', $project) }}" class="text-blue-500 mt-2 inline-block">View
                            Details</a>
                    </div>
                @empty
                    <p>No projects found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

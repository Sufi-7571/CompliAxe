<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <p class="text-gray-600 mb-4">{{ $project->url }}</p>

            <form action="{{ route('projects.scan.store', $project) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Run Scan</button>
            </form>

            <h3 class="text-xl font-semibold mt-6 mb-2">Scans</h3>

            @if ($project->scans->count())
                <ul class="space-y-2">
                    @foreach ($project->scans as $scan)
                        <li class="p-4 border rounded flex justify-between items-center">
                            <span>Scan #{{ $scan->id }} - Status:
                                <strong>{{ ucfirst($scan->status) }}</strong></span>
                            <span>{{ $scan->created_at->format('d M Y H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No scans yet.</p>
            @endif


            <p class="mt-4">Scans and reports will appear here in the next steps.</p>
        </div>
    </div>
</x-app-layout>

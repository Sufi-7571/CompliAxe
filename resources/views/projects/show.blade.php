<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <p class="text-gray-600 mb-4">{{ $project->url }}</p>

            <!-- Run Scan Button -->
            <form action="{{ route('projects.scan.store', $project) }}" method="POST" class="mb-6">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Run Scan</button>
            </form>

            <h3 class="text-xl font-semibold mb-2">Scans</h3>

            @if ($project->scans->count())
                <ul class="space-y-4">
                    @foreach ($project->scans as $scan)
                        <li class="p-4 border rounded flex flex-col gap-3">
                            <div class="flex justify-between items-center">
                                <span>Scan #{{ $scan->id }} - Status:
                                    <strong>{{ ucfirst($scan->status) }}</strong></span>
                                <span>{{ $scan->created_at->format('d M Y H:i') }}</span>
                            </div>

                            <!-- Issue Creation Form -->
                            <form action="{{ route('scans.issues.store', $scan) }}" method="POST"
                                class="space-y-2 bg-gray-50 p-2 rounded">
                                @csrf
                                <div class="flex gap-2">
                                    <input type="text" name="type" placeholder="Issue Type"
                                        class="border rounded px-2 py-1 flex-1" required>
                                    <select name="severity" class="border rounded px-2 py-1" required>
                                        <option value="low">Low</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                                <div>
                                    <textarea name="description" placeholder="Description" class="border rounded w-full px-2 py-1" required></textarea>
                                </div>
                                <div>
                                    <input type="text" name="selector" placeholder="CSS Selector (optional)"
                                        class="border rounded px-2 py-1 w-full">
                                </div>
                                <div>
                                    <textarea name="fix_suggestion" placeholder="Fix Suggestion (optional)" class="border rounded w-full px-2 py-1"></textarea>
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Add
                                    Issue</button>
                            </form>

                            <!-- Existing Issues -->
                            @if ($scan->issues->count())
                                <ul class="mt-2 space-y-1">
                                    @foreach ($scan->issues as $issue)
                                        <li class="p-2 border rounded">
                                            <strong>{{ $issue->type }}</strong> ({{ ucfirst($issue->severity) }}):
                                            {{ $issue->description }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No scans yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>

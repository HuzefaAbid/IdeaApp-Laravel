<x-layout heading="Ideas">
    <!-- Header Section with Filter and Action Button -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Filter:</span>
            <a href="/ideas" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ !request('state') ? 'bg-indigo-600 text-white' : 'bg-slate-800 hover:bg-slate-700 text-slate-300' }} transition">All</a>
            <a href="/ideas?state=pending" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request('state') === 'pending' ? 'bg-amber-500 text-slate-950' : 'bg-slate-800 hover:bg-slate-700 text-amber-400' }} transition">Pending</a>
        </div>

        <a href="{{ route('ideas.create') }}" class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Idea
        </a>
    </div>

    @if (count($ideas))
        <div class="grid gap-3">
            @foreach ($ideas as $idea)
                <div class="bg-slate-800/40 hover:bg-slate-800 border border-slate-700/50 hover:border-slate-600 rounded-xl p-4 transition flex items-center justify-between group shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-400/10 text-amber-400 border border-amber-400/20 capitalize">
                            {{ $idea->state ?? 'pending' }}
                        </span>
                        <a href="{{ route('ideas.show', $idea) }}" class="font-medium text-slate-200 group-hover:text-indigo-400 transition">
                            {{ $idea->description }}
                        </a>
                    </div>

                    <div class="flex items-center gap-2 opacity-80 group-hover:opacity-100 transition">
                        <a href="{{ route('ideas.show', $idea) }}" class="text-xs text-slate-400 hover:text-slate-200 px-2.5 py-1.5 rounded-md hover:bg-slate-700/60 transition">View</a>
                        @can('modify', $idea)
                            <a href="{{ route('ideas.edit', $idea) }}" class="text-xs text-indigo-400 hover:text-indigo-300 px-2.5 py-1.5 rounded-md hover:bg-indigo-500/10 transition">Edit</a>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 bg-slate-800/30 border border-slate-800/80 rounded-xl">
            <svg class="w-12 h-12 mx-auto text-slate-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
            <p class="text-slate-300 font-medium mb-1">No ideas posted yet.</p>
            <p class="text-slate-500 text-xs mb-4">Start by creating your first idea below.</p>
            <a href="{{ route('ideas.create') }}" class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold px-4 py-2 rounded-lg transition">
                Create First Idea
            </a>
        </div>
    @endif
</x-layout>

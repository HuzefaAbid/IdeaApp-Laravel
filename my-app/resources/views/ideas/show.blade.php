<x-layout heading="Idea Details">
    <div class="mb-6">
        <a href="/ideas" class="inline-flex items-center gap-1 text-sm font-medium text-slate-400 hover:text-indigo-400 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Ideas
        </a>
    </div>

    <div class="bg-slate-800/60 border border-slate-700/60 rounded-xl p-6 shadow-xl">
        <div class="flex items-center justify-between mb-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-400/10 text-amber-400 border border-amber-400/20 capitalize">
                {{ $idea->state ?? 'pending' }}
            </span>
            <span class="text-xs text-slate-500">ID: #{{ $idea->id }}</span>
        </div>

        <p class="text-lg text-slate-100 font-medium leading-relaxed mb-6">
            {{ $idea->description }}
        </p>

        @can('modify', $idea)
            <div class="border-t border-slate-700/60 pt-4 flex justify-end">
                <a href="{{ route('ideas.edit', $idea) }}"
                    class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Idea
                </a>
            </div>
        @endcan
    </div>
</x-layout>

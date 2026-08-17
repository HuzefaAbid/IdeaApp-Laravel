<x-layout heading="Edit Idea">
    <div class="mb-6">
        <a href="/ideas"
            class="inline-flex items-center gap-1 text-sm font-medium text-slate-400 hover:text-indigo-400 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Ideas
        </a>
    </div>

    <div class="bg-slate-800/60 border border-slate-700/60 rounded-xl p-6 shadow-xl">
        <form action="{{ route('ideas.update', $idea) }}" method="POST">
            @csrf
            @method('PATCH')

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-200 mb-2">Idea
                    Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-3 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none">{{ $idea->description }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-500 font-medium mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center justify-between border-t border-slate-700/60 pt-4">
                <button form="delete-idea-form" type="submit"
                    onclick="return confirm('Are you sure you want to delete this idea?')"
                    class="bg-rose-600/90 hover:bg-rose-600 text-white font-medium text-sm px-4 py-2 rounded-lg transition cursor-pointer">
                    Delete Idea
                </button>

                <div class="flex items-center gap-3">
                    <a href="/ideas"
                        class="text-sm font-medium text-slate-400 hover:text-slate-200 px-3 py-2 rounded-lg transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm px-5 py-2 rounded-lg shadow-md transition cursor-pointer">
                        Update Idea
                    </button>
                </div>
            </div>
        </form>

        <form id="delete-idea-form" action="{{ route('ideas.delete', $idea) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-layout>

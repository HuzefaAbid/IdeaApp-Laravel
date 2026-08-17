<x-layout title="Login - IdeaHub">
    <div class="flex justify-center items-center py-8">
        <form action="/login" method="POST" class="w-full max-w-sm">
            @csrf
            <fieldset class="fieldset bg-base-200 border border-slate-700/80 rounded-box p-6 shadow-2xl">
                <legend class="fieldset-legend text-lg font-bold text-indigo-400 px-2">Login</legend>

                <div class="space-y-4">
                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Email</label>
                        <input type="email" name="email"
                            class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500"
                            placeholder="john@example.com" required />
                        @error('email')
                            <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Password</label>
                        <input type="password" name="password"
                            class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500"
                            placeholder="••••••••" required />
                        @error('password')
                            <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="btn btn-neutral bg-indigo-600 hover:bg-indigo-500 text-white border-none w-full mt-4">Login</button>
                </div>
            </fieldset>
        </form>
    </div>
</x-layout>

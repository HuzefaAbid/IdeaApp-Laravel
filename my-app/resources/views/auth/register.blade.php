<x-layout title="Register - IdeaHub">
    <div class="flex justify-center items-center py-8">
        <form action="/register" method="POST" class="w-full max-w-sm">
            @csrf
            <fieldset class="fieldset bg-base-200 border border-slate-700/80 rounded-box p-6 shadow-2xl">
                <legend class="fieldset-legend text-lg font-bold text-indigo-400 px-2">Register</legend>

                <div class="space-y-4">
                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Name</label>
                        <input type="text" name="name" class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500" placeholder="John Doe" value="{{ old('name') }}" required />
                        @error('name')
                            <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Email</label>
                        <input type="email" name="email" class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500" placeholder="john@example.com" value="{{ old('email') }}" required />
                        @error('email')
                            <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Password</label>
                        <input type="password" name="password" class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500" placeholder="••••••••" required />
                        @error('password')
                            <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="label text-sm font-semibold mb-1 text-slate-200">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full bg-slate-900 border-slate-700 text-slate-100 focus:border-indigo-500" placeholder="••••••••" required />
                    </div>

                    <button type="submit" class="btn btn-neutral bg-indigo-600 hover:bg-indigo-500 text-white border-none w-full mt-4">Create Account</button>
                </div>
            </fieldset>
        </form>
    </div>
</x-layout>

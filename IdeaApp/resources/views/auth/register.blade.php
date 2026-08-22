<x-layouts.layout>
    <x-forms.form title="Register an account" description="Start tracking your ideas today.">
        <form action="/register" method="post" class="mt-6 space-y-4">
            @csrf

            <x-forms.field label="Full Name" name="name" />
            <x-forms.field label="Email" name="email" type="email" />
            <x-forms.field label="Password" name="password" type="password" />

            <button type="submit" class="btn w-full" data-test='register-btn'>Register</button>
        </form>
    </x-forms.form>
</x-layouts.layout>

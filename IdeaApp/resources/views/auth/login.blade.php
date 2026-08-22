<x-layouts.layout>
    <x-forms.form title="Login to your account" description="Glad to have you back.">
        <form action="/login" method="post" class="mt-6 space-y-4">
            @csrf

            <x-forms.field label="Email" name="email" type="email" />
            <x-forms.field label="Password" name="password" type="password" />

            <button type="submit" class="btn w-full" data-test='login-btn'>Login</button>
        </form>
    </x-forms.form>
</x-layouts.layout>

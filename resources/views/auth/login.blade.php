<x-layout>
    <x-page-heading>Login</x-page-heading>


    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" placeholder="someone@example.com" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.button>Login</x-forms.button>
    </x-forms.form>


</x-layout>
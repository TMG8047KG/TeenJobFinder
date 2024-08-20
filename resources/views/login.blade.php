<x-layout>
    <div class="bg-gray-800 h-screen">
        <x-nav/>
        <form class="h-full mx-auto content-center px-2 font-semibold" method="post" action="/profile/login">
            <p class="text-2xl text-gray-200 w-full text-center">Login</p>
            @csrf
            <div class="form-group mb-3">
                <x-form.label for="email">Email</x-form.label>
                <x-form.input type="email" name="email" placeholder="example@domain.com" :value="old('email')"/>
                <x-form.error name="email"/>
            </div>
            <div class="form-group mb-3">
                <x-form.label for="password">Password</x-form.label>
                <x-form.input type="password" name="password"/>
                <x-form.error name="password"/>
            </div>
            <x-form.button>Login</x-form.button>
            <div class="mt-4 underline text-blue-400 text-center">
                <a href="/profile/register">Register</a>
            </div>
        </form>
    </div>
</x-layout>

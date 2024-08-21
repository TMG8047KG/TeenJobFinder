<x-layout>
    <div class="bg-gray-800 h-screen">

        <form class="h-full mx-auto content-center px-2 font-semibold" method="post" action="/profile/register">
            <p class="text-2xl text-gray-200 w-full text-center">Register</p>
            @csrf
            <div class="form-group mb-3">
                <x-form.label for="username">Username</x-form.label>
                <x-form.input name="username" placeholder="ButterflyEater" :value="old('username')"/>
                <x-form.error name="username"/>
            </div>
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
            <x-form.button>Register</x-form.button>
            <div class="mt-4 underline text-blue-400 text-center">
                <a href="/profile/login">Login</a>
            </div>
        </form>
    </div>
</x-layout>

<x-layout>
    <div class="bg-gray-800 h-screen">

        <form class="h-full mx-auto content-center px-2 font-semibold" action="{{ route('register') }}" method="POST">
            <p class="text-2xl text-gray-200 w-full text-center">Register</p>
            @csrf
            <div class="form-group mb-3">
                <x-form.label for="username" class="text-white">Username</x-form.label>
                <x-form.input name="username" placeholder="StarGazer" :value="old('username')"/>
                <x-form.error name="username"/>
            </div>
            <div class="form-group mb-3">
                <x-form.label for="email" class="text-white">Email</x-form.label>
                <x-form.input type="email" name="email" placeholder="example@domain.com" :value="old('email')"/>
                <x-form.error name="email"/>
            </div>
            <div class="form-group mb-3">
                <x-form.label for="password" class="text-white">Password</x-form.label>
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

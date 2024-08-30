<x-layout>
    <div class="h-screen w-full bg-white dark:bg-gray-900 inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="h-full flex items-center justify-center">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg px-8 py-6 max-w-md w-full border border-gray-100 dark:border-gray-950">

                <form class="h-full mx-auto content-center px-2 font-semibold" action="{{ route('register') }}" method="POST">
                    <p class="text-2xl text-gray-700 dark:text-gray-300 w-full text-center">Register</p>
                    @csrf
                    <div class="form-group mb-3">
                        <x-form.label for="username">Username</x-form.label>
                        <x-form.input name="username" placeholder="StarGazer" :value="old('username')"/>
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
                    <div class="form-group mb-3">
                        <x-form.label for="phone">Phone</x-form.label>
                        <x-form.input type="tel" name="phone" placeholder="+1 (123) 456-7890" :value="old('phone')"/>
                        <x-form.error name="phone"/>
                    </div>
                    <div class="form-group mb-3">
                        <x-form.label for="age">Age</x-form.label>
                        <x-form.input type="number" name="age" placeholder="25" :value="old('age')"/>
                        <x-form.error name="age"/>
                    </div>
                    <div class="form-group mb-3">
                        <x-form.label for="location">Location</x-form.label>
                        <x-form.input type="text" name="location" placeholder="New York, USA" :value="old('location')"/>
                        <x-form.error name="location"/>
                    </div>
                    <x-form.button>Register</x-form.button>
                    <div class="mt-4 underline text-violet-400 text-center">
                        <a href="/profile/login">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

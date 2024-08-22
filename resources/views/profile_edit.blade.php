<x-layout>
    <body>
    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
        <!-- Main Col -->
        <div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">
            <div class="p-4 md:p-12 text-center lg:text-left">
                <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $user->username }}</h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-blue-500 opacity-25"></div>

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile Picture -->
                    <div class="mt-4 max-w-2xl text-sm text-gray-500">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Profile Picture:</label>
                        <input type="file" id="photo" name="photo"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        @if($user->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Picture" class="w-20 h-20 rounded-full">
                            </div>
                        @endif
                    </div>

                    <!-- Username -->
                    <div class="mt-4 max-w-2xl text-sm text-gray-500">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                        <input type="text" id="username" name="username" value="{{ $user->username }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4 max-w-2xl text-sm text-gray-500">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 max-w-2xl text-sm text-gray-500">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input type="password" id="password" name="password"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        <small class="text-gray-500">Leave blank if you don't want to change it.</small>
                    </div>

                    <!-- Bio -->
                    <div class="mt-4 max-w-2xl text-sm text-gray-500">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio:</label>
                        <textarea id="bio" name="bio" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $user->bio }}</textarea>
                    </div>

                    <div class="pt-12 pb-8">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-full">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Img Col -->
        <div class="w-full lg:w-2/5">
            <img src="https://source.unsplash.com/MP0IUfwrn0A" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block" alt="Profile image" />
        </div>
    </div>
    </body>
    <x-nav/>
</x-layout>

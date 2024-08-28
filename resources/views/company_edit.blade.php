<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-white dark:bg-gray-900 overflow-hidden">
        <div class="bg-white dark:bg-gray-900 max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-20 lg:my-0">

            <!-- Main Col -->
            <div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white dark:bg-gray-800 opacity-90 mx-6 lg:mx-0">
                <div class="p-6 md:p-12 text-center lg:text-left">
                    <h1 class="text-4xl font-extrabold text-violet-600 pt-8 lg:pt-0 uppercase">{{ $company->name }}</h1>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-1 border-b-4 border-violet-600 opacity-50"></div>

                    <!-- Company Edit Form -->
                    <form method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Photo -->
                        <div class="mt-2 max-w-2xl text-sm text-gray-700 dark:text-gray-400">
                            <label for="photo" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Company Photo:</label>
                            <input type="file" id="photo" name="photo"
                                   class="mt-4 block w-full file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-violet-600 file:dark:bg-violet-700 file:text-white hover:file:bg-violet-800 rounded-lg border-gray-300 dark:border-gray-400 shadow-sm focus:border-violet-500 bg-gray-100 dark:bg-gray-700 focus:ring-violet-500 sm:text-sm" />
                            @if($company->photo)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/photos/' . $company->photo) }}" alt="Company photo" class="w-24 h-24 rounded-full shadow-lg mx-auto">
                                </div>
                            @endif
                        </div>

                        <!-- Company Name -->
                        <div class="mt-4 max-w-2xl text-sm text-gray-700 dark:text-gray-300">
                            <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Company Name:</label>
                            <input type="text" id="name" name="name" value="{{ $company->name }}"
                                   class="bg-white dark:bg-gray-700 mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:border-violet-700 focus:ring-violet-700 sm:text-sm" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4 max-w-2xl text-sm text-gray-700 dark:text-gray-300">
                            <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $company->email }}"
                                   class="bg-white dark:bg-gray-700 mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:border-violet-700 focus:ring-violet-700 sm:text-sm" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4 max-w-2xl text-sm text-gray-700 dark:text-gray-300">
                            <label for="phone" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Phone:</label>
                            <input type="text" id="phone" name="phone" value="{{ $company->phone }}"
                                   class="bg-white dark:bg-gray-700 mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:border-violet-700 focus:ring-violet-700 sm:text-sm" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4 max-w-2xl text-sm text-gray-700 dark:text-gray-300">
                            <label for="address" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Address:</label>
                            <input type="text" id="address" name="address" value="{{ $company->address }}"
                                   class="bg-white dark:bg-gray-700 mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:border-violet-700 focus:ring-violet-700 sm:text-sm" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4 max-w-2xl text-sm text-gray-700 dark:text-gray-300">
                            <label for="description" class="block text-sm font-medium text-gray-800 dark:text-gray-300">Description:</label>
                            <textarea id="description" name="description" rows="3"
                                      class="bg-white dark:bg-gray-700 mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 shadow-sm focus:border-violet-700 focus:ring-violet-700 sm:text-sm">{{ $company->description }}</textarea>
                        </div>

                        <div class="pt-9 pb-8">
                            <button type="submit" class="bg-violet-600 dark:bg-violet-700 hover:bg-violet-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-200">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Img Col -->
            <div class="w-full lg:w-2/5">
                <img src="https://source.unsplash.com/MP0IUfwrn0A" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block" alt="Company image" />
            </div>
        </div>
    </div>
</x-layout>

<div class="relative">
    <div class="fixed bottom-0 left-0 right-0 md:top-0">
        <nav class="bg-white shadow-lg border border-gray-300">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
                <div class="md:hidden w-full" id="navbar-solid-bg">
                    <ul class="flex flex-row justify-center font-medium space-x-6 md:space-x-8">
                        <x-nav-link route="home">
                            <svg class="h-8 w-8 text-gray-500" viewBox="0 0 24 24" fill="{{ request()->routeIs('home') ? 'currentColor' : 'none' }}" stroke="currentColor">
                                <path d="M20 17.0002V11.4522C20 10.9179 19.9995 10.6506 19.9346 10.4019C19.877 10.1816 19.7825 9.97307 19.6546 9.78464C19.5102 9.57201 19.3096 9.39569 18.9074 9.04383L14.1074 4.84383C13.3608 4.19054 12.9875 3.86406 12.5674 3.73982C12.1972 3.63035 11.8026 3.63035 11.4324 3.73982C11.0126 3.86397 10.6398 4.19014 9.89436 4.84244L5.09277 9.04383C4.69064 9.39569 4.49004 9.57201 4.3457 9.78464C4.21779 9.97307 4.12255 10.1816 4.06497 10.4019C4 10.6506 4 10.9179 4 11.4522V17.0002C4 17.932 4 18.3978 4.15224 18.7654C4.35523 19.2554 4.74432 19.6452 5.23438 19.8482C5.60192 20.0005 6.06786 20.0005 6.99974 20.0005C7.93163 20.0005 8.39808 20.0005 8.76562 19.8482C9.25568 19.6452 9.64467 19.2555 9.84766 18.7654C9.9999 18.3979 10 17.932 10 17.0001V16.0001C10 14.8955 10.8954 14.0001 12 14.0001C13.1046 14.0001 14 14.8955 14 16.0001V17.0001C14 17.932 14 18.3979 14.1522 18.7654C14.3552 19.2555 14.7443 19.6452 15.2344 19.8482C15.6019 20.0005 16.0679 20.0005 16.9997 20.0005C17.9316 20.0005 18.3981 20.0005 18.7656 19.8482C19.2557 19.6452 19.6447 19.2554 19.8477 18.7654C19.9999 18.3978 20 17.932 20 17.0002Z" />
                            </svg>
                        </x-nav-link>

                        <x-nav-link route="jobs">
                            <svg class="h-8 w-8 text-gray-500" viewBox="0 0 24 24" fill="{{ request()->routeIs('jobs') ? 'currentColor' : 'none' }}" stroke="currentColor">
                                <path d="M12 3V4M12 9V12M12 17V21M4 4H19L21 6.5L19 9H4V4ZM20 12H5L3 14.5L5 17H20V12Z" />
                            </svg>
                        </x-nav-link>

                        <x-nav-link route="post.options">
                            <svg class="h-8 w-8 text-gray-500" viewBox="0 0 24 24" fill="{{ request()->routeIs('post.options') ? 'currentColor' : 'none' }}" stroke="currentColor">
                                <path d="M12 4v16m-8-8h16" />
                            </svg>
                        </x-nav-link>

                        <x-nav-link route="home">
                            <svg class="h-8 w-8" viewBox="0 0 24 24"
                                 fill="{{ request()->routeIs('home') ? 'gray' : 'none' }}"
                                 stroke="{{ request()->routeIs('home') ? 'white' : 'gray' }}">
                                <path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </x-nav-link>


                        <x-nav-link route="profile">
                            <svg class="h-8 w-8 text-gray-500" viewBox="0 0 24 24" fill="{{ request()->routeIs('profile') ? 'currentColor' : 'none' }}" stroke="currentColor">
                                <path d="M12 11C14.4853 11 16.5 8.98528 16.5 6.5C16.5 4.01472 14.4853 2 12 2C9.51472 2 7.5 4.01472 7.5 6.5C7.5 8.98528 9.51472 11 12 11Z" />
                                <path d="M5 18.5714C5 16.0467 7.0467 14 9.57143 14H14.4286C16.9533 14 19 16.0467 19 18.5714C19 20.465 17.465 22 15.5714 22H8.42857C6.53502 22 5 20.465 5 18.5714Z" />
                            </svg>
                        </x-nav-link>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

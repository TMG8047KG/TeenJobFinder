<x-layout>
    <div class="h-screen inset-0 w-full">
        <div class="min-h-screen pb-12 flex items-start justify-center w-full bg-white dark:bg-gray-900 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg m-2.5 w-full border border-gray-100 dark:border-gray-800 overflow-y-auto">
                <form class="h-full content-center font-semibold p-3" method="post" action="/post/create/user">
                    @csrf
                    <div class="text-center font-bold text-xl mb-4 text-gray-800 dark:text-white">New Post</div>
                    <div class="form-group mb-2">
                        <x-form.label for="title">Full name</x-form.label>
                        <x-form.input name="title"/>
                        <x-form.error name="title"/>
                    </div>
                    <div class="form-group mb-2">
                        <x-form.label for="age">Your age</x-form.label>
                        <x-form.input name="age" type="number"/>
                        <x-form.error name="age"/>
                    </div>
                    <div class="form-group mb-2">
                        <x-form.label for="work_time">How many hours can you work in a day?</x-form.label>
                        <x-form.input name="work_time" type="number" placeholder="Hours per day"/>
                        <x-form.error name="work_time"/>
                    </div>
                    <div class="form-group mb-2">
                        <x-form.label for="skills">Skills and experiences you have</x-form.label>
                        <x-form.textarea name="skills" rows="4"/>
                        <x-form.error name="skills"/>
                    </div>
                    <div class="form-group mb-2">
                        <x-form.label for="description">Tell something about you</x-form.label>
                        <x-form.textarea name="description" rows="6"/>
                        <x-form.error name="description"/>
                    </div>

                    <x-form.button>Submit</x-form.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

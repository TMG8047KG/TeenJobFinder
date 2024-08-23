<x-layout>
    <div class="h-screen bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="min-h-screen flex items-center justify-center w-full">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg px-20 py-10 max-w-lg border border-gray-100 dark:border-gray-800">
                <form class="h-full mx-auto content-center px-1 font-semibold" method="post" action="/post/create/user">
                    @csrf
                    <div class="text-center font-bold text-xl mb-4 text-gray-800 dark:text-white">New Post</div>
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="title">Title</x-form.label>
                        <x-form.input name="title" placeholder="Enter Title"/>
                        <x-form.error name="title"/>
                    </div>

                    <div class="form-group mb-2 w-full">
                        <x-form.label for="description">Description</x-form.label>
                        <x-form.textarea name="description" rows="6" placeholder="Describe what you're looking for"/>
                        <x-form.error name="description"/>
                    </div>

                    <x-form.button>Submit</x-form.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

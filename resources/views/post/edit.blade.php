<x-layout>
    <div class="h-screen  inset-0 w-full ">
        <div class="min-h-screen pb-12 flex items-start justify-center w-full bg-white dark:bg-gray-900 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg m-2.5 w-full border border-gray-100 dark:border-gray-800 overflow-y-auto">
                <form class="h-full content-center font-semibold p-3" method="post" action="/posts/{{$post->id}}/edit">
                    @csrf
                    <div class="text-center font-bold text-xl mb-4 text-gray-800 dark:text-white">New Job Listing</div>
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="title">Title</x-form.label>
                        <x-form.input name="title" value="{{ $post->title }}"/>
                        <x-form.error name="title"/>
                    </div>
                    <div class="form-group mb-2 w-full inline-flex space-x-2">
                        <div>
                            <x-form.label for="work_time">Time</x-form.label>
                            <x-form.input name="work_time" value="{{ $post->work_time }}" type="number" size="w-24"/>
                            <x-form.error name="work_time"/>
                        </div>
                        @if($category->name == 'Job Offer')
                            <div class="w-full">
                                <x-form.label for="salary">Salary</x-form.label>
                                <x-form.input name="salary" value="{{ $post->salary }}" type="number" placeholder="Leave empty if for negotiation"/>
                                <x-form.error name="salary"/>
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="skills">Skills</x-form.label>
                        <x-form.textarea name="skills" rows="4">{{ $post->skills }}</x-form.textarea>
                        <x-form.error name="skills"/>
                    </div>
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="description">Description</x-form.label>
                        <x-form.textarea name="description" rows="6">{{ $post->description }}</x-form.textarea>
                        <x-form.error name="description"/>
                    </div>
                    <x-form.button>Submit</x-form.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

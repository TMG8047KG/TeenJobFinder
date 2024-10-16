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
                    @if($category->name == 'Job Offer')
                    <div class="form-group mb-2 w-full inline-flex space-x-2">
                        <div>
                            <x-form.label for="work_time">Time</x-form.label>
                            <x-form.input name="work_time" value="{{ $post->work_time }}" type="number" size="w-24"/>
                            <x-form.error name="work_time"/>
                        </div>
                        <div class="w-full">
                            <x-form.label for="salary">Salary</x-form.label>
                            <x-form.input name="salary" value="{{ $post->salary }}" type="number" placeholder="Leave empty if for negotiation"/>
                            <x-form.error name="salary"/>
                        </div>
                    </div>
                    @else
                    <div class="form-group mb-2 w-full">
                        <div>
                            <x-form.label for="work_time">Time</x-form.label>
                            <x-form.input name="work_time" value="{{ $post->work_time }}" type="number"/>
                            <x-form.error name="work_time"/>
                        </div>
                    </div>
                    @endif
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="skills">Skills</x-form.label>
                        <x-form.textarea name="skills" rows="6">{{ $post->skills }}</x-form.textarea>
                        <x-form.error name="skills"/>
                    </div>
                    <div class="form-group mb-2 w-full">
                        <x-form.label for="description">Description</x-form.label>
                        <x-form.textarea name="description" rows="8">{{ $post->description }}</x-form.textarea>
                        <x-form.error name="description"/>
                    </div>
                    @if($category->name == 'Job Offer')
                        <div class="flex items-center mb-2 form-group space-x-1.5">
                            <x-form.input name="tags[]" type="hidden"/>
                            <x-form.input size="w-4 h-4" text_color="text-violet-600 dark:text-violet-600"  name="tags[]" type="checkbox" value="Remote"/>
                            <x-form.label margin="ml-1" for="tags[]">Remote</x-form.label>
                            <x-form.input size="w-4 h-4 ml-2" text_color="text-violet-600 dark:text-violet-600" name="tags[]" type="checkbox" value="Hybrid"/>
                            <x-form.label margin="ml-1" for="tags[]">Hybrid</x-form.label>
                            <x-form.input size="w-4 h-4 ml-2" text_color="text-violet-600 dark:text-violet-600" name="tags[]" type="checkbox" value="In-person"/>
                            <x-form.label margin="ml-1" for="tags[]">In Person</x-form.label>
                            <x-form.error name="tags[]"/>
                        </div>
                    @endif
                    <x-form.button>Submit</x-form.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

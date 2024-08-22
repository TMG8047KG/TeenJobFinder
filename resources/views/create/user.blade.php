<x-layout>
    <div class="min-h-screen flex items-center justify-center w-full">
        <div class="w-full max-w-md bg-white border border-white p-4">
            <div class="text-center font-bold text-xl mb-4 text-gray-800">New Post</div>
            <div class="flex flex-col text-gray-800">
                <p>Tittle</p>
                <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="" type="text">
                <p>Contact</p>
                <input class="bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="Email/Phone Number" type="text">
                <p>Description</p>
                <textarea class="bg-gray-100 p-3 h-48 border border-gray-300 outline-none w-full" spellcheck="false" placeholder="Describe what job you're looking for specifically"></textarea>
                <div class="flex justify-center text-gray-500 m-2">
                </div>
                <div class="flex justify-center mt-4">
                    <div class="btn border border-gray-500 shadow-md p-2 px-4 font-semibold cursor-pointer text-white bg-gray-500">Post</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

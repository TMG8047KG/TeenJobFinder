<x-layout>
    <x-nav/>
    <div class="h-screen bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="min-h-screen flex items-center justify-center w-full">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg m-2.5 w-full border border-gray-100 dark:border-gray-800 overflow-y-auto">
                 <form class="h-full content-center px-3 font-semibold" method="post" action="/company/create">
                     @csrf
                     <div class="text-center font-bold text-xl my-4 text-gray-800 dark:text-white">Company Registration Request</div>
                     <div class="form-group mb-2">
                         <x-form.label for="name">Company Name</x-form.label>
                         <x-form.input name="name" placeholder="RoseWorld"/>
                         <x-form.error name="name"/>
                     </div>
                     <div class="form-group mb-2">
                         <x-form.label for="email">Company Email</x-form.label>
                         <x-form.input type="email" name="email" placeholder="example@company.com"/>
                         <x-form.error name="email"/>
                     </div>
                     <div class="form-group mb-2">
                         <x-form.label for="phone">Phone Number</x-form.label>
                         <x-form.input type="phone" name="phone"/>
                         <x-form.error name="phone"/>
                     </div>
                     <div class="form-group mb-2">
                         <x-form.label for="address">Company Address</x-form.label>
                         <x-form.input name="address"/>
                         <x-form.error name="address"/>
                     </div>
                     <div class="form-group mb-2">
                         <x-form.label for="description">Description</x-form.label>
                         <x-form.textarea name="description" row="6" placeholder="Some short information about the company"/>
                         <x-form.error name="description"/>
                     </div>
                     <div class="mb-3">
                         <x-form.button>Submit Request</x-form.button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

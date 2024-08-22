<x-layout>
    <x-nav/>
    <div class="h-screen bg-gray-800">
        <form class="h-full mx-auto content-center px-2 font-semibold" method="post" action="/company/create">
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
                <x-form.label for="phone">Phone number</x-form.label>
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
            <x-form.button>Submit Request</x-form.button>
        </form>
    </div>
</x-layout>

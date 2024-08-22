<x-layout>
    <x-nav/>
    <div class="h-screen bg-gray-800">
        <form class="h-full mx-auto content-center px-2 font-semibold">
            <div class="form-group mb-2">
                <x-form.label for="name">Tittle</x-form.label>
                <x-form.input name="name" placeholder="Summer job"/>
                <x-form.error name="name"/>
            </div>
            <div class="form-group mb-2">
                <x-form.label for="email">Email</x-form.label>
                <x-form.input type="email" name="email" placeholder="example@mail.com"/>
                <x-form.error name="email"/>
            </div>
            <div class="form-group mb-2">
                <x-form.label for="phone">Phone number</x-form.label>
                <x-form.input type="phone" name="phone"/>
                <x-form.error name="phone"/>
            </div>
            <div class="form-group mb-2">
                <x-form.label for="description">Description</x-form.label>
                <x-form.textarea name="description" row="6" placeholder="Some short information about your interest"/>
                <x-form.error name="description"/>
            </div>
            <x-form.button>Submit</x-form.button>
        </form>
    </div>
</x-layout>

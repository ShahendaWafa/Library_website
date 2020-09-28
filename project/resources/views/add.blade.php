<style>
#a{
    width:500;
}
#c{
    margin:50px;
}
#error{
  color:red;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method = "GET" action="/submit">
                    @csrf
                    @method('post')
                    <div id="c">
                    <h4>Book's Details</h4><br>
                    <div class="form-group">
                        <label for="name">Book Name</label>
                        <input type="text" name = "name" class="form-control" id = "a" >
                    </div>
                    <div class="form-group">
                        <label for="author">Book Author</label>
                        <input type="text" name = "author" class="form-control" id = "a" >
                    </div>
                    <div class="form-group">
                        <label for="edition">Edition number</label>
                        <input type="text" name = "edition" class="form-control" id="a" >
                    </div>
                    <div class="form-check">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{URL::previous()}}" class = "btn btn-info">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

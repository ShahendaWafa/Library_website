<style>
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
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form method = "GET" action="/update/{{$books->id}}">
                @csrf
                @method('post')
                <div id="c">
                <h4>Update book's details</h4><br>
                    <div class="form-group">
                        <label for="name">Book Name</label>
                        <input type="text" name = "name" class="form-control" id="title" value = "{{$books->name}}">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name = "author" class="form-control" id="body" value = "{{$books->author}}">
                    </div>
                    <div class="form-group">
                        <label for="edition">Edition Number</label>
                        <input type="text" name = "edition" class="form-control" id="body" value = "{{$books->edition_no}}">
                    </div>
                    <div class="form-check">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <td><a href="{{URL::previous()}}" class = "btn btn-info">Cancel</a></td>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

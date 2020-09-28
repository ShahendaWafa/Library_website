<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class='table'>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Edition number</th>
                        @if(Auth::user()->id !== 1)
                            <th>Borrow</th>
                        @endif
                        @if(Auth::user()->id == 1)
                            <th>Update</th>
                            <th>Delete</th>
                        @endif     
                    </tr>
                    @foreach($books as $books)
                        <tr>
                            <td>{{$books->id}}</td>
                            <td>{{$books->name}}</td>
                            <td>{{$books->author}}</td>
                            <td>{{$books->edition_no}}</td>
                            @if(Auth::user()->id !== 1)
                                <td><a href="/return/{{$books->id}}" class = "btn btn-success">Borrow</td>
                            @endif
                            @if(Auth::user()->id == 1)
                                <td><a href="edit/{{$books->id}}" class = "btn btn-warning">Update</td>
                                <td><a href="delete/{{$books->id}}" class = "btn btn-danger">Delete</td> 
                            @endif   
                    @endforeach
                </table>
            </div>
            <br>
            @if(Auth::user()->id == 1)
                <a href="/add" class = "btn btn-primary">Add Book</a>
            @endif
        </div>
    </div>
</x-app-layout>

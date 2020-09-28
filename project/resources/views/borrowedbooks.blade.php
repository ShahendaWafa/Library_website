<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Borrowed Books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->id !== 1)
                <h4>Books you borrowed</h4><br>
             @endif
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Edition Number</th>
                    @if(Auth::user()->id !== 1)
                        <th>Return the book</th>
                    @endif
                    @if(Auth::user()->id == 1)
                        <th>Borrowed By</th>
                        <th>Return Date</th>
                        <th>Return Time</th>
                    @endif
                </tr>
                @if(Auth::user()->id !== 1)
                    @foreach ($books as $books)
                        @if( Auth::user()->name == $books->borrowed_by )
                            <tr>
                                <td>{{$books->id}}</td>
                                <td>{{$books->name}}</td>
                                <td>{{$books->author}}</td>
                                <td>{{$books->edition_no}}</td>
                                <td><a href="/borrowedbooks/{{$books->id}}" class="btn btn-primary">Return</a></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                @if(Auth::user()->id == 1)
                    @foreach ($books as $books)
                            <tr>
                                <td>{{$books->id}}</td>
                                <td>{{$books->name}}</td>
                                <td>{{$books->author}}</td>
                                <td>{{$books->edition_no}}</td>
                                <td>{{$books->borrowed_by}}</td>
                                <td>{{$books->return_date}}</td>
                                <td>{{$books->return_time}}</td>
                            </tr>
                    @endforeach
                @endif
                
            </table>
            
            @if(Auth::user()->id !== 1)
            <br><h4>Rest of the borrowed Books</h4><br>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Borrowed By</th>
                    <th>Return Date</th>
                    <th>Return Time</th>
                </tr>
                @foreach ($books2 as $books2)
                    @if( Auth::user()->name !== $books2->borrowed_by )
                        <tr>
                            <td>{{$books2->id}}</td>
                            <td>{{$books2->name}}</td>
                            <td>{{$books2->author}}</td>
                            <td>{{$books2->borrowed_by}}</td>
                            <td>{{$books2->return_date}}</td>
                            <td>{{$books2->return_time}}</td>
                        </tr>
                    @endif
                @endforeach
                
            </table>
            @endif
            
        </div>
    </div>
</x-app-layout>
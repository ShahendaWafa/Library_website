<style>
#a{
    width: 200px;
}
#c{
    margin:50px;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book returning details') }}
        </h2>
    </x-slot>
    <form method = "GET" action="/date_time/{{$books->id}}">
        @csrf
        @method('post')
        <div id="c">
        <h4>When are you returning the book?</h4><br>
        <div class="form-group">
            <label for="date">Return Date</label>
            <input type="date" name = "date" class="form-control" ID = "a" >
        </div>
        <div class="form-group">
            <label for="time">Return Time</label>
            <input type="time" name = "time" class="form-control" ID = "a" >
        </div>
        <div class="form-check">
        </div>
        <button type="submit" class="btn btn-primary">Done</button>
        <a href="{{URL::previous()}}" class = "btn btn-info">Cancel</a>
        </div>
    </form>
</x-app-layout>

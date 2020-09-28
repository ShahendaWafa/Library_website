<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ') }}{{Auth::user()->name}}!
        </h2>
    </x-slot>
    <style>
        #div1{
            width:  1325px;
            height:  480px;
            padding:20px;
            padding-top:130px;
            float: left;
            background-image:url('css/book.jpg');
            background-size:cover;
            font-family: monospace;
            color:white;
            font-size:25px;
        }
    </style>
    <div id ="div1">
        <p> What type of book do you want? </p>
        <p> You can find books of all genres.. </p>
        <p> Fiction, non-fiction, biography, science and more.</p>
        <p> Borrow your favorite books, and check for new editions!</p>
    </div>
</x-app-layout>
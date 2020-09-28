<x-app-layout>
    <style>
        #a{
            margin-left:20px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Profile Information') }}
        </h2>
    </x-slot>
    <br>
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-secondary">
            <b> Student ID: </b>
               {{$user->id}}<br>
        </li>
        <li class="list-group-item list-group-item-secondary">
             <b> Student Name: </b>
            {{$user->name}}<br>
        </li>
        <li class="list-group-item list-group-item-secondary">
            <b> Student Email: </b>
              {{$user->email}}<br>
        </li>

        <li class="list-group-item list-group-item-secondary">
            <b> Created at: </b>
              {{$user->created_at}}<br>
        </li>
        
    </ul>
    <br>
    <a href="{{URL::previous()}}" id = "a" class = "btn btn-primary">Back</a>
</x-app-layout>

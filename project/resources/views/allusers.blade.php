<html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <head>
        <style>
            #filter{
                margin:10px;
            }
        </style>
        <script>
         function serachUser(){

            let filter=document.getElementById("filter").value.toUpperCase();
            console.log(filter);
            let tableRecord=document.getElementById("tableRecord");
            let tr = tableRecord.getElementsByTagName("tr");
            
            for (var i =0 ;i < tr.length ; i++) {
                let td=tr[i].getElementsByTagName('td')[0];

                if (td) {
                    let txtvalue=td.textContent || td.innerHTML;
                    if (txtvalue.toUpperCase().indexOf(filter)> -1) {
                        tr[i].style.display="";
                    }
                    else{
                        tr[i].style.display="none";
                    }
                }  
            }
         }
        </script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="filter-table">               
                <label><b>Search Students: </b></label>       
                <input type="text" id="filter" class="filter" placeholder="Search by ID" onkeyup="serachUser()">         
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class='table table-striped' id = "tableRecord">
                    
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Show Student's Details</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->id !== 1)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="/show/{{$user->id}}" class = "btn btn-primary">Show</td>
                                </tr>
                            @endif
                        @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
</html>
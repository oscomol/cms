@extends('layout.userLayout')

@section('title')
    Menus 
@endsection

@section('content')
   <div class="container-fluid">
    <div class="row">
        @foreach ($menus as $menu)
        <div class="col-12 col-sm-6 col-md-3">
           <div class="card">
               <div class="card-body p-0">
                 
                   <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 160px;" class="rounded"/>

               </div>
               <div class="card-footer p-2" style="line-height: 10px;">
                 <h6>{{$menu->name}}</h6>
                 <p class="text-justify ">{{$menu->description}}</p>
                 <span class="badge bg-danger">Php {{$menu->price}}</span>
               </div>
             </div>
       </div>
        @endforeach
   </div>
   </div>
   @if (session('message'))
   <script>
       Swal.fire({
           icon: "success",
           text: "{{ session('message') }}",
           timer: 3000
       });
   </script>
@endif

@if (session('error'))
   <script>
       Swal.fire({
           icon: "error",
           text: "{{ session('error') }}",
           timer: 3000
       });
   </script>
@endif
@endsection
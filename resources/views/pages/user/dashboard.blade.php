@extends('layout.userLayout')

@section('title')
    Home 
@endsection

@section('content')
   <div class="container-fluid">
  
    @include('components.user.dashboard.mostPackage')
    @include('components.user.dashboard.mostTheme')
    @include('components.user.dashboard.mostMenus')
    @include('components.user.dashboard.mostPacked')

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
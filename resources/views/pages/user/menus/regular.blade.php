@extends('layout.userLayout')

@section('title')
    {{ucfirst($subCategory)}} menus 
@endsection

@section('option')
<nav aria-label="breadcrumb" class="recordNavs">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a class="recordLinks {{$subCategory === "Chicken" ? 'text-primary':''}}" href="{{route('regular-category-menu', ['subCategory' => 'chicken'])}}">Chicken</a>
      </li>
      <li class="breadcrumb-item">
        <a class="recordLinks {{$subCategory === "Fish" ? 'text-primary':''}}" href="{{route('regular-category-menu', ['subCategory' => 'fish'])}}">Fish</a>
      </li>
      <li class="breadcrumb-item">
        <a class="recordLinks {{$subCategory === "Seafoods" ? 'text-primary':''}}" href="{{route('regular-category-menu', ['subCategory' => 'seafoods'])}}">Seafoods</a>
      </li>
      <li class="breadcrumb-item">
        <a class="recordLinks {{$subCategory === "Beef" ? 'text-primary':''}}" href="{{route('regular-category-menu', ['subCategory' => 'beef'])}}">Beef</a>
      </li>
      <li class="breadcrumb-item">
        <a class="recordLinks {{$subCategory === "Pork" ? 'text-primary':''}}" href="{{route('regular-category-menu', ['subCategory' => 'pork'])}}">Pork</a>
      </li>
    </ol>
  </nav>
@endsection

@section('content')
<div class="container-fluid">
   @if ($menus->count() > 0)
   <div class="row">
    @foreach ($menus as $menu)
    <div class="col-6 col-md-4 col-lg-3">
       <div class="card">
           <div class="card-body p-0">
             
               <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 150px;" class="rounded"/>

           </div>
           <div class="card-footer p-2">
             <h6 >{{$menu->name}}</h6>
             <span class="badge bg-danger">Php {{$menu->price}}</span>
             <p class="reg-menu-description">{{$menu->slicedDes}} </p>
             <div class="d-flex justify-content-between align-items-center" style="margin-top: -10px;">
              <label style="font-size: 13px;">Sold: {{$menu->sold}}</label>
              <label class="text-info reg-menu-view" style="cursor: pointer;" id="reg-menu-view-{{$menu->id}}" menuId={{$menu->id}}>More</label>
             </div>
           </div>
         </div>
   </div>


   <div class="modal fade" id="reg-menu-view-modal-{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-default-label"> {{ucfirst($subCategory)}} menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%;" class="rounded"/>
              <h6 class="mt-2">{{$menu->name}}</h6>
              <span class="badge bg-danger">Php {{$menu->price}}</span>
              <p class="mt-3">{{$menu->description}} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>
   @else
   <div class="customCont">
    <li class="fa fa-exclamation-triangle text-warning" style="font-size: 60px;"></li>
    <p>No available menu to show</p>
</div>
   @endif
</div>
@endsection

@section('script')
    <script type="module">
      $(function(){
        $('.reg-menu-view').click(function(){
          const menuId = $(this).attr('menuId');
          $(`#reg-menu-view-modal-${menuId}`).modal('show');
        })
      })
    </script>
@endsection


<style>
      .recordLinks{
        color: white;
    }
    .customCont{
        width: 100%;
        height: 60vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }
</style>
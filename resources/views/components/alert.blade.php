{{-- <div class="alert alert-{{$type}} position-fixed w-100" role="alert">
    {{$message}}
</div> --}}
<div id="myAlert" class="alert alert-{{$type}} alert-dismissible fade show position-fixed profile-error" role="alert"> 
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
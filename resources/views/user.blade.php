<!DOCTYPE html>
<html lang="en">
<x-head :title="$user->name" />
<body>
    <x-navbar />
    <div id="profile-page" class="hasNavBar px-3 px-lg-5 d-flex flex-column flex-lg-row justify-content-between justify-content-lg-between align-items-center align-items-lg-start ">
        <div class="p-0">
            <div id="profile-infos" class="d-flex flex-column align-items-center border border-1 rounded-1 mt-5 pt-4">
                <img src="{{asset('storage/'.$user->image)}}" alt="" class="rounded-circle" style="width: 150px">
                    <div class="">
                        <strong class="fs-4 text-dark">{{$user->name}}</strong>
                        <span class="badge bg-primary ms-2">{{$user->job_title}}</span>
                    </div>
                    <button class="btn btn-primary mt-3 w-25">Chat</button>
                <div class="w-75 py-3">
                    <hr>
                    <div class="d-flex flex-wrap justify-content-between w-100 mb-1">
                        <span class="text-secondary"><i class="fa-solid fa-envelope myIcon"></i>Email:</span>
                        <span class="text-break">{{$user->email}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100 mb-1">
                        <span class="text-secondary "><i class="fa-sharp fa-solid fa-location-dot myIcon"></i>City:</span>
                        <span class="">{{$user->city??'Unknown'}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100 mb-1">
                        <span class=" text-secondary"><i class="fa-solid fa-user myIcon"></i>Member since:</span>
                        <span class="">{{substr($user->created_at,0,4)}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100">
                        <span class=" text-secondary"><i class="fa-solid fa-phone myIcon"></i>Phone:</span>
                        <span class="">{{$user->phone??'Unknown'}}</span>
                    </div>
                </div>
            </div>
            <div class="border border-1 rounded-1 mt-3 p-4">
                <h5 class="fw-bold">About</h5>
                <div>
                    <span>{{$user->about??'Unknown'}}</span>
                    {{-- <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span> --}}
                </div>
                
            </div>
        </div>
        <div id="profile-services" class="pt-4 mt-3 ms-4">
            <h3>{{$user->name}}'s services</h3>
            @if(!isset($user->service[0]))
            <div class="m-auto d-flex justify-content-center mt-5">
                <img src="/images/nodata1.png" alt="" style="width:300px">
            </div>
            @endif
            <div class="d-flex flex-wrap justify-content-around w-100">
                @foreach ($user->service as $service)
                <a href="{{route('show-service',$service)}}" class="d-flex justify-content-center flex-col mb-4">
                    <div class="card h-70 myService-card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                        alt="Hollywood Sign on The Hill" />
                    <div class="card-body">
                        <h5 class="card-title">{{$service['title']}}</h5>
                        <p class="card-text ">
                            {{strlen($service['description'])>60 ? substr($service['description'] ,0,60)."...": $service['description']}}
                        </p>
                    </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        {{-- @Foreach   
            <h1>{{$hh['title']}}</h1> 
        @endForeach  --}}
    </div>
</body>
</html>
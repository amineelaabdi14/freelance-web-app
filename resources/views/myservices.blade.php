<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Dashboard'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar hasNavBar d-flex flex-column">
        <div class="d-flex justify-content-end mt-4 me-4">
            <a href="/add-service" class="btn add-service mt-5 me-3">Add new service </a>
        </div>
        <div class="d-flex flex-wrap w-100 justify-content-around align-content-center">
        @if(count($myServices)==0)
        <div class="d-flex flex-column">
            <img src="images/nodata1.png" alt="" style="width:30%;" class="m-auto">
        </div>
        @endif
        @foreach( $myServices as $service)
            <a href="{{route('get-edit-service',$service)}}" class="m-3 card h-70 myService-card" >
                <img class="card-img-top object-fit-scale service-avatar" src="{{asset('storage/'.$service['image'])}}" alt="Card image cap">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{$service['title']}}</h5>
                    <strong>{{$service['price']}} Mad / {{$service['work_time']}}</strong>
                    <p class="card-text">
                        {{strlen($service['description'])>60 ? substr($service['description'] ,0,60)."...": $service['description']}}
                    </p>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</body>
</html>
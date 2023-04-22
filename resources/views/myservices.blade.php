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
        <div class="" style="height:100vh;">
            <img src="images/nodata1.png" alt="" style="width:30%;" class="m-auto">
        </div>
        @endif
        @foreach( $myServices as $service)
            <a href="{{route('get-edit-service',$service)}}" class="m-3 card h-70 myService-card" style="width: 18rem;">
                <img class="card-img-top" src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$service['title']}}</h5>
                  <p class="card-text">{{strlen($service['description'])>26 ? substr($service['description'],0,26)."..." :$service['description']}}</p>
                </div>
            </a>
        @endforeach
        </div>

  

    </div>
</body>
</html>
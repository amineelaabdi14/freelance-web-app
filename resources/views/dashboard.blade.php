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
            <a href="/edit-service/{{$service['id']}}" class="m-3 card h-70 myService-card" style="width: 18rem;">
                <img class="card-img-top" src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$service['title']}}</h5>
                  <p class="card-text">{{strlen($service['description'])>26 ? substr($service['description'],0,26)."..." :$service['description']}}</p>
                  <div class="d-flex flex-row justify-content-between">
                    {{-- <a href="/edit-service/{{$service['id']}}" class="btn edit-service"><i class="fa-solid fa-pen fs-8"></i></a> --}}
                  </div>
                </div>
            </a>
        @endforeach
        </div>

  

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
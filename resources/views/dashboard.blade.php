<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Dashboard'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar hasNavBar">
        <div class="d-flex justify-content-end mt-4">
            <a href="/add-service" class="btn add-service mt-5 me-3">Add new service </a>
        </div>
        <div class="d-flex flex-wrap">
        @if(count($myServices)==0)
        <div class="d-flex justify-content-center align-content-center" style="height:100vh;">
            <img src="images/nodata1.png" alt="" style="width:30%;" class="m-auto">
        </div>
        @endif
        @foreach( $myServices as $service)
            <div class="m-3" style="width: 18rem;">
                <img class="card-img-top" src="/images/new.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$service['title']}}</h5>
                  <p class="card-text">{{strlen($service['description'])>26 ? substr($service['description'],0,26)."..." :$service['description']}}</p>
                  <div class="d-flex flex-row justify-content-between">
                    <a href="/edit-service/{{$service['id']}}" class="btn edit-service"><i class="fa-solid fa-pen fs-8"></i></a>
                    <form class="d-inline" method="POST" action="{{ route('delete-service', $service) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-service"><i class="fa-sharp fa-solid fa-ban"></i></button>
                    </form>
                  </div>
                </div>
            </div>
        @endforeach
        </div>

  

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
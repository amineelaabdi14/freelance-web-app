<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Dashboard'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar">
        <h2 class="ms-5 mt-4 header">My Services :</h2>
        <div class="d-flex flex-wrap">
        @foreach( $myServices as $service)
            <div class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="/images/new.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$service['title']}}</h5>
                  <p class="card-text">{{strlen($service['description'])>26 ? substr($service['description'],0,26)."..." :$service['description']}}</p>
                  <div class="d-flex flex-row justify-content-between">
                    <a href="/edit-service/{{$service['id']}}" type="button" class="btn edit-service""><i class="fa-solid fa-pen"></i></a>
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
    
</body>
</html>
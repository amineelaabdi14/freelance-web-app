<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Dashboard'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar">
        <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn add-service mt-5 me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new service</buton>
        </div>
        <div class="d-flex flex-wrap">
        @if(count($myServices)==0)
        <div class="d-flex justify-content-center align-content-center" style="height:100vh;">
            <img src="images/nodata1.png" alt="" style="width:30%;" class="m-auto">
        </div>
        @endif
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

  
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>


    </div>
    <script>
        getService(2);
    </script>
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
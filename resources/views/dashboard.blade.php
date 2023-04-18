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
                    <button type="button" class="btn edit-service" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showEditervice({{$service['id']}})"><i class="fa-solid fa-pen"></i></botton>
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
                <h5 class="modal-title" id="service-modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                            <label class="form-label MyLabels" for="title">Title</label>
                            <input id="edit-service-title" type="text" class=" MyInputs edit-service-input" value="" name="title">
                            <div class="d-flex flex-row align-items-end justify-content-between">
                            <div>
                                <label for="price" class="form-label MyLabels" for="price">Price</label>
                                <input id="edit-service-price" name="price" type="number" class="form-control MyInputs edit-service-input" name="price" value="" style="width: 100px;">
                            </div>
                            <input id="edit-service-image" name="image" type="file" id="image-upload" accept="image/*" class="mt-3">
                        </div>
                        <label for="category" class=" MyLabels" for="form6Example3">Category</label>
                        <select id="edit-service-category" name="category" class="MyInputs edit-service-input">
                        </select>
                        <label for="delivery_time" class=" MyLabels" for="form6Example4">Delivery Time</label>
                        <input id="edit-service-delivery_time" name="delivery_time" type="number" id="form6Example4" class="form-control MyInputs edit-service-input" value="">
                        <label for="description" class="form-label MyLabels" for="form6Example7">Description</label>
                        <textarea id="edit-service-description" name="description" class=" edit-service-input ps-3 pt-2" id="form6Example7" rows="4"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>


    </div>
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
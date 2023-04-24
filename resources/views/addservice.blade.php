<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Add Service'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar hasNavBar">
        @if($errors->all())
          <x-alert :type="'danger'" :message="$errors->all()[0]" />
        @endif
          <div id="edit-add-form" class="p-5 w-lg-50 m-auto shadow-lg mt-5 rounded-2" style="border:solid #dfdfdf 0.5px">
            <form class="" action="{{ route('add-service') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="d-flex justify-content-center">
                <img id="service-image-form" src="/images/upload-service-image.png" class="w-100 rounded-1">
              </div>
                <input type="file" name="photo" class="form-control my-4" id="image-upload"  onchange="loadFile(event)" />
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4 d-flex flex-lg-row flex-column-reverse align-items-end">
                    <div class="form-outline">
                      <label class="form-label MyLabels" for="form6Example1">Title</label>
                      <input name="title" type="text" class=" MyInputs edit-service-input" value="" minlength="260">
                    </div>
                  <div class="col d-flex flex-column align-items-end">
                  </div>
                </div>
                <!-- Text input -->
                <div class="form-outline mb-4">
                  <label  class=" MyLabels" for="form6Example3">Category</label>
                  <select id="" class="MyInputs edit-service-input mb-4" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                  </select>
                  <div class="form-outline mb-4">
                    <label  class=" MyLabels" for="form6Example3">City</label>
                    <select id="" class="MyInputs edit-service-input" name="city_id">
                          @foreach ($cities as $city)
                              <option value="{{$city['id']}}">{{$city['name']}}</option>
                          @endforeach
                    </select>
                </div>
              
                <!-- Text input -->
                <div class="form-outline mb-4 d-flex flex-row justify-content-start">
                  <div class="w-25">
                    <label class=" MyLabels" for="form6Example4">Price</label>
                    <input type="number" name="price" id="form6Example4" class="form-control MyInputs edit-service-input">
                  </div>
                  
                  <div class="w-50 ms-5 d-flex flex-row align-items-end">
                    <label class=" MyLabels" for="form6Example4">Per</label>
                    <select name="work_time" id="" class="ms-4 MyInputs edit-service-input">
                          <option value="Service">Service</option>
                          <option value="Hour">Hour</option>
                          <option value="Day">Day</option>
                    </select>
                  </div>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                  <label class="form-label MyLabels" for="form6Example7">Description</label>
                  <textarea name="description" class=" edit-service-input ps-3 pt-2" id="form6Example7" rows="4"></textarea>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block  w-100" style="background-color: rgb(12, 92, 160);">Save</button>
                </form>
              </div>
        </div>
    </div>
    <script>
      var loadFile = function(event) {
        var output = document.getElementById('service-image-form');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    </script>
</body>
</html>
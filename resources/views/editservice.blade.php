<!DOCTYPE html>
<html lang="en">
    <x-head :title="$service['title']"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar hasNavBar">
      @if($errors->all())
          <x-alert :type="'danger'" :message="$errors->all()[0]" />
        @endif
      <div id="edit-add-form" class="p-5 w-lg-50 m-auto shadow-lg mt-5 rounded-2" style="border:solid #dfdfdf 0.5px">
        <form class="" action="{{route('edit-service',$service)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div id="edit-profile-avatar" class="d-flex justify-content-center">
            <img  src="{{asset('storage/'.$service['image'])}}" class="w-100 rounded-1">
          </div>
            <input type="file" class="form-control my-4" id="image-upload" name="photo" onchange="loadFile(event)"/>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4 d-flex flex-lg-row flex-column-reverse align-items-end">
                <div class="form-outline">
                  <label class="form-label MyLabels" for="form6Example1">Title</label>
                  <input name="title" type="text" class=" MyInputs edit-service-input" value="{{$service['title']}}">
                </div>
              <div class="col d-flex flex-column align-items-end">
              </div>
            </div>
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class=" MyLabels" for="form6Example3">Category</label>
                <select name="category_id" id="" class="MyInputs edit-service-input">
                    @foreach ($categories as $category)
                        @if ($category['id']==$service['category_id'])
                        <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                        @else 
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label  class=" MyLabels" for="form6Example3">City</label>
                <select id="" class="MyInputs edit-service-input" name="city_id">
                      @foreach ($cities as $city)
                      @if($city['id']==$service['city_id'])
                      <option value="{{$city['id']}}" selected>{{$city['name']}}</option>
                      @else
                          <option value="{{$city['id']}}">{{$city['name']}}</option>
                      @endif
                      @endforeach
                </select>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4 d-flex flex-row justify-content-start">
              <div class="w-25">
                <label class=" MyLabels" for="form6Example4">Price</label>
                <input name="price" type="number" id="form6Example4" class="form-control MyInputs edit-service-input" value="{{$service->price}}">
              </div>
              
              <div class="w-50 ms-5 d-flex flex-row align-items-end">
                <label class=" MyLabels" for="form6Example4">Per</label>
                <select name="work_time" id="" class="ms-4 MyInputs edit-service-input">
                      @foreach(['Service','Hour','Day'] as $option)
                        @if($option==$service['work_time']) 
                        <option value="{{$option}}" selected>{{$option}}</option>
                        @else
                        <option value="{{$option}}">{{$option}}</option>
                        @endif
                      @endforeach
              </select>
              </div>
            </div>
            <!-- Message input -->
            <div class="form-outline mb-4">
              <label class="form-label MyLabels" for="form6Example7">Description</label>
              <textarea name="description" class=" edit-service-input ps-3 pt-2" id="form6Example7" rows="4">{{$service['description']}}</textarea>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
            </form>
            <form class="d-inline" method="POST" action="{{ route('delete-service', $service) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-service" style="height:37px">Disable this service</button>
            </form>
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
<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Edit Service'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar">
        <h2 class="ms-5 mt-5">{{$service['title']}}</h2>
        <form class="p-5">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                <label class="form-label MyLabels" for="form6Example1">Title</label>
                  <input type="text" class=" MyInputs edit-service-input" value="{{$service['title']}}">
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                    <label for="images" class="drop-container">
                        <span class="MyLabels">Image</span>
                        <br>
                        <input type="file" id="image-upload" accept="image/*" class="mt-3">
                      </label>
                      
                </div>
              </div>
            </div>
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class=" MyLabels" for="form6Example3">Category</label>
                <select name="" id="" class="MyInputs edit-service-input">
                    @foreach ($categories as $category)
                        @if ($category['id']==$service['category_id'])
                        <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                        @else 
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class=" MyLabels" for="form6Example4">Delivery Time</label>
              <input type="number" id="form6Example4" class="form-control MyInputs edit-service-input" value="{{$service['delivery_time']}}">
            </div>
            <!-- Message input -->
            <div class="form-outline mb-4">
              <label class="form-label MyLabels" for="form6Example7">Description</label>
              <textarea class=" edit-service-input ps-3 pt-2" id="form6Example7" rows="4">{{$service['description']}}</textarea>
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
          </form>
    </div>
</body>
</html>
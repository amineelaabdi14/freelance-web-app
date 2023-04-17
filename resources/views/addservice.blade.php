<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Add Service'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=1" />
    <div id="dashboard-content" class="hasSideBar">
        <form class="p-5">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4 d-flex flex-row align-items-end">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label MyLabels" for="form6Example1">Title</label>
                  <input type="text" class=" MyInputs edit-service-input" value="">
                </div>
              </div>
              <div class="col d-flex flex-column align-items-end">
                <label for="images" class="drop-container">
                    <br>
                    <input type="file" id="image-upload" accept="image/*" class="mt-3">
                </label>
              </div>
            </div>
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class=" MyLabels" for="form6Example3">Category</label>
                <select name="" id="" class="MyInputs edit-service-input">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class=" MyLabels" for="form6Example4">Delivery Time</label>
              <input type="number" id="form6Example4" class="form-control MyInputs edit-service-input" value="">
            </div>
            <!-- Message input -->
            <div class="form-outline mb-4">
              <label class="form-label MyLabels" for="form6Example7">Description</label>
              <textarea class=" edit-service-input ps-3 pt-2" id="form6Example7" rows="4"></textarea>
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
          </form>
    </div>
</body>
</html>
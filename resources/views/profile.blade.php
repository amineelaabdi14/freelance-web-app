<!DOCTYPE html>
<html lang="en">
<x-head :title="'My Profile'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=0" />
    <div id="profile" class="hasSideBar hasNavBar" >
        @if (isset($message))
            <x-alert :type="$type" :message="$message" />
        @endif
        @if (isset($message))
        <x-alert :type="$type" :message="$message" />
        @endif
        <form id="edit-profile-form" action="{{route('edit-profile')}}" method="POST" class="d-flex flex-column align-items-center m-auto mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="edit-profile-avatar" class="d-flex flex-column align-items-center mt-4 w-100 px-3 ">
                <img id="editImage" src="{{asset('storage/'.auth()->user()->image)}}" alt="" class="rounded-circle object-fit-contain" style="width:180px;height:180px;">
                <input type="file" class="form-control my-4 w-100 mb-0" id="image-upload" name="photo" onchange="loadFile(event)"/>
            </div>
            <div id="EditName" class="mt-2 w-100 px-3">
                <label for="name" class="edit-label">NAME</label>
                <input type="text" class="MyInputs edit-service-input w-100" name="name" value="{{auth()->user()->name}}">
            </div>
            <div id="EditEmail" class="mt-2 w-100 px-3">
                <label for="email" class="edit-label">EMAIL</label>
                <input type="email" class="MyInputs edit-service-input" name="email" value="{{auth()->user()->email}}">
            </div>
            <div id="Editbirthday" class="mt-2 w-100 px-3">
                <label for="birthday" class="edit-label">BIRTHDAY</label>
                <input type="date" class="MyInputs edit-service-input" name="birthday" value="{{auth()->user()->birthday}}">
            </div>
            <div id="EditNewPassword" class="mt-2 w-100 px-3">
                <label for="newPassword" class="edit-label">NEW PASSWORD</label>
                <input type="password" class="MyInputs edit-service-input" name="newPassword" value="">
                <div id="passwordError" class="text-danger"></div>
            </div>
            <div id="EditName" class="mt-2 w-100 px-3">
                <label for="password" class="edit-label">ENTER YOU CURRENT PASSWORD</label>
                <input type="password" class="MyInputs edit-service-input" name="myPassword" value="">
            </div>
            <button type="submit" class="mb-2 mt-4">Save</button>
        </form>
    </div>
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('editImage');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
      </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<x-head :title="'My Profile'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=0" />
    <div id="profile" class="hasSideBar" >
        @if (isset($message))
            <x-alert :type="$type" :message="$message" />
        @endif
        <form id="edit-profile-form" action="{{route('edit-profile')}}" method="POST" class="d-flex flex-column align-items-center m-auto mt-5">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <div class="d-flex justify-content-center mt-4">
                <img id="editImage" src="images/defaultAvatar.jpg" alt="" class="rounded-circle" style="width:180px;height:180px;">
            </div>
            <div id="EditName" class="mt-2 w-100 ps-3 pe-3">
                <label for="name" class="edit-label">NAME</label>
                <input type="text" class="MyInputs w-100" name="name" value="{{auth()->user()->name}}">
            </div>
            <div id="EditEmail" class="mt-2 w-100 ps-3 pe-3">
                <label for="email" class="edit-label">EMAIL</label>
                <input type="email" class="MyInputs" name="email" value="{{auth()->user()->email}}">
            </div>
            <div id="Editbirthday" class="mt-2 w-100 ps-3 pe-3">
                <label for="birthday" class="edit-label">BIRTHDAY</label>
                <input type="date" class="MyInputs" name="birthday" value="{{auth()->user()->birthday}}">
            </div>
            <div id="EditNewPassword" class="mt-2 w-100 ps-3 pe-3">
                <label for="newPassword" class="edit-label">NEW PASSWORD</label>
                <input type="password" class="MyInputs" name="newPassword" value="">
                <div id="passwordError" class="text-danger"></div>
            </div>
            <div id="EditName" class="mt-2 w-100 ps-3 pe-3">
                <label for="password" class="edit-label">ENTER YOU CURRENT PASSWORD</label>
                <input type="password" class="MyInputs" name="password" value="">
            </div>
            <button type="submit" class="mb-2 mt-4">Save</button>
        </form>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
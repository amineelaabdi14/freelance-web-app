<!DOCTYPE html>
<html lang="en">
<x-head :title="'My Profile'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=0" />
    <div id="profile" class="hasSideBar">
        <form id="edit-profile-form" action="{{route('edit-profile')}}" method="POST" class="d-flex flex-column align-items-center m-auto mt-5">
            @csrf

            <div class="d-flex justify-content-center mt-4">
                <img id="editImage" src="images/defaultAvatar.jpg" alt="" class="rounded-circle" style="width:200px;height:200px;">
            </div>
            <div id="EditName" class="mt-2 w-100 ps-3 pe-3">
                <label for="edit-name" class="MyLabels">NAME</label>
                <input type="text" class="MyInputs w-100" name="edit-name" value="">
            </div>
            <div id="EditEmail" class="mt-2 w-100 ps-3 pe-3">
                <label for="edit-email" class="MyLabels">EMAIL</label>
                <input type="email" class="MyInputs" name="edit-email" value="">
            </div>
            <div id="Editbirthday" class="mt-2 w-100 ps-3 pe-3">
                <label for="birthday" class="MyLabels">BIRTHDAY</label>
                <input type="date" class="MyInputs" name="birthday" value="">
            </div>
            <div id="EditNewPassword" class="mt-2 w-100 ps-3 pe-3">
                <label for="edit-newpassword" class="MyLabels">NEW PASSWORD</label>
                <input type="password" class="MyInputs" name="edit-newpassword" value="">
                <div id="passwordError" class="text-danger"></div>
            </div>
            <div id="EditName" class="mt-2 w-100 ps-3 pe-3">
                <label for="edit-curentpassword" class="MyLabels">CURENT PASSWORD</label>
                <input type="password" class="MyInputs" name="edit-curentpassword" value="">
            </div>
            <button type="submit" class="mb-2">submitini hh</button>
        </form>
    </div>
</body>
</html>
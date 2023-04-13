<!DOCTYPE html>
<html lang="en">
<x-head :title="'My Profile'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=0" />
    <div id="profile" class="hasSideBar">
        <form action="{{route('edit-profile')}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <label for="newName">Name :</label>
            <input type="text" name="newName">

            <label for="newEmail">Email</label>
            <input type="email" name="newEmail">

            <label for="newPassword">New Password</label>
            <input type="password" name="newPassword">

            <label for="password">Pasword</label>
            <input type="password" name="password">
            
            <button type="submit">submitini hh</button>
        </form>
    </div>
</body>
</html>
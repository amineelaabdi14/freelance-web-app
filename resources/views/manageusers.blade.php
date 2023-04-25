<!DOCTYPE html>
<html lang="en">
<x-head :title="'Manage users'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=2" />
    <div class="hasNavBar hasSideBar">
      <div id="users-container" class="px-4 mt-4">
        <table id="userstable" class=" align-middle mb-0 bg-white" >
          <thead class="bg-light">
            <tr>
              <th>id</th>
              <th>User</th>
              <th>Title</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>
                <div class="d-flex align-items-center">
                  <img
                      src="{{asset('storage/'.$user->image)}}"
                      class="rounded-circle"
                      alt=""
                      style="width: 45px; height: 45px"
                      />
                  <a class="ms-3" href="{{route('manage-user',$user)}}">
                    <p class="fw-bold mb-1">{{$user->name}}</p>
                    <p class="text-muted mb-0">{{$user->email}}</p>
                  </a>
                </div>
              </td>
              <td>
                <p class="fw-normal mb-1">{{$user->job_title}}</p>
              </td>
              <td class="d-flex flex-row">
                  <button
                        type="button"
                        class="btn text-primary border-primary btn-rounded btn-sm fw-bold me-1"
                        data-mdb-ripple-color="dark"
                        >
                  Promote
                </button>
                <form action="{{route('restric-user',$user)}}" method=post>
                  @csrf
                  @method('delete')
                  <button
                        type="submit"
                        class="btn text-danger border-danger btn-rounded btn-sm fw-bold"
                        data-mdb-ripple-color="dark"
                        >
                  Restric
                </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
          <script>
          let table = new DataTable('#userstable');
          </script>
    </div>
</body>
</html>
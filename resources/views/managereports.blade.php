<!DOCTYPE html>
<html lang="en">
    <x-head :title="'Manage users'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=3" />
    <div class="hasNavBar hasSideBar">
        <table id="userstable" class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Reported user</th>
                <th>Title</th>
                <th>Total reports</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $service)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img
                        src="{{asset('storage/'.$service->user->image)}}"
                        class="rounded-circle"
                        alt=""
                        style="width: 45px; height: 45px"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$service->user->name}}</p>
                      <p class="text-muted mb-0">{{$service->user->email}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">{{$service->user->job_title}}</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{count($service->report)}}</p>
                  </td>
                <td>
                  <button
                          type="button"
                          class="btn text-danger border-danger btn-rounded btn-sm fw-bold"
                          data-mdb-ripple-color="dark"
                          >
                    Ban
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
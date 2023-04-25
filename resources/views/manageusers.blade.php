<!DOCTYPE html>
<html lang="en">
<x-head :title="'Manage users'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=2" />
    <div class="hasNavBar hasSideBar">
        <table id="userstable" class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>User</th>
                <th>Title</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                        class="rounded-circle"
                        alt=""
                        style="width: 45px; height: 45px"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1">Kate Hunington</p>
                      <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">Designer</p>
                </td>
                <td>
                    <button
                          type="button"
                          class="btn text-primary border-primary btn-rounded btn-sm fw-bold"
                          data-mdb-ripple-color="dark"
                          >
                    Promote
                  </button>
                  <button
                          type="button"
                          class="btn text-danger border-danger btn-rounded btn-sm fw-bold"
                          data-mdb-ripple-color="dark"
                          >
                    Ban
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</body>
</html>
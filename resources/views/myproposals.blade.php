<!DOCTYPE html>
<html lang="en">
<x-head :title="'My Proposals'" />
<body>
    <x-navbar />
    <x-sidebar :element="$element=2" />
    <div class="hasNavBar hasSideBar">
        <div id="users-container" class="px-4 mt-4">
            <table id="userstable" class=" align-middle mb-0 bg-white" >
              <thead class="bg-light">
                <tr>
                  <th>Service</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($proposals as $proposal)
                <tr>
                  <td>
                    {{$proposal->service->title}}
                  </td>
                  <td>
                    <p class="fw-normal mb-1 badge bg-black">{{$proposal->phone}}</p>
                  </td>
                  <td>
                    <p class="fw-normal mb-1">
                      {{$proposal->message}}
                    </p>
                  </td>
                  <td>
                      @if ($proposal->status==0)
                      <p class="fw-normal badge bg-warning mb-1">Pending</p>
                      @else
                      <p class="fw-normal badge bg-success mb-1">Done</p>
                      @endif
                  </td>
                  <td class="d-flex flex-row">
                    <form action="{{ route('mark-proposal',$proposal) }}" method=post>
                        @csrf
                        @method('put')
                        <button
                              type="submit"
                              class="btn text-success border-success me-1 btn-rounded btn-sm fw-bold"
                              data-mdb-ripple-color="dark"
                              >
                        Mark as done
                      </button>
                      </form>
                    <form action="{{ route('delete-proposal',$proposal) }}" method=post>
                      @csrf
                      @method('delete')
                      <button
                            type="submit"
                            class="btn text-danger border-danger btn-rounded btn-sm fw-bold"
                            data-mdb-ripple-color="dark"
                            >
                      Decline
                    </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>
<script>
let table = new DataTable('#userstable');
</script>
</div>
</body>
</html>
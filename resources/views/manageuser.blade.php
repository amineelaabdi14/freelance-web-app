<!DOCTYPE html>
<html lang="en">
<x-head :title="'Manage users'"/>
<body>
    <x-navbar />
    <x-sidebar :element="$elemnt=2" />
    <div class="hasNavBar hasSideBar">

        <div class="d-flex flex-column align-items-center pt-3 mt-3 px-4">

            <div id="manage-user-infos" class="d-flex flex-column align-items-center border border-1 rounded-1 mt-5 pt-4 m-auto m-xl-0 ">
                <img src="{{asset('storage/'.$user->image)}}" alt="" class="rounded-circle" style="width: 150px">
                    <div class="">
                        <strong class="fs-4 text-dark">{{$user->name}}</strong>
                        <span class="badge bg-primary ms-2">{{$user->job_title}}</span>
                    </div>
                    <button class="btn btn-primary mt-3 w-25">Chat</button>
                <div class="w-75 py-3">
                    <hr>
                    <div class="d-flex flex-wrap justify-content-between align-items-between w-100 mb-1 me-0">
                        <span class="text-secondary"><i class="fa-solid fa-envelope myIcon"></i>Email:</span>
                        <span class="text-break">{{$user->email}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100 mb-1">
                        <span class="text-secondary "><i class="fa-sharp fa-solid fa-location-dot myIcon"></i>City:</span>
                        <span class="">{{$user->city??'Unknown'}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100 mb-1">
                        <span class=" text-secondary"><i class="fa-solid fa-user myIcon"></i>Member since:</span>
                        <span class="">{{substr($user->created_at,0,4)}}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between w-100">
                        <span class=" text-secondary"><i class="fa-solid fa-phone myIcon"></i>Phone:</span>
                        <span class="">{{$user->phone??'Unknown'}}</span>
                    </div>
                </div>
            </div>

            <div id="manage-user-services" class="mt-5 px-4 w-100">
                <table id="userstable" class="position-static align-middle mb-0 bg-white" >
                    <thead class="bg-light">
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Reports</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allUserServices as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td><a href="{{route('show-service',$service)}}" target="_blank">{{$service->title}}</a></td>  
                            @if($service->deleted_at)
                            <td class="text-start"><span class="badge bg-danger">Deleted</span></td>
                            @else
                            <td class="text-start ps-3"><span class="badge bg-primary">Ative</span></td>
                            @endif
                            <td>{{count($service->report)}}</td>
                            @if(!$service->deleted_at)
                                <td><form action="{{route('delete-service-byadmin',$service)}}" method="post">@csrf @method('delete') <button class="btn text-danger border-1 border-danger" type="submit">Delete</button></form></td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="px-4 mt-4">
            <h4>Reports</h4>
            @if(isset($service->report[0]))
            <div class="m-auto d-flex justify-content-center mt-5">
                <img src="/images/nodata1.png" alt="" style="width:300px">
            </div>
            @endif
            <div class="d-flex flex-wrap px-5 justify-content-start">
                @foreach($services as $service)
                @foreach($service->report as $report)
                <div class="d-flex flex-start mb-4 w-50 rounded-2 p-3">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src=" {{asset('storage/'.$report->user->image)}}" width="60"
                      height="60" />
                    <div>
                      <h6 class="fw-bold mb-1">{{$report->user->name}}</h6>
                      <div class="d-flex align-items-center mb-4">
                        <p class="mb-0 fst-italic text-secondary" style="font-size:15px;">
                            {{substr($report->created_at,0,10)}}
                        </p>
                      </div>
                      <h6>{{$service->id .'|'.$service->title}} @if($service->deleted_at)
                        <td class="text-start"><span class="badge bg-danger">Deleted</span></td>
                        @else
                        <td class="text-start ps-3"><span class="badge bg-primary">Ative</span></td>
                        @endif</h6>
                      <p class="mb-0 text-secondary">
                        {{$report->message}}
                      </p>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <script>
        let table = new DataTable('#userstable');
        </script>
</body>
</html>
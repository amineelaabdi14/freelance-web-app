<!DOCTYPE html>
<html lang="en">
    <x-head :title="$service['title']" />
<body>
    <x-navbar />
    <div class="hasNavBar">
        <div id="product-container" class=" mt-5 d-flex flex-column flex-lg-row align-items-center justify-content-lg-around p-0 p-mg-5 m-auto" style="width:85%;">
            <div id="service-page-image" class="me-0 me-lg-5">
              <img src="{{asset('storage/'.$service['image'])}}" alt="" class="shadow-lg container p-0">
            </div>
            <div id="service-infos-container" class="d-flex flex-column align-content-start ps-4 justify-content-center ms-0 mt-5 mt-lg-0  ">
                <div class="">
                    <div class="d-flex flex-row justify-content-between">
                        <h2 class="mb-0 fs-4">
                            {{ $service['title'] }}
                        </h2>
                        <button class="border-0 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-sharp fa-solid fa-flag bg-white"></i>
                        </button>
                    </div>
                    <a href="{{route('get-user',$service->user)}}" target="_blank" class="text-decoration-underline">
                        {{ $service->user->name }}
                    </a>
                </div>
                <div id="sercive-page-description" class="mt-4 text-secondary">
                    <span>
                        {{$service['description']}}
                    </span>
                </div>
                <strong class="fs-4">{{$service['price']}} MAD / {{$service['work_time']}} </strong>
                <div class="d-flex flex-row justify-content-start w-100 mt-4">
                    <button class="btn btn-primary ">Chat</button>
                </div>
            </div>
        </div>
        <div id="comments-section" class="m-auto mt-5 mb-5" style="width:85%;">
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10">
                      <div class=" text-dark">
                        <div class="card-body p-4">
                          <h4 class="mb-5">Recent comments</h4>
                          @foreach($comments as $comment)
                        {{-- comment --}}
                          <div class="d-flex flex-start mb-4">
                            <img class="rounded-circle shadow-1-strong me-3"
                              src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar" width="60"
                              height="60" />
                            <div>
                              <h6 class="fw-bold mb-1">{{$comment->user->name}}</h6>
                              <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                  {{substr($comment->created_at,0,10)}}
                                </p>
                              </div>
                              <p class="mb-0">
                                {{$comment->comment}}
                              </p>
                            </div>
                          </div>
                          {{-- end  comment --}}
                          @endforeach
                        </div>
                        <hr class="my-0" />
                      </div>
                    </div>
                    <div class="mt-3">
                      {{$comments->links()}}
                    </div>
                    <form id="add-comment-form" action="{{route('add-comment',$service['id'])}}" method="POST" class="w-100 m-auto d-flex flex-column  align-items-center mt-5">
                      @csrf
                      <div class=" w-75">
                        <textarea  id="comment-input" cols="30" name="comment" rows="10" class="w-75 ps-2 border border-1 border-secondary rounded-1 w-100" placeholder="Enter your comment"></textarea>
                        <button class="btn btn-primary mt-4"  type="submit" style="width: 100px">Comment</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Submit a report</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route('report-service',$service['id'])}}" method="post">
              @csrf
              <label for="" class="MyLabels">Report message</label>
              <textarea name="reportMessage" id="" cols="20" rows="5" class="edit-service-input ps-3 pt-2"></textarea>
              <button type="submit" class="btn btn-danger">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <x-footer />
</body>
</html>
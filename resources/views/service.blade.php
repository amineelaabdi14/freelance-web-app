<!DOCTYPE html>
<html lang="en">
    <x-head :title="$service['title']" />
<body>
    <x-navbar />
    <div class="hasNavBar">
        <div id="product-container" class=" mt-5 d-flex flex-column flex-lg-row align-items-center justify-content-lg-around p-0 p-mg-5 m-auto" style="width:85%;">
            <div id="service-page-image" class="">
                <img src="/images/upload-service-image.png" alt="" class="shadow-lg container p-0">
            </div>
            <div id="service-infos-container" class="d-flex flex-column align-content-start ps-4 justify-content-center mt-5 mt-lg-0 ">
                <div class="">
                    <div class="d-flex flex-row justify-content-between">
                        <h2 class="mb-0 fs-4">
                            {{ $service['title'] }}
                        </h2>
                        <button class="border-0">
                            <i class="fa-sharp fa-solid fa-flag"></i>
                        </button>
                    </div>
                    <a href="{{route('get-user',$service->user)}}" class="text-decoration-underline">
                        {{ $service->user->name }}
                    </a>
                </div>
                <div id="sercive-page-description" class="mt-4 text-secondary">
                    <span>
                        {{$service['description']}}
                    </span>
                </div>
                <div class="d-flex flex-row justify-content-between w-100 mt-4">
                    <span><strong>2 day(s) of work</strong></span>
                    <button class="btn btn-primary ">Chat</button>
                </div>
            </div>
        </div>
        <div id="comments-section" class="m-auto mt-5 mb-5" style="width:85%;">
            {{-- <h3>Comments</h3>
            <div class="article-comment d-flex flex-row justify-content-start align-items-end">
                <img src="/images/defaultAvatar.jpg" class="rounded-circle" alt="" style="width:50px;height:50px;">
                <div>
                    <h6 class="comment-user text-decoration-underline mb-3"><a href="">Mohamed Amine El Aabdi</a></h6>
                    <span class="text-secondary fs-7">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</span>
                </div>
            </div> --}}
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10">
                      <div class=" text-dark">
                        <div class="card-body p-4">
                          <h4 class="mb-5">Recent comments</h4>
                        {{-- comment --}}
                          <div class="d-flex flex-start">
                            <img class="rounded-circle shadow-1-strong me-3"
                              src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar" width="60"
                              height="60" />
                            <div>
                              <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                              <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                  March 07, 2021
                                </p>
                              </div>
                              <p class="mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s, when an unknown printer took a galley of type and
                                scrambled it.
                              </p>
                            </div>
                          </div>
                          {{-- end  comment --}}
                        </div>
                        <hr class="my-0" />
                      </div>
                    </div>
                    <form id="add-comment-form" action="" class="w-75 d-flex flex-row justify-content-around mt-5">
                        <textarea name="" id="" cols="30" rows="10" class="w-75 ps-2 border border-1 border-secondary rounded-1" placeholder="Enter your comment"></textarea>
                        <button class="btn btn-primary">Comment</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    <x-footer />
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<x-head :title="'Home'" />
<body>
    <x-navbar />
    <div class="hasNavBar">
        <div>
            <img src="/images/construction-plumbing.jpeg" alt="" class="w-100 h-auto d-none d-lg-block">
        </div>
        <div class=" px-5 py-3 w-100 d-flex flex-wrap justify-content-around">
            @if(count($services)==0)
            <img src="/images/nomatch.png" alt="" class="object-fit-cover" style="max-width: 600px">
            @endif
            @foreach ($services as $service)
                <a href="{{route('show-service',$service)}}" class="mb-4 ">
                    <div class="card  myService-card ">
                        <img src="{{asset('storage/'.$service['image'])}}" class="card-img-top" alt="Hollywood Sign on The Hill" />
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{$service['title']}}</h5>
                            <p class="text-secondary mb-0">{{$service->user->job_title}}</p>
                            <strong>{{$service['price']}} Mad / {{$service['work_time']}}</strong>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-end pe-4">
            {{$services->links()}}
        </div>
        

    </div>
</body>
</html>
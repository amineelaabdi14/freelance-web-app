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
            <img src="/images/nomatch.png" alt="" class="" style="max-width: 600px">
            @endif
            @foreach ($services as $service)
                <a href="{{route('show-service',$service)}}" class="mb-4 ">
                    <div class="card h-70 myService-card ">
                        <img src="{{asset('storage/'.$service['image'])}}" class="card-img-top" alt="Hollywood Sign on The Hill" />
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{$service['title']}}</h5>
                            <strong>{{$service['price']}} Mad / {{$service['work_time']}}</strong>
                            <p class="card-text">
                                {{strlen($service['description'])>60 ? substr($service['description'] ,0,60)."...": $service['description']}}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{$services->links()}}

    </div>
</body>
</html>
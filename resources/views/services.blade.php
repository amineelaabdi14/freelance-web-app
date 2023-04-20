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
        @foreach ($services as $service)
            <a href="" class="d-flex justify-content-center flex-col mb-4">
                <div class="card h-70 myService-card">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                    alt="Hollywood Sign on The Hill" />
                <div class="card-body">
                    <h5 class="card-title">{{$service['title']}}</h5>
                    <p class="card-text">
                        {{strlen($service['description'])>60 ? substr($service['description'] ,0,60)."...": $service['description']}}
                    </p>
                </div>
                </div>
            </a>
        @endforeach
        </div>

        <div>
            <ul class="pagination d-flex flex-row justify-content-center">
                <li class="page-item {{ $services->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $services->previousPageUrl() }}" rel="prev">
                        Previous
                    </a>
                </li>
            
                @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                    <li class="page-item {{ $page === $services->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            
                <li class="page-item {{ $services->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $services->nextPageUrl() }}" rel="next">
                        Next
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
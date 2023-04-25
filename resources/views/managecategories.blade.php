<!DOCTYPE html>
<html lang="en">
<x-head :title="'Categories'" />
<body>
    <x-navbar />
    <x-sidebar :element="$element=3" />
    <div class="hasNavBar hasSideBar">
        <div class="d-flex flex-row justify-content-end px-4 pt-5">
        <button class="border-0 text-white btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="categoryCrud.reset()">
            Add category
        </button>

        </div>
        <div id="categories-container" class="px-4 pt-5">
            <table id="categoriesTable" class="position-static align-middle mb-0 bg-white" >
                <thead class="bg-light">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Services</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr class="myButtons"  onmouseover="showactions(this)" onclick="showactions(this)" onmouseout="hideactions(this)">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{count($category->service)}}</td>
                        <td class="d-flex justify-content-start myActions">
                            <button class="border-0 text-start" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                            onclick="fillEditCategory({{$category->id}},'{{$category->name}}')"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="border-0 "><form action="{{route('delete-category',$category->id)}}" method="post">@method('delete')@csrf <button type="submit" class="border-0"><i class="fa-solid fa-trash text-danger"></i></button></form></button>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="categoryCrud" action="{{route('add-category')}}" method="post">
                    @csrf
                    <label for="" class="MyLabels">Category name</label>
                    <input id="categoryInput" type="text" name="name" class="edit-service-input mb-3 ps-2" style="height: 45px">
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                </div>
            </div>
            </div>
        </div>

    <script>
        let table = new DataTable('#categoriesTable');
        </script>
</body>
</html>
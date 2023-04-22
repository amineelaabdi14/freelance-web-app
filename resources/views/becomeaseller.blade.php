<!DOCTYPE html>
<html lang="en">
<x-head :title="'Become a seller'" />
<body>
    <x-navbar />
    <div id="become-a-seller-page" class="hasNavBar">
        <h2 class="fw-bold text-center mt-4">Complete your registration in order to post in our website </h2>
        <form id="become_a_seller_form" action="" class="m-auto border border-1 bordee-primary rounded-1 shadow-lg p-5">
            <label for="" class="MyLabels">City :</label>
            <select name="" id="" class="edit-service-input become_seller_input ps-2"">
                @foreach($cities as $city)
                <option value="{{$city['id']}}" class="">{{$city['name']}}</option>
                @endforeach
            </select>
            <label for="" class="MyLabels">Job title</label>
            <input type="text" class="edit-service-input become_seller_input ps-2" placeholder="(Exp) Plumber ">

            <label for="" class="MyLabels">Phone</label>
            <input type="tel" class="edit-service-input become_seller_input ps-2" placeholder="+212 653 750 235">
            <label for="" class="MyLabels">About</label>
            <textarea name="" id="" rows="5" class="edit-service-input ps-2" placeholder="I am ... I do ..."></textarea>
            <button type="submit" class="btn btn-primary w-100 mt-2">Continue</button>
        </form>
    </div>
</body>
</html>
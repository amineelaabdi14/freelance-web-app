<div id="sideBar" class="shadow-lg MyNavigation position-absolute start-0 d-flex flex-column justify-content-between"style="">
    <ul id="sideList" class="d-flex align-items-start flex-column p-0 ps-md-2">
        <li class="liLinks text-dark btn mb-3 mt-4 d-flex flex-column flex-md-row align-items-center" ><i class="fa-solid fa-user b- fs-5"></i><a href="/profile" class="ms-3 d-none d-md-inline fw-semibold ">Profile</a></li> 

        <li class="liLinks text-dark btn mb-3 mt-1 d-flex flex-column flex-md-row align-items-center "><i class="fa-solid fa-chart-line fs-5"></i><a href="/dashboard" class="ms-3 d-none d-md-inline fw-semibold ">Dashboard</a></li> 

        <li class="liLinks text-dark btn mb-3 mt-1 d-flex flex-column flex-md-row align-items-center"><i class="fa-solid fa-message fs-5"></i></i><a href="/inbox" class="ms-3 d-none d-md-inline fw-semibold ">Inbox</a></li>
    </ul>
    <a id="signOutBtn" href="includes/signout.php?signout=1" class="d-block">
        <div class=" setRedColor d-flex flex-column flex-md-row justify-content-center align-items-center mb-5">
            <i class=" setRedColor fa-solid fa-right-from-bracket fs-5  m-auto m-md-0"></i>
            <span id="signOutText" class="setRedColor d-none d-md-inline ms-3" style="opacity: 0.9;">Sign Out</span>
        </div>
    </a>
    
</div>
<script>
    let element= {{$element}};
    document.querySelectorAll('li.liLinks')[element].style.backgroundColor="#038DFE";
    document.querySelectorAll('li.liLinks > i')[element].style.color="white";
    document.querySelectorAll('li.liLinks > a')[element].style.color="white";
</script>
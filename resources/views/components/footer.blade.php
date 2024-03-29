  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify"></p>Service.ma is Morocco's first app that connects users with trusted service providers for various tasks. Our mission is to make it easy for people to find reliable and affordable help for their everyday needs. We're committed to partnering with the best service providers in Morocco and supporting local businesses to create job opportunities. Thank you for choosing Service.ma!</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            @foreach([
              'Cleaning',
              'Landscaping',
              'Home Improvement',
              'Personal Care',
              'Baby sitting',
              'Transportation',
              'Education',
              'Technology'
          ] as $category)
            <li><a href="">{{$category}}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="http://scanfcode.com/about/">Services</a></li>
            <li><a href="http://scanfcode.com/contact/">Profile</a></li>
            <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Join us</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved .
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
          </ul>
        </div>
      </div>
    </div>
</footer>
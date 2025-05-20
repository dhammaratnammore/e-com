@extends('layout.master')
@section('titel','contact')
@section('content')

 <!-- testimonial section start -->
 <div class="testimonial_section layout_padding">
  <div class="container">
     <h1 class="watchs_taital">03<br>Testimonial</h1>
     <div class="testimonial_section_2">
        <div class="row">
           <div class="col-md-6">
              <div class="box_main">
                 <p class="testimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
              </div>
              <div class="client_main">
                 <div class="client_left">
                    <div class="client_img"><img src="images/client-img.png"></div>
                 </div>
                 <div class="client_right">
                    <h6 class="client_name">Jamesh Dame</h6>
                    <p class="customer_text">Customer</p>
                 </div>
              </div>
           </div>
           <div class="col-md-6">
              <div class="box_main">
                 <p class="testimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugia</p>
              </div>
              <div class="client_main">
                 <div class="client_left">
                    <div class="client_img"><img src="images/client-img1.png"></div>
                 </div>
                 <div class="client_right">
                    <h6 class="client_name">Jumini Kiri</h6>
                    <p class="customer_text">Customer</p>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="seemore_bt_1"><a href="#">See More</a></div>
  </div>
</div>
<!-- testimonial section end -->
<!-- contact section start -->
<div class="contact_section layout_padding">
  <div class="container">
     <h1 class="watchs_taital">04<br>Get In Touch</h1>
  </div>

  <div class="contact_section_2">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
            <form action="{{ url('/contactstore') }}" method="post" enctype="multipart/form-data">
               @csrf
              <div class="mail_section_1">
                 <input type="text" class="mail_text" placeholder="Your Name" name="name">
                 <input type="text" class="mail_text" placeholder="Phone Number" name="phone">
                 <input type="text" class="mail_text" placeholder="Email" name="email">
                 <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="massage"></textarea>
                 <div  class="send_bt"><button type="submit">submit</button></div>
              </div>
            </form>
           </div>
           <div class="col-md-6 padding_right_0">
              <div class="map_section"><img src="images/map-img.png"></div>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- contact section end -->

@endsection
@extends('layout.master')
@section('titel','home')
@section('content')


<!-- background bg start -->
<div class="background_bg">
  <!-- watchs section start -->
  <div class="watchs_section layout_padding">
     <div class="container">
        <h1 class="watchs_taital">01<br>Our Watchs</h1>
        <div class="watchs_section_2">
           <div class="row">
              <div class="col-md-6">
                 <div class="image_1"><img src="images/img-1.png"></div>
              </div>
              <div class="col-md-6">
                 <h4 class="uni_text">Uni Watch</h4>
                 <p class="watchs_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                 <h4 class="rate_text"><span style="color: #b60213;">$</span>100</h4>
                 <div class="read_bt1"><a href="#">Buy Now</a></div>
              </div>
           </div>
        </div>
        <div class="watchs_section_3">
           <div class="row">
              <div class="col-md-6">
                 <h4 class="uni_text">Uni Watch</h4>
                 <p class="watchs_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                 <h4 class="rate_text"><span style="color: #b60213;">$</span>100</h4>
                 <div class="read_bt1"><a href="#">Buy Now</a></div>
              </div>
              <div class="col-md-6">
                 <div class="image_2"><img src="images/img-2.png"></div>
              </div>
           </div>
        </div>
        <div class="seemore_bt"><a href="#">See More</a></div>
     </div>
  </div>
  <!-- watchs section end -->
  <!-- about section start -->
  <div class="about_section layout_padding">
     <div class="container">
        <h1 class="watchs_taital">02<br>About Shop</h1>
        <div class="about_section_2">
           <div class="row">
              <div class="col-md-6">
                 <p class="about_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                 <div class="read_bt1"><a href="#">Buy Now</a></div>
              </div>
              <div class="col-md-6">
                 <div class="image_2"><img src="images/img-3.png"></div>
              </div>
           </div>
        </div>
        <div class="about_section_3">

           <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
    @foreach ($category as $cat)
    <div class="col-md-3" style="flex: 1 1 22%; max-width: 22%; min-width: 250px; margin-bottom: 20px;">
        <div style="
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        " 
        onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.2)';" 
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
            <div style="overflow: hidden;">
                <img src="{{ url('/uplode/'.$cat->image) }}" 
                     style="width: 100%; height: 200px; object-fit: cover; transition: transform 0.3s ease;" 
                     onmouseover="this.style.transform='scale(1.05)';" 
                     onmouseout="this.style.transform='scale(1)';">
            </div>
        </div>
    </div>
    @endforeach
</div>

        </div>
     </div>
  </div>
  <!-- about section end -->
 
</div>

<!-- background bg end -->

@endsection
@extends('layout.master')
@section('titel','service')
@section('content')

<div class="watchs_section layout_padding">
  <div class="container">
    <h1 class="watchs_taital">01<br>Our Watchs</h1>
    
    @foreach ($product as $key => $pro)
        @php
            $isEven = $key % 2 == 0;
        @endphp

        <div class="watchs_section_{{ $isEven ? '2' : '3' }}">
            <div class="row">
                @if ($isEven)
                    <div class="col-md-6">
                        <div class="image_1">
                            <img src="{{ url('/uplode/'.$pro->image) }}" alt="Watch Image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="uni_text">{{ $pro->name ?? 'Watch Name' }}</h4>
                        <p class="watchs_text">{{ $pro->description ?? 'Product description not available.' }}</p>
                        <h4 class="rate_text">
                            <span style="color: #b60213;">$</span>{{ $pro->price ?? '100' }}
                        </h4>
                        <div class="read_bt1"><a href="{{ route('addtocart',['id'=>$pro->id]) }}">Add to Cart</a></div>
                    </div>
                @else
                    <div class="col-md-6">
                        <h4 class="uni_text">{{ $pro->name ?? 'Watch Name' }}</h4>
                        <p class="watchs_text">{{ $pro->description ?? 'Product description not available.' }}</p>
                        <h4 class="rate_text">
                            <span style="color: #b60213;">$</span>{{ $pro->price ?? '100' }}
                        </h4>
                        <div class="read_bt1"><a href="{{ route('addtocart',['id'=>$pro->id]) }}">Add to Cart</a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="image_2">
                            <img src="{{ url('/uplode/'.$pro->image) }}" alt="Watch Image">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach

    <div class="seemore_bt"><a href="#">See More</a></div>
</div>

</div>

@endsection
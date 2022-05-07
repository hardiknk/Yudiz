{{-- Header-Start --}}
<header>
    <div class="bottom_header">
        <div class="container">
            <div class="hamburger">
                <span><i class="fas fa-bars"></i></span>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    @foreach ($all_category as $category)
                        <li><a href="#"> {{ $category->cat_name }} </a></li>
                    @endforeach
                    <li><a href="">More..</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="top_header">
            <div class="logo">
                <a href=" {{ route('home') }} "><img src="{{ asset('frontend/img/logo.jpg') }}" alt=""
                        srcset=""></a>
            </div>
            <div class="search_box">
                <form action="">
                    <input type="text" placeholder="Search...." class="form-control">
                    <button class="btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="social_media">
                <ul>
                    {{-- @php
                    dd($social_media['5']);
                    @endphp
                    @foreach ($social_media as $social)
                    @endforeach --}}
                    <li><a href="{{ $social_media['4']['value'] }} " target="_blank"><img
                                src="{{ asset('frontend/img/fb.png') }}" alt="facebook"></a></li>
                    <li><a href="{{ $social_media['6']['value'] }}" target="_blank"><img
                                src="{{ asset('frontend/img/insta.png') }}" alt="instagram"></a></li>
                    <li><a href="{{ $social_media['5']['value'] }}" target="_blank"><img
                                src="{{ asset('frontend/img/twiter.png') }}" alt="twitter"></a></li>
                    <li><a href="{{ $social_media['7']['value'] }}" target="_blank"><img
                                src="{{ asset('frontend/img/yt.png') }}" alt="Youtube"></a></li>
                </ul>
            </div>
        </div>

    </div>
</header>
{{-- header end --}}

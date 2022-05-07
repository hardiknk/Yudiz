@extends('front.common.app')
@section('content')
    <section class="row-am">
        <div class="container">
            <a href="news.html" class="breaking_news">
                <h3>BREAKING NEWS</h3>
                <div class="text">
                    <p>- Zelensky says everybody involved in Kramatorsk attack will be held accountable</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Main-Content -->
    <section>
        {{-- this three image section is pending --}}
        <div class="container">
            <div class="main_news">
                <div class="news">
                    <figure>
                        <img src="{{ asset('frontend/img/main_news1.jpg') }}">
                    </figure>
                    <figcaption>
                        <a href="news-details.html">Twitter appoints Elon Musk to its board, tweets CEO Parag
                            Agrawal</a>
                    </figcaption>
                </div>
                <div class="news">
                    <figure>
                        <img src="{{ asset('frontend/img/main_news3.jpg') }}">
                    </figure>
                    <figcaption>
                        <a href="news-details.html">Dasvi actor Abhishek Bachchan says cinema is responsible...</a>
                    </figcaption>
                </div>
                <div class="news">
                    <figure>
                        <img src="{{ asset('frontend/img/main_news2.jpg') }}">
                    </figure>
                    <figcaption>
                        <a href="news-details.html">Pakistan PM Imran Khan to hold rally in Islamabad tonight</a>
                    </figcaption>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest-News -->
    <section class="row_am latest_news_slider">
        <div class="container">
            <div class="heading">
                <div class="title">
                    <h2>Latest News</h2>
                </div>
                {{-- <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div> --}}
            </div>
            <div id="latest_news_section" class="owl-carousel owl-theme">
                @foreach ($latest_news_data as $news_data)
                    <div class="item">
                        <div class="latest_news">
                            <a href="{{ route('all_news_by_category', ['cat_id' => $news_data->cat_id]) }}">
                                <span class="tags"> {{ $news_data->category->cat_name }} </span>
                                <figure>
                                    @if ($news_data->banner_img)
                                        <img src="{{ url('storage/' . $news_data->banner_img) }}">
                                    @else
                                        <img src="{{ asset('frontend/img/latest_news.jpg') }}">
                                    @endif

                                </figure>
                            </a>
                            <figcaption>
                                <h4 class="news_title"><a
                                        href="{{ route('all_news_by_category', ['cat_id' => $news_data->cat_id]) }}">
                                        {{ $news_data->title }} </a>
                                </h4>
                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                        <span> {{ $news_data->created_at }} </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i>
                                        <span> {{ $news_data->created_by }} </span>
                                    </li>
                                </ul>
                            </figcaption>
                        </div>
                    </div>
                @endforeach

                {{-- start of the latest news  is dyanamic --}}
                {{-- <div class="item">
                    <div class="latest_news">
                        <a href="#">
                            <span class="tags">War</span>
                            <figure>
                                <img src="{{ asset('frontend/img/latest_news.jpg') }}">
                            </figure>
                        </a>
                        <figcaption>
                            <h4 class="news_title"><a href="#">IPL 2021: Schedule, Date, Auction, Team List</a>
                            </h4>
                            <ul>
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>30-03-2022</span>
                                </li>
                                <li>
                                    <i class="fas fa-user"></i>
                                    <span>Hardik K</span>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div> --}}
                {{-- end of the section is dynamic  latest news --}}
            </div>
        </div>
    </section>

    <!-- All-News-Section -->
    <section class="row_am side_bar_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="main_category_post">
                        <div class="heading">
                            <div class="title">
                                <h2> {{ $first_category_data->cat_name }} </h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="main_new_post">
                            <div class="post">
                                <span class="tags"> {{ $first_category_data->cat_name }} </span>
                                @if ($first_category_data->news[0])
                                    <figure>
                                        {{-- route('all_news_by_category', ['cat_id' => $news_data->cat_id]) --}}
                                        <a href="{{ route('news_details', ['news_id' => $news_data->id]) }}"> <img
                                                src="{{ url('storage/' . $first_category_data->news[0]->banner_img) }}"></a>
                                    </figure>
                                    <figcaption>
                                        <h4><a
                                                href="{{ route('news_details', ['news_id' => $news_data->id]) }}">{{ $first_category_data->news[0]->title }}</a>
                                        </h4>
                                    </figcaption>
                                @endif
                            </div>
                            <div class="side_list_block">
                                <ul>
                                    {{-- here we display the four static image --}}
                                    @foreach ($first_category_data->news as $keys_news => $news_data_item)
                                        @if ($keys_news < 4 && $keys_news != 0)
                                            <li>
                                                <a href=" {{ route('news_details', ['news_id' => $news_data_item->id]) }} "
                                                    class="post_block">
                                                    <figure class="img_block"><img
                                                            src="{{ url('storage/' . $news_data_item->banner_img) }}">
                                                    </figure>
                                                    <figcaption class="text">
                                                        <span> {{ $news_data_item->title }} </span>
                                                        <ul class="date_name">
                                                            <li>
                                                                <i class="fas fa-calendar-alt"></i>
                                                                <span> {{ $news_data_item->created_at }}
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-user"></i>
                                                                <span> {{ $news_data_item->created_by }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ad">
                        <img src="{{ asset('frontend/img/ad1.jpg') }}">
                    </div>
                    @foreach ($all_category_news as $cat_news_all)
                        <div class="category_block">
                            <div class="heading">
                                <div class="title">
                                    <h2> {{ $cat_news_all->cat_name }} </h2>
                                </div>
                                <div class="view_all">
                                    <a href="{{ route('all_news_by_category', ['cat_id' => $cat_news_all->id]) }}"
                                        class="btn">View All</a>
                                </div>
                            </div>
                            <div class="news_category">
                                @foreach ($cat_news_all->news as $key_item_news => $news_item)
                                    @if ($key_item_news < 2)
                                        <a href=" {{ route('news_details', ['news_id' => $news_item->id]) }} "
                                            class="news_cat">
                                            <span class="tags"> {{ $news_item->category->cat_name }} </span>
                                            <figure>
                                                <img src="{{ url('storage/' . $news_item->banner_img) }}">
                                            </figure>
                                            <figcaption>
                                                <h4 class="news_title">{{ $news_item->title }}</h4>
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-calendar-alt"></i>
                                                        <span> {{ $news_item->created_at }} </span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-user"></i>
                                                        <span> {{ $news_item->created_by }} </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </a>
                                    @endif
                                @endforeach
                                {{-- <a href="#" class="news_cat">
                                    <span class="tags">Bollywood</span>
                                    <figure>
                                        <img src="{{ asset('frontend/img/cat.jpg') }}">
                                    </figure>
                                    <figcaption>
                                        <h4 class="news_title">The comments come after Moscow
                                            said it would drastically reduce...</h4>
                                        <ul>
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>30-03-2022</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <span>Hardik K</span>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </a> --}}
                            </div>
                        </div>
                    @endforeach



                    <div class="main_category_post">
                        <div class="heading">
                            <div class="title">
                                <h2> {{ $last_category_data->cat_name }} </h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="main_new_post">
                            <div class="post">
                                @if ($last_category_data->news[0])
                                    <figure>
                                        <a
                                            href=" {{ route('news_details', ['news_id' => $last_category_data->news[0]->id]) }} ">
                                            <img src="{{ url('storage/' . $last_category_data->news[0]->banner_img) }}">
                                        </a>
                                    </figure>
                                    <figcaption>
                                        <h4><a
                                                href=" {{ route('news_details', ['news_id' => $last_category_data->news[0]->id]) }} ">
                                                {{ $last_category_data->news[0]->title }} </a>
                                        </h4>
                                    </figcaption>
                                @endif
                            </div>
                            <div class="side_list_block">
                                <ul>
                                    @foreach ($last_category_data->news as $keys_news_d => $news_data_item_last)
                                        @if ($keys_news_d < 4 && $keys_news_d != 0)
                                            <li>
                                                <a href="#" class="post_block">
                                                    <figure class="img_block"><img
                                                            src="{{ url('storage/' . $news_data_item_last->banner_img) }}">
                                                    </figure>
                                                    <figcaption class="text">
                                                        <span> {{ $news_data_item_last->title }} </span>
                                                        <ul class="date_name">
                                                            <li>
                                                                <i class="fas fa-calendar-alt"></i>
                                                                <span> {{ $news_data_item_last->created_at }}
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-user"></i>
                                                                <span> {{ $news_data_item_last->created_by }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- sidebar section start right side --}}
                @include('front.common.right')
                {{-- sidebar section end right side --}}
            </div>
        </div>
    </section>

    <!-- Latest-News -->
    <section class="row_am latest_news_slider pt-0 mb-5">
        <div class="container">
            <div class="heading">
                <div class="title">
                    <h2>Latest News</h2>
                </div>
                {{-- <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div> --}}
            </div>
            <div id="other_news_section" class="owl-carousel owl-theme">
                @foreach ($latest_news_data as $news_data)
                    <div class="item">
                        <div class="latest_news">
                            <a href="{{ route('all_news_by_category', ['cat_id' => $news_data->cat_id]) }}">
                                <span class="tags"> {{ $news_data->category->cat_name }} </span>
                                <figure>
                                    @if ($news_data->banner_img)
                                        <img src="{{ url('storage/' . $news_data->banner_img) }}">
                                    @else
                                        <img src="{{ asset('frontend/img/latest_news.jpg') }}">
                                    @endif

                                </figure>
                            </a>
                            <figcaption>
                                <h4 class="news_title"><a
                                        href="{{ route('all_news_by_category', ['cat_id' => $news_data->cat_id]) }}">
                                        {{ $news_data->title }} </a>
                                </h4>
                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                        <span> {{ $news_data->created_at }} </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i>
                                        <span> {{ $news_data->created_by }} </span>
                                    </li>
                                </ul>
                            </figcaption>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

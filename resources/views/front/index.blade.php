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
                <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div>
            </div>
            <div id="latest_news_section" class="owl-carousel owl-theme">
                <div class="item">
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
                </div>
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
                                <h2>News Category</h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="main_new_post">
                            <div class="post">
                                <span class="tags">Tech</span>
                                <figure>
                                    <a href="news-details.html"> <img
                                            src="{{ asset('frontend/img/main_news1.jpg') }}"></a>
                                </figure>
                                <figcaption>
                                    <h4><a href="news-details.html">The newly appointed Twitter CEO Parag Agrawal
                                            believes that the Tesla CEO will “bring great value” to the board.</a>
                                    </h4>
                                </figcaption>
                            </div>
                            <div class="side_list_block">
                                <ul>
                                    <li>
                                        <a href="#" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest01.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Dasvi actor Abhishek Bachchan says cinema is
                                                    responsible..</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest02.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Twitter appoints Elon Musk to its board, tweets CEO Parag
                                                    Agrawal</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest03.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Pakistan PM Imran Khan to hold rally in Islamabad
                                                    tonight</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ad">
                        <img src="{{ asset('frontend/img/ad1.jpg') }}">
                    </div>
                    <div class="category_block">
                        <div class="heading">
                            <div class="title">
                                <h2>News Category</h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="news_category">
                            <a href="#" class="news_cat">
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
                            </a>
                            <a href="#" class="news_cat">
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
                            </a>
                        </div>
                    </div>
                    <div class="category_block">
                        <div class="heading">
                            <div class="title">
                                <h2>News Category</h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="news_category">
                            <a href="#" class="news_cat">
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
                            </a>
                            <a href="#" class="news_cat">
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
                            </a>
                        </div>
                    </div>
                    <div class="category_block">
                        <div class="heading">
                            <div class="title">
                                <h2>News Category</h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="news_category">
                            <a href="#" class="news_cat">
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
                            </a>
                            <a href="#" class="news_cat">
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
                            </a>
                        </div>
                    </div>
                    <div class="main_category_post">
                        <div class="heading">
                            <div class="title">
                                <h2>News Category</h2>
                            </div>
                            <div class="view_all">
                                <a href="news.html" class="btn">View All</a>
                            </div>
                        </div>
                        <div class="main_new_post">
                            <div class="post">
                                <figure>
                                    <a href="news-details.html"> <img
                                            src="{{ asset('frontend/img/main_news1.jpg') }}"></a>
                                </figure>
                                <figcaption>
                                    <h4><a href="news-details.html">The newly appointed Twitter CEO Parag Agrawal
                                            believes that the Tesla CEO will “bring great value” to the board.</a>
                                    </h4>
                                </figcaption>
                            </div>
                            <div class="side_list_block">
                                <ul>
                                    <li>
                                        <a href="news-details.html" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest01.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Dasvi actor Abhishek Bachchan says cinema is
                                                    responsible..</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
                                    <li>
                                        <a href="news-details.html" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest02.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Twitter appoints Elon Musk to its board, tweets CEO Parag
                                                    Agrawal</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
                                    <li>
                                        <a href="news-details.html" class="post_block">
                                            <figure class="img_block"><img
                                                    src="{{ asset('frontend/img/latest03.jpg') }}"></figure>
                                            <figcaption class="text">
                                                <span>Pakistan PM Imran Khan to hold rally in Islamabad
                                                    tonight</span>
                                                <ul class="date_name">
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
                                        </a>
                                    </li>
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
                <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div>
            </div>
            <div id="other_news_section" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="latest_news">
                        <a href="news-details.html">
                            <span class="tags">War</span>
                            <figure>
                                <img src="{{ asset('frontend/img/latest_news.jpg') }}">
                            </figure>
                        </a>
                        <figcaption>
                            <h4 class="news_title"><a href="news-details.html">IPL 2021: Schedule, Date,
                                    Auction, Team List</a></h4>
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
                </div>
            </div>
        </div>
    </section>
@endsection

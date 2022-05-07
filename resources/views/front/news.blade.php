@extends('front.common.app')
@section('content')
    <!-- Bread-Crumb -->
    <section class="bread_crumb">
        <div class="container">
            <ul>
                <li><a href=" {{ route('index') }} ">Home <i class="fas fa-angle-double-right"></i></a></li>
                <li>
                    <p> {{ $cat_details->cat_name }} News</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- All-News-Section -->
    <section class="row_am side_bar_section news_block_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="category_block">
                        <div class="heading">
                            <div class="title">
                                <h2> {{ $cat_details->cat_name }} News</h2>
                            </div>
                        </div>
                        <div class="news_category">
                            @foreach ($news_details as $news_detail)
                                <a href=" {{ route('news_details', ['news_id' => $news_detail->id]) }} "
                                    class="news_cat">
                                    <figure>
                                        <img src="{{ url('storage/' . $news_detail->banner_img) }}">
                                    </figure>
                                    <figcaption>
                                        <h4 class="news_title"> {{ $news_detail->title }} </h4>
                                        <ul>
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span> {{ $news_detail->created_at }} </span>
                                            </li>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <span> {{ $news_detail->created_by }} </span>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </a>
                            @endforeach



                        </div>
                    </div>
                </div>
                @include('front.common.right')
            </div>
        </div>
    </section>
@endsection

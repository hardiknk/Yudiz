@extends('front.common.app')
@section('content')
    <!-- Bread-Crumb -->
    <section class="bread_crumb">
        <div class="container">
            <ul>
                <li><a href=" {{ route('index') }} ">Home <i class="fas fa-angle-double-right"></i></a></li>
                <li><a href=" {{ route('all_news_by_category', ['cat_id' => $news_data->category->id]) }} ">
                        {{ $news_data->category->cat_name }} <i class="fas fa-angle-double-right"></i></a></li>
                <li>
                    {{-- <p>The comments come after Moscow</p> --}}
                    @php
                        $words = explode(' ', $news_data->title);
                        $news_title_custom = join(' ', array_slice($words, 0, 6));
                    @endphp
                    <p> {{ $news_title_custom . ' ....' }} </p>
                </li>
            </ul>
        </div>
    </section>

    <!-- All-News-Section -->
    <section class="row_am side_bar_section news_block_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="main_news_details">
                        {!! $news_data->description !!}
                    </div>
                </div>
                @include('front.common.right')
            </div>
        </div>
    </section>
@endsection

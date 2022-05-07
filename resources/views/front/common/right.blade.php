{{-- sidebar section start right side --}}
@php
$popular_news_data = App\Models\News::where('is_popular', '=', 'y')
    ->limit(10)
    ->get();
@endphp
<div class="col-lg-4 col-md-12">
    <div class="tags_list">
        <div class="heading mt-1">
            <div class="title">
                <h2>Tags Category</h2>
            </div>
        </div>
        <ul>
            @foreach ($all_category as $category)
                <li><a href=" {{ route('all_news_by_category', ['cat_id' => $category->id]) }} ">
                        {{ $category->cat_name }} </a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="side_bar">
        <div class="side_post_block">
            <div class="heading">
                <div class="title">
                    <h2>Popular Post</h2>
                </div>
                {{-- <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div> --}}
            </div>
            @if ($popular_news_data[0])
                <a href="{{ route('news_details', ['news_id' => $popular_news_data[0]->id]) }}"
                    class="news_cat common_news">
                    {{-- <span class="tags">Bollywood</span> --}}
                    <figure>
                        <img src="{{ url('storage/' . $popular_news_data[0]->banner_img) }}">
                    </figure>
                    <figcaption>
                        <h4 class="news_title"> {{ $popular_news_data[0]->title }} </h4>
                        <ul>
                            <li>
                                <i class="fas fa-calendar-alt"></i>
                                <span> {{ $popular_news_data[0]->created_at }} </span>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <span> {{ $popular_news_data[0]->created_by }} </span>
                            </li>
                        </ul>
                    </figcaption>
                </a>
            @endif
            <div class="side_list_block">
                <ul>
                    @foreach ($popular_news_data as $keys_news => $item)
                        @if ($keys_news >= 1)
                            <li>
                                <a href=" {{ route('news_details', ['news_id' => $item->id]) }} " class="post_block">
                                    <figure class="img_block"><img
                                            src="{{ url('storage/' . $item->banner_img) }}">
                                    </figure>
                                    <figcaption class="text">
                                        <span> {{ $item->title }} </span>
                                        <ul class="date_name">
                                            <li>
                                                <i class="fas fa-calendar-alt"></i>
                                                <span> {{ $item->created_at }} </span>
                                            </li>
                                            <li>
                                                <i class="fas fa-user"></i>
                                                <span> {{ $item->created_by }} </span>
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
        {{-- <div class="side_post_block">
            <div class="heading">
                <div class="title">
                    <h2>Bollywood</h2>
                </div>
                <div class="view_all">
                    <a href="news.html" class="btn">View All</a>
                </div>
            </div>
            <a href="#" class="news_cat common_news">
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
            <div class="side_list_block">
                <ul>
                    <li>
                        <a href="#" class="post_block">
                            <figure class="img_block"><img src="{{ asset('frontend/img/latest01.jpg') }}">
                            </figure>
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
                </ul>
            </div>
        </div>
        <div class="ad">
            <img src="{{ asset('frontend/img/ad2.jpg') }}">
        </div> --}}
    </div>
</div>
{{-- sidebar section end right side --}}

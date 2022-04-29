   <!-- Header-Start -->
   <header>
       <div class="bottom_header">
           <div class="container">
               <div class="hamburger">
                   <span><i class="fas fa-bars"></i></span>
               </div>
               <nav>
                   <ul>
                       <li><a href="index.html">Home</a></li>
                       <li><a href="news.html">Sports</a></li>
                       <li><a href="news.html">About</a></li>
                       <li><a href="news.html">Life Style</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">Menu Name</a></li>
                       <li><a href="news.html">More..</a></li>
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
                       <li><a href="#"><img src="{{ asset('frontend/img/fb.png') }}" alt="facebook"></a></li>
                       <li><a href="#"><img src="{{ asset('frontend/img/insta.png') }}" alt="instagram"></a></li>
                       <li><a href="#"><img src="{{ asset('frontend/img/twiter.png') }}" alt="twitter"></a></li>
                       <li><a href="#"><img src="{{ asset('frontend/img/yt.png') }}" alt="Youtube"></a></li>
                   </ul>
               </div>
           </div>

       </div>
   </header>

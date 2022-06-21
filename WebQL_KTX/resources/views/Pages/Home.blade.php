@extends('Website_Layout')
@section('Website_content')


    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('public/frontend/img/slide3.png');">
                    <div class="img-bg-inner" style="text-align: center; color: black;" >
                      <h2>XÂY DỰNG HỆ THỐNG KÝ TÚC XÁ TRỞ THÀNH MÔI TRƯỜNG</h2>
                     <p>RÈN LUYỆN - HỌC TẬP; MÔI TRƯỜNG SỐNG XANH, SỐNG HẠNH PHÚC CỦA SINH VIÊN.</p> 
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('public/frontend/img/slide2.jpg');">
                    <div class="img-bg-inner">
                      <!-- <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2> -->
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p> -->
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('public/frontend/img/slide1.jpg');">
                    <div class="img-bg-inner">
     <!--                  <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2> -->
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p> -->
                    </div>
                  </a>
                </div>

              <!--   <div class="swiper-slide">
                  <a href="" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-4.jpg');">
                    <div class="img-bg-inner">
                      <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div> -->
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
   <!--  <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">
              <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
              <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

              <div class="d-flex align-items-center author">
                <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0">Cameron Williamson</h3>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                </div>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                  <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                </div>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Design</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                  <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                </div>
              </div>
              <div class="col-lg-4 border-start custom-border">
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                </div>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                  <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                </div>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Travel</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                </div>
              </div>

           
              <div class="col-lg-4">

                <div class="trending">
                  <h3>Trending</h3>
                  <ul class="trending-post">
                    <li>
                      <a href="single-post.html">
                        <span class="number">1</span>
                        <h3>The Best Homemade Masks for Face (keep the Pimples Away)</h3>
                        <span class="author">Jane Cooper</span>
                      </a>
                    </li>
                    <li>
                      <a href="single-post.html">
                        <span class="number">2</span>
                        <h3>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h3>
                        <span class="author">Wade Warren</span>
                      </a>
                    </li>
                    <li>
                      <a href="single-post.html">
                        <span class="number">3</span>
                        <h3>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h3>
                        <span class="author">Esther Howard</span>
                      </a>
                    </li>
                    <li>
                      <a href="single-post.html">
                        <span class="number">4</span>
                        <h3>9 Half-up/half-down Hairstyles for Long and Medium Hair</h3>
                        <span class="author">Cameron Williamson</span>
                      </a>
                    </li>
                    <li>
                      <a href="single-post.html">
                        <span class="number">5</span>
                        <h3>Life Insurance And Pregnancy: A Working Mom’s Guide</h3>
                        <span class="author">Jenny Wilson</span>
                      </a>
                    </li>
                  </ul>
                </div>

              </div> 
            </div>
          </div>

        </div> 
      </div>
    </section> --> 

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Sự kiện nổi bật</h2>
        
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="d-lg-flex post-entry-2">
              <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="{{asset('public/frontend/img/skien.jpg')}}" alt="" class="img-fluid">
              </a>
              <div>

                <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>04 THÁNG 06 2022</span></div>
                <h3><a href="single-post.html">Đà Nẵng vững bước trên hành trình chuyển đổi số: Đào tạo, chuẩn bị nguồn nhân lực chuyển đổi số</a></h3>
                <p>Chuyển đổi số đang đi sâu vào từng ngành, từng lĩnh vực, tạo ra cuộc cách mạng về năng suất lao động, văn hóa tổ chức và làm thay đổi thói quen, cuộc sống của mỗi người.</p>
                <a href=""><img src="{{asset('public/frontend/img/1.jpg')}}" alt="" class="img-fluid"></a>
              </div>

            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="post-entry-1 border-bottom">
                  
                  <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>29 THÁNG 05 2022</span></div>
                  <h2 class="mb-2"><a href="single-post.html">Các giảng viên của Trường ĐH Sư phạm Kỹ thuật được Thành phố Đà Nẵng khen thưởng vì có thành tích trong hoạt động khoa học công nghệ, sáng tạo kỹ thuật</a></h2>
              
                  <p class="mb-4 d-block">Các giảng viên của Trường Đại học Sư phạm Kỹ thuật - Đại học Đà Nẵng đã được nhận Bằng khen của Chủ tịch Ủy ban Nhân dân và của Ban tổ chức Hội thi STKT thành</p>
                  <a href=""><img src="{{asset('public/frontend/img/2.jpg')}}" alt="" class="img-fluid"></a>
                </div>
                
                <div class="post-entry-1">
                  <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>28 THÁNG 05 2022</span></div>
                  <h2 class="mb-2"><a href="single-post.html">Trường ĐH Sư phạm Kỹ thuật tổ chức Hội nghị tổng kết hoạt động sinh viên NCKH - Triển lãm sản phẩm khoa học của sinh viên năm 2022 và Lễ ký kết hợp tác với doanh nghiệp</a></h2>
                  <p class="mb-4 d-block">Ngày 27/5/2022, Trường Đại học Sư phạm Kỹ thuật – Đại học Đà Nẵng tổ chức Hội nghị tổng kết hoạt động sinh viên nghiên cứu khoa học, Triển lãm sản phẩm khoa học</p>
                   <a href=""><img src="{{asset('public/frontend/img/3.jpg')}}" alt="" class="img-fluid"></a>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="post-entry-1">
                
                  <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>26 THÁNG 05 2022
</span></div>
                  <h2 class="mb-2"><a href="single-post.html">Nhiều giải pháp nâng cao hiệu quả quảng bá Trường Đại học Sư phạm Kỹ thuật tại cuộc họp giao ban công tác truyền thông</a></h2>
                 
                  <p class="mb-4 d-block">Ngày 25/5/2022, Trường Đại học Sư phạm Kỹ thuật đã tổ chức cuộc họp giao ban công tác truyền thông năm học 2021-2022; PGS. TS. Võ Trung Hùng - Phó Hiệu trưởng đã</p>
                  <a href=""><img src="{{asset('public/frontend/img/4.jpg')}}" alt="" class="img-fluid"></a>
                </div>
                <div class="post-entry-1">
                
                  <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>23 THÁNG 05 2022

</span></div>
                  <h2 class="mb-2"><a href="single-post.html">Hơn 900 thí sinh tham dự Kỳ thi Đánh giá năng lực đợt 2 do ĐHQG Thành phố Hồ Chí Minh tổ chức tại Trường ĐH Sư phạm Kỹ thuật – ĐH Đà Nẵng</a></h2>
                 
                  <p class="mb-4 d-block">Đợt tuyển sinh năm 2022, Trường Đại học Sư phạm Kỹ thuật (ĐHSPKT) được Đại học Đà Nẵng chọn làm địa điểm tổ chức Kỳ thi Đánh giá năng lực (ĐGNL) đợt 2 do</p>
                  <a href=""><img src="{{asset('public/frontend/img/8.jpg')}}" alt="" class="img-fluid"></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>24 THÁNG 05 2022</span></div>
              <h2 class="mb-2"><a href="single-post.html">Trường Đại học Sư phạm Kỹ thuật được chọn làm địa điểm thi đấu Giải cờ vua của Đại hội thể thao sinh viên Đại học Đà Nẵng</a></h2>
               <p class="mb-4 d-block">Trường Đại học Sư phạm Kỹ thuật được chọn làm địa điểm thi đấu Giải cờ vua của Đại hội thể thao sinh viên Đại học Đà Nẵng, môn cờ vua được xem là một trong</p>
             <a href=""><img src="{{asset('public/frontend/img/5.jpg')}}" alt="" class="img-fluid"></a>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>30 THÁNG 05 2022</span></div>
              <h2 class="mb-2"><a href="single-post.html">Dấu ấn Ngày Hội Sinh viên Trường Đại học Sư phạm Kỹ thuật - Đại học Đà Nẵng năm 2022</a></h2>
               <p class="mb-4 d-block">Vào ngày 28/05/2022, Đoàn Thanh niên - Hội Sinh viên Trường Đại học Sư phạm Kỹ thuật - Đại học Đà Nẵng tổ chức thành công "Ngày hội sinh viên năm 2022" nhằm mang đến một sân chơi bổ ích, lý thú, gắn kết sinh viên đang theo học tại trường, cùng san sẻ, đoàn kết dưới mái nhà chung Đại học Sư phạm Kỹ thuật.</p>
          <a href=""><img src="{{asset('public/frontend/img/6.jpg')}}" alt="" class="img-fluid"></a>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span> <span>24 THÁNG 05 2022
</span></div>
              <h2 class="mb-2"><a href="single-post.html">Trường Đại học Sư phạm Kỹ thuật được chọn làm địa điểm thi đấu Giải cờ vua của Đại hội thể thao sinh viên Đại học Đà Nẵng</a></h2>
           <p class="mb-4 d-block">Trường Đại học Sư phạm Kỹ thuật được chọn làm địa điểm thi đấu Giải cờ vua của Đại hội thể thao sinh viên Đại học Đà Nẵng, môn cờ vua được xem là một trong</p>
          <a href=""><img src="{{asset('public/frontend/img/7.jpg')}}" alt="" class="img-fluid"></a>
            </div>

           

           

            
          </div>
        </div>
      </div>
    </section><!-- End Culture Category Section -->

    <!-- ======= Business Category Section ======= -->
     <!--  <section class="category-section">
        <div class="container" data-aos="fade-up">

          

          <div class="row">
            <div class="col-md-9 order-md-2">

              <div class="d-lg-flex post-entry-2">
                <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                  <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                </a>
                <div>
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                  <div class="d-flex align-items-center author">
                    <div class="photo"><img src="assets/img/person-4.jpg" alt="" class="img-fluid"></div>
                    <div class="name">
                      <h3 class="m-0 p-0">Wade Warren</h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="post-entry-1 border-bottom">
                    <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                  </div>

                  <div class="post-entry-1">
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                <span class="author mb-3 d-block">Jenny Wilson</span>
              </div>
            </div>
          </div>
        </div>
      </section> -->

    <!-- ======= Lifestyle Category Section ======= -->
     <section class="category-section">
      <div class="container" data-aos="fade-up">
<div class="section-header d-flex justify-content-between align-items-center mb-5">
            <h2>Bản đồ</h2>
          
          </div>
          
<div class="responsive-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12438.50682789554!2d108.21217745608377!3d16.069026652784277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142184792140755%3A0xd4058cb259787dac!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTxrAgUGjhuqFtIEvhu7kgdGh14bqtdCAtIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1654961673703!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
        

        </div> 
     
    </section> 

@endsection
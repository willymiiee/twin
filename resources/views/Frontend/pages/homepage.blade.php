@extends('Frontend.layout.master')

@section('body')
<div class="hero">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(./img/banner1.jpg)">
                <div class="container text-white">
                    <div class="caption">
                        <h2 class="display-4">Lorem <span>Ipsum</span> Dolor Sit Amet</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, quo.</p>
                        <a class="btn" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url(./img/banner2.jpg)">
                <div class="container text-white">
                    <div class="caption">
                        <h2 class="display-4">Holla! <span>Ipsum</span> Dolor Sit Amet</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, quo.</p>
                        <a class="btn" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url(./img/banner3.jpg)">
                <div class="container text-white">
                    <div class="caption">
                        <h2 class="display-4">Lorem <span>Ipsum</span> Dolor Sit Amet</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, quo.</p>
                        <a class="btn" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<section class="about">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-lg-6 col-10">
                <!-- USE FIXED IMAGE RESOLUTION OF 1200 X 700 FOR RESPONSIVENESS -->
                <img src="img/about-showcase.jpg" class="img-fluid">
            </div>
            <div class="col-lg-1 col-2 d-flex flex-column align-items-center">
                <a href="#"><span><i class="fab fa-instagram"></i></span></a>
                <a href="#"><span><i class="fab fa-facebook-f"></i></span></a>
                <a href="#"><span><i class="fab fa-linkedin-in"></i></span></a>
            </div>
            <div class="col-lg-5 col-12">
                <h2>About
                    <br>
                    <span>PT. Kembar Putra Makmur</span>
                </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita doloremque illo nostrum
                    commodi labore deleniti sapiente suscipit similique exercitationem laboriosam, blanditiis
                    dignissimos ratione atque praesentium sed omnis modi rem aut.</p>
                <a class="btn" href="#" role="button">Learn More</a>
            </div>
        </div>
    </div>
</section>
<section class="product">
    <div class="home-title">
        <h1>Our<br><span>Product</span></h1>
    </div>
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- USE FIXED IMAGE RESOLUTION OF 500 X 500 FOR RESPONSIVENESS -->
                <div class="swiper-slide">
                    <a href="#"><img class="d-block w-100" src="img/popmie1.png">
                        <span>Pop Mie 1</span></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img class="d-block w-100" src="img/popmie2.png">
                        <span>Pop Mie 2</span></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img class="d-block w-100" src="img/popmie1.png">
                        <span>Pop Mie 3</span></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img class="d-block w-100" src="img/popmie2.png">
                        <span>Pop Mie 4</span></a>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<section class="infrastructure">
    <div class="home-title">
        <h1>Kami<br><span>Infrastruktur</span></h1>
    </div>
    <div class="home-content">
        <!-- USE FIXED IMAGE RESOLUTION OF 1400 X 600 FOR RESPONSIVENESS -->
        <!-- Using Sass, Bg Image in bg-image class -->
        <div class="bg-image"></div>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 content">
                    <span><i class="fab fa-instagram"></i></span>
                    <h3>2018</h3>
                    <p>Jumlah Armada</p>
                </div>
                <div class="col-sm-6 col-md-3 content">
                    <span><i class="fas fa-car"></i></span>
                    <h3>2018</h3>
                    <p>Jenis Armada</p>
                </div>
                <div class="col-sm-6 col-md-3 content">
                    <span><i class="fab fa-instagram"></i></span>
                    <h3>2018</h3>
                    <p>Luas Gudang</p>
                </div>
                <div class="col-sm-6 col-md-3 content">
                    <span><i class="fas fa-warehouse"></i></span>
                    <h3>7</h3>
                    <p>Total Gudang</p>
                </div>
            </div>
        </div>
    </div>


</section>
<section class="team">
    <div class="home-title">
        <h1>Our<br><span>Team</span></h1>
    </div>
    <div class="container">
        <div class="row align-items-center py-4">
            <div class="col-md-7">
                <p class="mb-4">PENJELASAN TENTANG TIM KAMI Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Inventore, dicta? Voluptatum, aliquam cum? Ipsa temporibus culpa quo, reprehenderit
                    vitae, vero et quisquam labore ipsum repellendus itaque! Nobis fugit voluptatibus beatae.</p>
            </div>
            <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-5 offset-md-0">
                <!-- USE FIXED IMAGE RESOLUTION OF 1200 X 700 FOR RESPONSIVENESS -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- USE FIXED IMAGE RESOLUTION OF 1400 X 600 FOR RESPONSIVENESS -->
                        <div class="swiper-slide"><img class="d-block w-100" src="img/person1.jpg"></div>
                        <div class="swiper-slide"><img class="d-block w-100" src="img/person2.jpg"></div>
                        <div class="swiper-slide"><img class="d-block w-100" src="img/person3.jpg"></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <a class="btn mb-4" href="#" role="button">Learn More</a>
    </div>
</section>
<section class="contact">
    <div class="bg-image"></div>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 col-md-8 offset-md-2 px-md-4">
                <span><i class="far fa-envelope"></i></span>
                <h2>Send Us A Message</h2>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="E-Mail">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" rows="5" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
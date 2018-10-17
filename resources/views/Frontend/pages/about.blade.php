@extends('Frontend.layout.master')

@section('body')
<div id="about">
    <div class="main-title">
        <div class="bg-image"></div>
        <div class="container">
            <h1>About Us</h1>
        </div>
    </div>
    <div class="container main-content py-3 py-md-5">
        <div class="row">
            <div class="col-md-7">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod dolorem reprehenderit porro
                    delectus ex nulla alias accusamus nesciunt quibusdam unde nobis aut quae neque assumenda
                    obcaecati perspiciatis modi fugiat placeat, ullam fugit minima officiis. Placeat molestiae,
                    accusantium alias velit deleniti, natus, fugit ipsum enim recusandae laborum vel omnis dolorum
                    est rerum! Similique obcaecati aperiam eos praesentium, exercitationem quos delectus
                    recusandae, dicta reprehenderit quis non voluptatibus veniam voluptatem soluta provident
                    debitis asperiores harum tenetur, impedit omnis eligendi ducimus et. Fugiat, mollitia sed!
                    Autem corporis, quos quia quibusdam soluta eum laborum vel beatae consectetur laudantium
                    nesciunt, cupiditate asperiores rem delectus praesentium. Praesentium?</p>
                <h3>History</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam impedit ea, atque vero eos
                    voluptates maiores dolorem labore fugiat suscipit ipsam facilis aliquam repudiandae quas nisi
                    sit possimus qui perferendis? Nulla voluptas ad voluptate. Cupiditate dolore praesentium minus
                    nulla consequatur est perferendis doloremque officia sunt suscipit, voluptates ad. Odit, saepe?</p>
            </div>
            <div class="col-md-5">
                <h3 class="pl-4">Visi</h3>
                <ul class="list-unstyled">
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                </ul>
                <h3 class="pl-4">Misi</h3>
                <ul class="list-unstyled">
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                    <li class="media">
                        <span class="mr-2"><i class="fas fa-check"></i></span>
                        <div class="media-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, architecto.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(./img/company1.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company2.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company3.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company1.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company2.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company3.jpg)"></div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(./img/company1.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company2.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company3.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company1.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company2.jpg)"></div>
            <div class="swiper-slide" style="background-image:url(./img/company3.jpg)"></div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row py-5">
                <div class="col-md-5 col-12 mb-4 mb-md-0">
                    <h6>About Us</h6>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis corrupti sed quos eaque
                        iste, iure amet doloribus qui quis perferendis?</p>
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-4">
                    <h6>Link</h6>
                    <hr>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="product.html">Product</a></li>
                        <li><a href="infrastructure.html">Infrastructure</a></li>
                        <li><a href="team.html">Team</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-8">
                    <h6>Contact</h6>
                    <hr>
                    <ul class="list-unstyled">
                        <li>12345 Jl. Pakupatan. 123</li>
                        <li>E-mail: company@domain.co.id</li>
                        <li>Phone: (0253-123456</li>
                    </ul>
                </div>
            </div>
            <p class="m-0 text-center">Copyright &copy; PT. Kembar Putra Makmur - 2018</p>
        </div>
    </footer>
</div>
@endsection
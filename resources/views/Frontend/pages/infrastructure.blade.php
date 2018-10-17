@extends('Frontend.layout.master')

@section('body')
<div id="infrastructure">
    <div class="main-title">
        <div class="bg-image"></div>
        <div class="container">
            <h1>Infrastruktur</h1>
        </div>
    </div>

    <div class="container py-5">
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-3 active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">Gudang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Armada</a>
            </li>
        </ul>
        <div class="tab-content py-4" id="myTabContent">
            <!-- WAREHOUSE TAB -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Warehouse 1 -->
                <div class="row">
                    <div class="col-md-6 pr-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center px-md-5 pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Singaraja</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 2 -->
                <div class="row">
                    <div class="order-2 order-md-1 col-md-6 d-flex flex-column justify-content-center px-md-5  pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Negara</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                    <div class="order-1 order-md-2 col-md-6 pl-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 3 -->
                <div class="row">
                    <div class="col-md-6 pr-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center px-md-5 pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Cargo</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Cargo Permai 77, Ubud, Denpasar, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.010 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>800 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>40.000 CRT</p>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 4 -->
                <div class="row">
                    <div class="order-2 order-md-1 col-md-6 d-flex flex-column justify-content-center px-md-5  pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Negara</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                    <div class="order-1 order-md-2 col-md-6 pl-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 5 -->
                <div class="row">
                    <div class="col-md-6 pr-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center px-md-5 pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Singaraja</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 6 -->
                <div class="row">
                    <div class="order-2 order-md-1 col-md-6 d-flex flex-column justify-content-center px-md-5  pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Negara</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                    <div class="order-1 order-md-2 col-md-6 pl-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/negara4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- Warehouse 7 -->
                <div class="row">
                    <div class="col-md-6 pr-md-0">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja1.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja2.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja3.jpg">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">
                                        <img class="d-block w-100" src="img/warehouse/singaraja4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center px-md-5 pb-5 pb-md-0">
                        <h2 class="pt-4 pb-3 pt-md-0 text-center">Gudang Singaraja</h2>
                        <div class="desc text-center">
                            <h6 class="m-0">Alamat:</h6>
                            <p>Jl. Kibarak Panji Sukasada, Singaraja, Bali</p>
                            <h6 class="m-0">Luas Tanah:</h6>
                            <p>1.360 m<sup>2</sup></p>
                            <h6 class="m-0">Luas Gudang:</h6>
                            <p>1.200 m<sup>2</sup></p>
                            <h6 class="m-0">Kapasitas:</h6>
                            <p>50.000 CRT</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VEHICLES TAB -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="order-2 order-md-1 col-md-6 d-flex flex-column justify-content-center px-md-5">
                        <h2 class="pt-3 pt-md-0 text-center">Armada 1</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum facere alias perferendis
                            laborum vel deleniti aut commodi dicta, et ipsam harum recusandae reiciendis itaque
                            iste voluptas explicabo vitae similique beatae!</p>
                        <ul class="list-unstyled">
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 order-md-2 d-flex flex-column justify-content-center col-md-6 pl-md-0">
                        <img class="d-block w-100" src="img/cars1.jpg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-center pr-md-0">
                        <img class="d-block w-100" src="img/cars2.jpg">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center px-md-5">
                        <h2 class="pt-3 pt-md-0 text-center">Armada 2</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro velit esse totam rem
                            officiis veritatis dolore voluptatibus assumenda, nulla quia.</p>
                        <ul class="list-unstyled">
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                            <li class="media">
                                <span class="mr-3"><i class="fas fa-archive"></i></span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem iste veritatis
                                    a? Molestias esse vitae saepe culpa nostrum vero officia.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>
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
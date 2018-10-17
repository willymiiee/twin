@extends('Frontend.layout.master')

@section('body')
<div id="team">
    <div class="main-title">
        <div class="bg-image"></div>
        <div class="container">
            <h1>Our Team</h1>
        </div>
    </div>
    <div class="container py-md-4">
        <div class="row">
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="team-card">
                    <img class="d-block w-100" src="img/person1.jpg">
                    <div class="overlay"></div>
                    <div class="data">
                        <h2>Anton Manurung</h2>
                        <p>Kurir</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="team-card">
                    <img class="d-block w-100" src="img/person1.jpg">
                    <div class="overlay"></div>
                    <div class="data">
                        <h2>Anton Manurung</h2>
                        <p>Kurir</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="team-card">
                    <img class="d-block w-100" src="img/person1.jpg">
                    <div class="overlay"></div>
                    <div class="data">
                        <h2>Anton Manurung</h2>
                        <p>Kurir</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="team-card">
                    <img class="d-block w-100" src="img/person1.jpg">
                    <div class="overlay"></div>
                    <div class="data">
                        <h2>Anton Manurung</h2>
                        <p>Kurir</p>
                    </div>
                </div>
            </div>
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
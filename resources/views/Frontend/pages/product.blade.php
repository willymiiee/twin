@extends('Frontend.layout.master')

@section('body')
<div id="product">
    <div class="main-title">
        <div class="bg-image"></div>
        <div class="container">
            <h1>Our Product</h1>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 py-3">
                <a href="#">
                    <div class="main-product p-1 p-4">
                        <img class="d-block w-100" src="img/popmie1.png">
                        <p class="lead text-center">Pop Mie 1</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-3 py-3">
                <a href="#">
                    <div class="main-product p-1 p-4">
                        <img class="d-block w-100" src="img/popmie2.png">
                        <p class="lead text-center">Pop Mie 2</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-3 py-3">
                <a href="#">
                    <div class="main-product p-1 p-4">
                        <img class="d-block w-100" src="img/popmie1.png">
                        <p class="lead text-center">Pop Mie 3</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-3 py-3">
                <a href="#">
                    <div class="main-product p-1 p-4">
                        <img class="d-block w-100" src="img/popmie2.png">
                        <p class="lead text-center">Pop Mie 4</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @include('Frontend/modules.footer')
</div>
@endsection
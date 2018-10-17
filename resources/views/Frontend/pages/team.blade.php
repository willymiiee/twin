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
    @include('Frontend/modules.footer')
</div>
@endsection
@extends('micrositio.appmicrositio')
@section('content')
    <section class="row mt-3 mb-3">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide1.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide2.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide3.png') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('imagenes/slide4.jpg') }}" alt="fourth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-1"></div>
        </div>
    </section>
@endsection

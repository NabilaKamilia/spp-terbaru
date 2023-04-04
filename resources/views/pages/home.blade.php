@extends('layouts.app')

@section('title')
KPU Batu
@endsection

@section('content')
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="images/depan.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">Jadilah Generasi Anti Golput</h1>
                                <a href="https://youtu.be/8l8lEc_R0Zk" class="btn btn-primary py-sm-3 px-sm-5">Pelajari Lebih Lanjut</a>
                                <!-- <a href="" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="images/depan2.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">Pilihlah Pemimpin Negeri Ini</h1>
                                <a href="{{route('panduan')}}" class="btn btn-primary py-sm-3 px-sm-5">Pelajari Lebih Lanjut</a>
                                <!-- <a href="" class="btn btn-light py-sm-3 px-sm-5 ms-3">Our Courses</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<div class="container">
    <div class="row">           
        <div class="mt-4 center">
            <div class="counter green">
                <div class="counter-content">
                    <div class="counter-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3>Jumlah Pendaftar</h3>
                </div>
                <span class="counter-value">{{$user_data}}</span>
            </div>
        </div>
    </div>
</div>

<!-- About Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <div class="media">
                        <div class="media-body">
                            <iframe width="500" height="285" src="https://www.youtube.com/embed/8l8lEc_R0Zk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <img class="position-absolute top-0 start-0 pe-3 pb-3" src="images/kpulogo.png" alt="" style="width: 100px; height: 100px;">
                </div>

            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-50">
                    <h6 class="text-primary text-uppercase mb-2">Tentang Panduan</h6>
                    <h1 class="display-6 mb-4">Panduan Pemilihan</h1>
                    <p>Mengisi data diri pada form yang telah disediakan agar data kalian tercatat dalam daftar pemilih. Selengkapnya dapat melihat halaman panduan untuk lebih lanjut. </p>

                </div>
                <div class="row g-4">
                    <div class="col-sm-6">

             
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <a class="btn btn-primary py-3 px-3" href="{{ route('formUser.index') }}">Form</a>
                            </div>
                        </div>

                    </div>
                    <!-- <audio controls="pauseOthers" style="vertical-align: middle" src="storage/audio/Tay.mp3" type="audio/mp3">               
            </audio> -->                    
                <!-- <audio controls autoplay>
                    <source src="storage/audio/Tay.mp3" type="audio/mp3">
                </audio> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- About End -->

<!-- Courses Start -->
<div class="container-xxl courses my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Halaman Lainnya</h6>
                <h1 class="display-6 mb-4">Pelajari Lebih Lanjut</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="fs-5 py-1 px-4 mb-4"></div>
                            <h5 class="mb-3">KPU</h5>
                            <p>#TemanPemilih, yuk kenal sejarah KPU Kota Batu!</p>
                        </div>
                        <div class="position-relative mt-3">
                            <center>
                            <img class="img-fluid" src="images/kpumelayani.png" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="{{ route('kpu') }}">Read More</a>
                            </div>
                        </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="fs-5 py-1 px-4 mb-4"></div>
                            <h5 class="mb-3">Panduan</h5>
                            <p>Panduan untuk menjadi #TemanPemilih yang baik dan benar</p>
                        </div>
                        <div class="position-relative mt-2">
                            <img class="img-fluid" src="images/kotak2.png" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="{{ route('panduan') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="fs-5 py-1 px-4 mb-4"></div>
                            <h5 class="mb-3">Form</h5>
                            <p>Isi form data diri untuk menjadi #TemanPemilih</p>
                        </div>
                        <div class="position-relative mt-2">
                            <center>
                            <img class="img-fluid" src="images/kotak.png" alt="" width="300" height="300" </>
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="{{ route('formUser.index') }}">Read More</a>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
  
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js">
 
$(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script>

@endsection
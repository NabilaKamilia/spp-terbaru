@extends('layouts.app')

@section('content')
 
<div class="container-xxl courses my-2 py-5 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-4">Pesan Anda Telah Direkam</h1>
                <h2>Terimakasih</h2>                
                <a type="button" class="btn btn-danger" href="{{ route('home') }}">Kembali</a>
            </div>

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

@endsection
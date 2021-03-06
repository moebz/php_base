@extends('base')

@section('css')
<style>
    .carousel {
        width: 100%;
    }
</style>
@stop

@section('outsidecontainer')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/assets/slider/1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>New</h5>
                    <p>York</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/slider/2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ice</h5>
                    <p>Cave</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/slider/3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Green</h5>
                    <p>Prairie</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">            
        </div>       
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light text-center">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <i class="fas fa-plane fa-5x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <i class="fas fa-utensils fa-5x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-center">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <i class="fas fa-compass fa-5x"></i>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@stop
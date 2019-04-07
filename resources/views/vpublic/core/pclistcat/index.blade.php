@extends('templates.core.master')
@section('main')
    @include('templates.core.slider')
<!-- =========================
        Amazon Review Section
    ============================== -->
    <section id="product-amazon" class="product-shop-page product-shop-full-grid">
        <div class="container">
            <div class="row">
                @include('templates.core.partner')
                <div class="col-12 p0  display-none-md">
                    <div class="page-location">
                        <ul>
                            <li><a href="/">
                                Home <span class="divider">/</span>
                            </a></li>
                            <li><a class="page-location-active" href="/gridcat/a/1">
                                Shop
                                <span class="divider">/</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                @include('templates.core.left-bar')

                <div class="col-12 col-md-8 col-lg-9 product-grid">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter row">
                                <div class="col-8 col-md-3">
                                    <h6 class="result">Showing all 12 results</h6>
                                </div>
                                <div class="col-6 col-md-6 filter-btn-area text-center">
                                     <div class="btn-group" role="group">
                                        <div class="d-flex">
                                            <p>Sort by:</p>
                                            <button id="btnGroupDropwdshowing" type="button" class="btn btn-secondary dropdown-toggle filter-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Default
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDropwdshowing">
                                              <a class="dropdown-item" href="#">Camara</a>
                                              <a class="dropdown-item" href="#">Joystick</a>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-4 col-md-3 sorting text-right">
                                    <a href="/gridcat/a/1">
                                        <i class="fa fa-bars active-color" aria-hidden="true"></i>
                                    </a>
                                    <a href="/listcat/a/1">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="owl-carousel"> -->
                        <div class="col-12 col-sm-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <figcaption></figcaption>
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-1.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <figcaption></figcaption>
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-2.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <figcaption></figcaption>
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-2.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <figcaption></figcaption>
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-4.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <figcaption></figcaption>
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-5.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <!-- <div class="owl-carousel"> -->
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-1.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-2.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-3.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-4.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-5.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-6.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-7.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-2.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-2.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-3.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart active-wishlist" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 reviews-load-more-full_grid">
                            <figure class="figure product-box row">
                                <div class="col-12 col-md-12 col-lg-5 col-xl-4 p0">
                                    <div class="product-box-img">
                                        <a href="product-details.html">
                                            <img src="{{ $publicUrl }}/img/shop-img/shop-img-4.jpg" class="figure-img img-fluid" alt="Product Img">
                                        </a>
                                    </div>
                                    <div class="quick-view-btn">
                                        <div class="compare-btn">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg-product-1"><i class="fa fa-eye" aria-hidden="true"></i> Quick view</button>
                                        </div>
                                    </div>
                                        <span class="badge badge-secondary wd-badge text-uppercase">New</span>
                                        <div class="wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 col-xl-8 p0">
                                    <div class="figure-caption text-left">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 pr-0">
                                                <div class="price-start">
                                                    <strong class="active-color"><u>$80.00</u> - <u>$75.00</u></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="rating">
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="content-excerpt">
                                                    <h6 class="product-title">Bose QuietControl 30 Wireless <br> Headphones</h6>
                                                    <p class="product-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="compare-btn">
                                                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Add to compare</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="col-12 text-center">
                            <a href="#" id="loadMore_full_grid" class="btn btn-primary wd-shop-btn">
                                Show more
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>



@stop
@section('js')
   
@endsection

@extends('templates.core.master')
@section('main')
<section class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-12 p0">
                <div class="page-location">
                    <ul>
                        <li><a href="#">
                            Home / Shop <span class="divider">/</span>
                        </a></li>
                        <li><a class="page-location-active" href="#">
                            product details single review
                            <span class="divider">/</span>
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12  product-details-section">
                <!-- ====================================
                    Product Details Gallery Section
                ========================================= -->
                <div class="row">
                    <div class="product-gallery col-12 col-md-12 col-lg-6">
                        <!-- ====================================
                            Single Product Gallery Section
                        ========================================= -->
                        <div class="row">
                            <div class="col-md-12 product-slier-details">
                                <ul id="lightSlider">
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                    <li data-thumb="{{ $publicUrl }}/img/product-img/product-description-1.jpg">
                                        <img class="figure-img img-fluid" src="{{ $publicUrl }}/img/product-img/product-description-1.jpg" alt="product-img" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-12 col-md-12 col-lg-6">
                        <div class="product-details-gallery">
                            <div class="list-group">
                                <h4 class="list-group-item-heading product-title">
                                    Vigo SP111-31N-P2GH Spin 1
                                </h4>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <div class="rating">
                                            <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p>3.7/5 <span class="product-ratings-text"> -1747 Ratings</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group content-list">
                                <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 100% Original product</p>
                                <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Manufacturer Warranty</p>
                            </div>
                        </div>
                        <div class="product-store row">
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">
                                        <img src="{{ $publicUrl }}/img/product-store/product-store-img1.jpg" class="figure-img img-fluid" alt="Product Img">
                                    </div>
                                    <div class="col-5 store-border-price text-center">
                                        <div class="price">
                                            <p>$234</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="#" class="btn btn-primary wd-shop-btn pull-right">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">
                                        <img src="{{ $publicUrl }}/img/product-store/product-store-img2.jpg" class="figure-img img-fluid" alt="Product Img">
                                    </div>
                                    <div class="col-5 store-border-price text-center">
                                        <div class="price">
                                            <p>$535</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="#" class="btn btn-primary wd-shop-btn pull-right red-bg">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">
                                        <img src="{{ $publicUrl }}/img/product-store/product-store-img3.jpg" class="figure-img img-fluid" alt="Product Img">
                                    </div>
                                    <div class="col-5 store-border-price">
                                        <span class="badge badge-secondary wd-badge text-uppercase">Best</span>
                                        <div class="price text-center">
                                            <p>$198</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="#" class="btn btn-primary wd-shop-btn pull-right orange-bg">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">
                                        <img src="{{ $publicUrl }}/img/product-store/product-store-img4.jpg" class="figure-img img-fluid" alt="Product Img">
                                    </div>
                                    <div class="col-5 store-border-price text-center">
                                        <div class="price">
                                            <p>$634</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="#" class="btn btn-primary wd-shop-btn pull-right green-bg">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 product-store-box">
                                <div class="row">
                                    <div class="col-3 p0 store-border-img">
                                        <img src="{{ $publicUrl }}/img/product-store/product-store-img5.jpg" class="figure-img img-fluid" alt="Product Img">
                                    </div>
                                    <div class="col-5 store-border-price text-center">
                                        <div class="price">
                                            <p>$234</p>
                                        </div>
                                    </div>
                                    <div class="col-4 store-border-button">
                                        <a href="#" class="btn btn-primary wd-shop-btn pull-right blue-bg">
                                            Buy it now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-12">
                <div class="wd-tab-section">

                    <div class="tab-pane reviews-section" id="reviews">
                        <div class="row">
                            <div class="col-12">
                                <p class="wd-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores id assumenda, ex ab voluptatem doloremque soluta magnam eum nihil iusto maiores! Libero nisi maior</p>

                                <h6 class="review-rating-title">Average Ratings and Reviews</h6>
                                <div class="row tab-rating-bar-section">
                                    <div class="col-8 col-md-4 col-lg-4">
                                        <img src="{{ $publicUrl }}/img/review-bg.png" alt="review-bg">
                                        <div class="review-rating text-center">
                                            <h1 class="rating">4.5</h1>
                                            <p>4 Ratings &amp;
                                            0 Reviews</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 rating-bar-section">
                                        <div class="media rating-star-area">
                                            <p>5 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>4 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>3 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-green" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>2 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-yellow" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media rating-star-area">
                                            <p>1 <i class="fa fa-star" aria-hidden="true"></i></p>
                                            <div class="media-body rating-bar">
                                                <div class="progress wd-progress">
                                                    <div class="progress-bar wd-bg-red" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="reviews-market">
                                    <div class="reviews-title text-center">
                                        <h3>Ratings and Reviews From Market</h3>
                                        <hr>
                                    </div>
                                    <!-- 
                                        =================================
                                        Review Our Market
                                        =================================
                                    -->
                                    <div class="star-view-market">
                                        <div class="row">
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img1.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-yellow-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-yellow-4"></div><span class="rating-number">4</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-yellow-3"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-yellow-2"></div><span class="rating-number">2</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-yellow-1"></div><span class="rating-number">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img2.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">5.0</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-blue-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-blue-4"></div><span class="rating-number">4</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-blue-3"></div><span class="rating-number">2</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-blue-2"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-blue-1"></div><span class="rating-number">4</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img3.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-red-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-red-4"></div><span class="rating-number">2</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-red-3"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-red-2"></div><span class="rating-number">4</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-red-1"></div><span class="rating-number">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img4.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-green-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-green-4"></div><span class="rating-number">1</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-green-3"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-green-2"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-green-1"></div><span class="rating-number">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img5.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-dark-yellow-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-dark-yellow-4"></div><span class="rating-number">4</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-dark-yellow-3"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-dark-yellow-2"></div><span class="rating-number">2</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-dark-yellow-1"></div><span class="rating-number">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <img src="{{ $publicUrl }}/img/client/reviews-star-img6.png" alt="client-img">
                                                <span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
                                                <div class="rating-market-section">
                                                    <div class="rating-star">
                                                        <div class="review-rating-light-yellow-5"></div><span class="rating-number">5</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-light-yellow-4"></div><span class="rating-number">4</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-light-yellow-3"></div><span class="rating-number">3</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-light-yellow-2"></div><span class="rating-number">2</span>
                                                    </div>
                                                    <div class="rating-star">
                                                        <div class="review-rating-light-yellow-1"></div><span class="rating-number">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
    </div>
</section>
@stop
@section('js')

@endsection

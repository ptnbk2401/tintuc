@extends('templates.core.master')
@section('main')
<main class="site-main shopping-cart">
    <div class="container">
        <ol class="breadcrumb-page">
            <li><a href="#">Home </a></li>
            <li class="active"><a href="#">Shopping Cart  </a></li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form class="form-cart">
                    <div class="table-cart">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="tb-image"></th>
                                    <th class="tb-product">Product Name</th>
                                    <th class="tb-price">Unit Price</th>
                                    <th class="tb-qty">Qty</th>
                                    <th class="tb-total">SubTotal</th>
                                    <th class="tb-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tb-image"><a href="#" class="item-photo"><img src="{{$publicUrl}}/images/cart1.jpg" alt="cart"></a></td>
                                    <td class="tb-product">
                                        <div class="product-name"><a href="#">Smartphone MTK6737 Quad Core.</a></div>
                                    </td>
                                    <td class="tb-price">
                                        <span class="price">$229.00</span>
                                    </td>
                                    <td class="tb-qty">
                                        <div class="quantity">
                                            <div class="buttons-added">
                                                <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                                <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="tb-total">
                                        <span class="price">$229.00</span>
                                    </td>
                                    <td class="tb-remove">
                                        <a href="#" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tb-image"><a href="#" class="item-photo"><img src="{{$publicUrl}}/images/cart2.jpg" alt="cart"></a>
                                        <td class="tb-product">
                                            <div class="product-name"><a href="#">Acer's Aspire S7 is a thin and portable laptop</a></div>
                                        </td>
                                        <td class="tb-price">
                                            <span class="price">$229.00</span>
                                        </td>
                                        <td class="tb-qty">
                                            <div class="quantity">
                                                <div class="buttons-added">
                                                    <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                                    <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                    <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tb-total">
                                            <span class="price">$229.00</span>
                                        </td>
                                        <td class="tb-remove">
                                            <a href="#" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-actions">
                            <button type="submit" class="btn-continue">
                                <span>Continue Shopping</span>
                            </button>
                            <button type="submit" class="btn-clean" >
                                <span>Update Shopping Cart</span>
                            </button>
                            <button type="submit" class="btn-update" >
                                <span>Clear Shopping Cart</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 padding-left-5">
                    <div class="order-summary">
                        <h4 class="title-shopping-cart">Order Summary</h4>
                        <div class="checkout-element-content">
                            <span class="order-left">Subtotal:<span>$458.00</span></span>
                            <span class="order-left">Shipping:<span>Free Shipping</span></span>
                            <span class="order-left">Total:<span>$458.00</span></span>
                            <ul>
                                <li><label class="inline" ><input type="checkbox"><span class="input"></span>I have promo code</label></li>
                            </ul>
                            <button type="submit" class="btn-checkout" >
                                <span>Check Out</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="block-recent-view">
        @include('templates.core.recent-view')
    </div>

    <div class="block-section-brand">
        @include('templates.core.section-brand')
    </div>
    </main>
    @stop
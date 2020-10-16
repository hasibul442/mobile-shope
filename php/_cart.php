<!------------Start shopping Cart Section---------------->
<section id="cart" class="py-3">
            <div class="container">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                <!-------Start Shopping Cart Items------->
                <div class="row">
                    <div class="col-sm-9">
                        <!------Start Cart item-------------->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="./assets/products/1.png" alt="" class="img-fluid" />
                            </div>

                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20">Samsung Galaxy 10</h5>
                                <small>by Samsung</small>

                                <!------------Start Product Rating----------->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,343 ratings</a>
                                </div>
                                <!------------End Product Rating----------->

                                <!------------Product qty------------->
                                <div class="qty d-flex pt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex font-rale w-50">
                                                <button class="qty-up bg-light boarder" data-id="pro1">
                                                    <i class="fas fa-angle-up"></i>
                                                </button>
                                                <input  type="text" class="qty-input border px-2 w-100 bg-light"data-id="pro1" disabled value="1" placeholder="1" />
                                                <button class="qty-down bg-light boarder" data-id="pro1">
                                                    <i class="fas fa-angle-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn font-baloo text-danger px-3 border-right">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button type="submit" class="btn font-baloo text-danger">
                                                <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!------------!Product qty------------->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-ize-20 text-danger font-baloo">
                                    $<samp class="product-price">150</samp>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="./assets/products/1.png" alt="" class="img-fluid" />
                            </div>

                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20">Samsung Galaxy 10</h5>
                                <small>by Samsung</small>

                                <!------------Start Product Rating----------->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,343 ratings</a>
                                </div>
                                <!------------End Product Rating----------->

                                <!------------Product qty------------->
                                <div class="qty d-flex pt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex font-rale w-50">
                                                <button class="qty-up bg-light boarder">
                                                    <i class="fas fa-angle-up"></i>
                                                </button>
                                                <input type="text" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1" />
                                                <button class="qty-down bg-light boarder">
                                                    <i class="fas fa-angle-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn font-baloo text-danger px-3 border-right">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button type="submit" class="btn font-baloo text-danger">
                                                <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!------------!Product qty------------->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-ize-20 text-danger font-baloo">
                                    $<samp class="product-price">150</samp>
                                </div>
                            </div>
                        </div>
                        <!------End Cart item--------------->
                    </div>

                    
                        <!-------Subtotal-------------->
                        <div class="col-sm-3">
                            <div class="sub-total border text-center mt-2">
                                <h6 class="font-size-12 font-rale text-success py-3 justify-content-between"><i class="fas fa-check"></i> Your Order is eligible For Delivery</h6>
                                <div class="border-top py-4">
                                   <h5 class="font-baloo font-size-20">Subtotal (2 item):&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price">152.00</span></span></h5>
                                    <button type="submit" class="btn btn-warning mt-3">Process To Buy</button>
                                </div>
                            </div>
                        </div>
                        <!-------Subtotal-------------->
                    
                </div>
                <!-------End Shopping Cart Items------->
            </div>
        </section>
        <!------------end shopping Cart Section---------------->
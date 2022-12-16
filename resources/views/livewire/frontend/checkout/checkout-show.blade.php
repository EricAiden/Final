<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg white p-3">
                        <h4 class="text-primary">
                            Item Total Amount:
                            <span class="float-end">{{ $this->totalProductAmount }}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br>
                        <small>* Tax and order charges are included  ?</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg white p-3">
                        <h4 class="text-primary">
                            Basic information
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mn-3">
                                <label>Full name</label>
                                <input type="text" wire:model.defer="fullname" class="form-control" placeholder="Enter full name">
                                @error('fullname')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mn-3">
                                <label>Phone number</label>
                                <input type="number" wire:model.defer="phone" class="form-control" placeholder="Enter phone number">
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mn-3">
                                <label>Email</label>
                                <input type="email" wire:model.defer="email" class="form-control" placeholder="Enter email">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mn-3">
                                <label>Pin-code (zip-code)</label>
                                <input type="number" wire:model.defer="pincode" class="form-control" placeholder="Enter pin-code">
                                @error('pincode')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mn-3">
                                <label>Full address</label>
                                <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Select payment mode</label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold border border-1 border-dark m-1" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDelivery">Cash on delivery</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold border border-1 border-dark m-1" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment">Online payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDelivery" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr/>
                                            <button type="button" wire:click="codOrder" class="btn btn-primary btn-add-to-cart">
                                                <span wire:loading.attr="disabled" wire:loading.remove wire:target="codOrder">
                                                    Place order (cash on delivery)
                                                </span><span wire:loading wire:target="codOrder">
                                                    Placeing order
                                                </span>
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Online payment Mode</h6>
                                            <hr/>
                                            <button wire:loading.attr="disabled" type="button" class="btn btn-primary btn-add-to-cart">Pay now (online payment)</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="card card-body shadow text-center p-md-5">
                            <h4>No items in cart to checkout</h4>
                            <a href="{{ url('collections') }}" class="btn btn-warning">Shop now</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
@endpush --}}

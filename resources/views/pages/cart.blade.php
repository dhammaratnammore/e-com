@extends('layout.master')
@section('title', 'Cart')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid mt-3">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-dark text-white mb-4 py-3 px-4 shadow-sm rounded-3" style="font-size: 14px;">
                <a class="breadcrumb-item text-decoration-none text-warning" href="{{ url('index') }}">🏠 Home</a>
                <a class="breadcrumb-item text-decoration-none text-warning" href="{{ url('shop') }}">🛍 Shop</a>
                <span class="breadcrumb-item active text-light">🛒 Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Cart Table -->
        <div class="col-lg-8 mb-5">
            <div class="card bg-dark text-light border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-uppercase fw-bold text-warning">🛍 Your Shopping Cart</h4>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle text-center">
                            <thead class="bg-black text-warning">
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $c)
                                <tr data-id="{{ $c->id }}">
                                    <td><span>{{ $c->name }}</span></td>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <img src="{{ url('uplode/'.$c->image) }}" alt="" width="50" class="rounded me-2 border">
                                        
                                    </td>
                                    <td class="unit-price" data-price="{{ $c->price }}">${{ number_format($c->price, 2) }}</td>
                                    <td>
                                        <div class="input-group input-group-sm justify-content-center" style="width: 100px;">
                                            <button class="btn btn-outline-light btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" class="form-control text-center bg-dark text-white border-secondary quantity-input" value="1">
                                            <button class="btn btn-outline-light btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="item-total">$0.00</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary & Checkout -->
        <div class="col-lg-4">
            <div class="card bg-dark text-light border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-4">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-secondary text-white border-0" placeholder="🎟 Coupon Code">
                            <button class="btn btn-danger text-light">Apply</button>
                        </div>
                    </form>

                    <h5 class="text-uppercase fw-bold mb-3 text-warning">🧾 Summary</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span class="cart-subtotal fw-semibold">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span>$10.00</span>
                    </div>
                    <hr class="border-secondary">
                    <div class="d-flex justify-content-between fs-5 fw-bold">
                        <span>Total</span>
                        <span class="cart-total text-warning">$0.00</span>
                    </div>

                    <form id="checkout-form" method="POST" action="">
                        @csrf
                        <input type="hidden" name="cart_total" id="cart_total">
                        <input type="hidden" name="cart_subtotal" id="cart_subtotal">
                        <input type="hidden" name="cart_data" id="cart_data">

                        <button type="submit" class="btn btn-danger w-100 mt-3 py-3 text-light fw-bold">
                            🛍 Proceed To Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const shippingCost = 10;

    function updateCart() {
        let subtotal = 0;
        const cartData = [];

        document.querySelectorAll("tr[data-id]").forEach(row => {
            const id = row.dataset.id;
            const price = parseFloat(row.querySelector(".unit-price").dataset.price);
            const quantityInput = row.querySelector(".quantity-input");
            let qty = parseInt(quantityInput.value) || 1;

            if (qty < 1) qty = 1;
            quantityInput.value = qty;

            const total = qty * price;
            row.querySelector(".item-total").textContent = `$${total.toFixed(2)}`;
            subtotal += total;

            cartData.push({ id, qty, price });
        });

        const total = subtotal + shippingCost;

        document.querySelector(".cart-subtotal").textContent = `$${subtotal.toFixed(2)}`;
        document.querySelector(".cart-total").textContent = `$${total.toFixed(2)}`;

        document.getElementById("cart_subtotal").value = subtotal.toFixed(2);
        document.getElementById("cart_total").value = total.toFixed(2);
        document.getElementById("cart_data").value = JSON.stringify(cartData);
    }

    document.querySelectorAll("tr[data-id]").forEach(row => {
        const plusBtn = row.querySelector(".btn-plus");
        const minusBtn = row.querySelector(".btn-minus");
        const quantityInput = row.querySelector(".quantity-input");

        plusBtn.addEventListener("click", () => {
            quantityInput.value = parseInt(quantityInput.value || 1) + 1;
            updateCart();
        });

        minusBtn.addEventListener("click", () => {
            let current = parseInt(quantityInput.value || 1);
            if (current > 1) {
                quantityInput.value = current - 1;
                updateCart();
            }
        });

        quantityInput.addEventListener("input", () => {
            updateCart();
        });
    });

    updateCart();
});
</script>
@endpush

@endsection

@extends('website.master')

@section('titel')
    Cart
@endsection


@section('body')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>cart</h2>
                            <ul>
                                <li><a href="javascript:void(0)">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>
                                    <a href="javascript:void(0)"><img src="{{asset($cart->options->image)}}"
                                            alt="cart" class=" "></a>
                                </td>
                                <td><a href="javascript:void(0)">{{$cart->name}}</a>
                                    <div class="mobile-cart-content">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="{{ $cart->qty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">{{ $cart->price }}</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="javascript:void(0)"><i class="fa-solid fa-delete-left"></i></a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{{ $cart->price }}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <form action="{{route('carts.update', $cart->rowId)}}" method="POST">
                                        @csrf
                                            @method('PUT')
                                        <div class="input-group">
                                            <input type="number" name="quantity" min="1" class="form-control input-number"
                                                value="{{ $cart->qty }}"/>
                                             <button type="submit">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">{{ $cart->price*$cart->qty }}</h2>
                                </td>
                                <td>
                                    <form action="{{ route('carts.destroy', $cart->rowId)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" ><i class="fa-solid fa-delete-left"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>{{ Cart::subtotal() }}</h2>
                                </td>
                            </tr>
                        <tr>
                            <td>Tax Amount</td>
                            <td>
                                <h2>{{$tax = round(Cart::subtotal() * 0.15)}}</h2>
                            </td>
                        </tr>
                        <tr>
{{--                            <td>Shipping Cost :</td>--}}
{{--                            <td>--}}
{{--                                <h2>{{ $totalPayable = Cart::subtotal() + $tax + $shipping }}</h2>--}}
{{--                            </td>--}}
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-12"><a href="javascript:void(0)" class="btn btn-normal">continue shopping</a> <a
                        href="{{route('checkout')}}" class="btn btn-normal ms-3">check out</a></div>
            </div>
        </div>
    </section>
    <!--section end-->
@endsection

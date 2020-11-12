@extends('layouts.master')


@section('title','Dashboard')


@push('css')
        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endpush


@section('content')

    <div class="row">
        <div class="col-md-7 col-md-offset-1 pay">
            <h3 class="mb-3" style="margin-left: 15px">Billing address</h3>
            <form action="{{ route('bill_pay',$tree->id) }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                <div class="col-md-11 col-lg-11 ">
                    <div class="form-group">
                        <label>Full Name (Mandatory)</label>
                        <input type="text" name="customer_name"  value="{{ old('customer_name') }}" class="form_input form-control input-lg" placeholder="Enter Your Name"/>
                        <input type="hidden" name="tree_id" value="{{ $tree->id }}">
                    </div>
                    <div class="error">

                    </div>
                </div>

                <div class="col-md-11 col-lg-11 ">
                    <div class="form-group">
                        <label>Mobile No (Mandatory)</label>
                        <input type="text" name="customer_mobile"  value="{{ old('customer_mobile') }}" class="form_input form-control input-lg" placeholder="Enter Your Mobile No"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label>Email (Optional)</label>
                        <input type="text" name="customer_email"  value="" class="form_input form-control input-lg" placeholder="Your Email"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label for="city">City (Optional)</label>
                        <select class="form_input form-control input-lg" id="city" name="city">
                            <option value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label>Shipping Address (Mandatory)</label>
                        <input type="text" name="customer_address"  value="{{ old('customer_address') }}" class="form_input form-control input-lg" placeholder="Your Address"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="hidden" id="price" value="{{$tree->price}}">
                        <input type="hidden" id="stock" value="{{$tree->qty}}">
                        <input type="number" name="qty" id="qty" value="{{ old('qty') }}" class="form_input form-control input-lg" placeholder="Tree Quantity" min="1" max="{{$tree->qty}}"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label for="price">Amount to be Paid</label>
                        <input id="total" type="text" class="form_input form-control input-lg" value="" name="total_price" readonly>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <input type="submit" value="Confirm Puchase" class="form_input form-control input-lg btn-success"/>
                    </div>
                </div>

            </form>

        </div>


        <div class="col-md-4 cart">
            <div class="col-md-12">

                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="">Tree</span>
                </h4>
                <h5 class="text-right mb-3 mt-1 text-primary"><b>In Stock : <span id="in_stock">{{ $tree->qty }}</span></b></h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h5 class="my-0"><b> Name : {{ $tree->name }}</b></h5>
                            <h5 class="">Category : {{ $tree->category->name }}</h5>
                            <h5 class="">Nursery : {{ $tree->user->name }}</h5>
                            <h5>Unit Price : {{ $tree->price }} Tk</h5>

                        </div>
                        <span class="">{{ str_limit($tree->details,100) }}</span>

                    </li>


                    {{--<li class="list-group-item d-flex justify-content-between">--}}
                        {{--<strong>In Stock :{{ $tree->qty }} </strong>--}}
                    {{--</li>--}}

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Price (BDT) : </span>
                        <strong id="total1"> </strong>
                    </li>
                </ul>
            </div>

        </div>

    </div>
@endsection


@push('js')

    <script src="http://www.codermen.com/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#qty').change(function(){
                var total;
                var available_stock;
                var price = $('#price').val();
                var stock = $('#stock').val();
                var qty = $('#qty').val();
                $('#qty').each(function(){
                    if(qty != '')
                    {
                        total = parseInt(qty)*parseInt(price);
                        available_stock = parseInt(stock)-parseInt(qty);

                    }
                });
                $('#total1').html(total);
                $('#total').val(total);
                $('#in_stock').html(available_stock);
            });

        });

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


@endpush
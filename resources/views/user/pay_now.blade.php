@extends('layouts.master')


@section('title','Payment')


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
            <form action="{{ route('pay_pending_bill',$order->id) }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                <div class="col-md-11 col-lg-11 ">
                    <div class="form-group">
                        <label>Full Name (Mandatory)</label>
                        <input type="text" name="customer_name"  value="{{ $order->customer_name }}" class="form_input form-control input-lg" placeholder="Enter Your Name"/>
                        {{--<input type="hidden" name="tree_id" value="{{ $tree->id }}">--}}
                    </div>
                </div>

                <div class="col-md-11 col-lg-11 ">
                    <div class="form-group">
                        <label>Mobile No (Mandatory)</label>
                        <input type="text" name="customer_mobile"  value="{{ $order->customer_mobile }}" class="form_input form-control input-lg" placeholder="Enter Your Mobile No"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label>Email (Optional)</label>
                        <input type="text" name="customer_email"  value="{{ $order->customer_email }}" class="form_input form-control input-lg" placeholder="Your Email"/>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label for="city">City (Optional)</label>
                        <select class="form_input form-control input-lg" id="city" name="city">
                            <option value="">Choose...</option>
                            <option value="Dhaka"{{ $order->city == 'Dhaka' ? 'selected' : ''}}>Dhaka</option>
                            <option value="Sylhet"{{ $order->city == 'Sylhet' ? 'selected' : ''}}>Sylhet</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <label>Shipping Address (Mandatory)</label>
                        <input type="text" name="customer_address"  value="{{ $order->customer_address }}" class="form_input form-control input-lg" placeholder="Your Address"/>
                    </div>

                </div>

                <div class="col-md-11 col-lg-11">

                    <div class="form-group">
                        <label for="price">Amount to be Paid</label>
                        <input  type="text" class="form_input form-control input-lg" value="{{ round($order->amount,2) }}" id="price" name="" disabled>

                    </div>

                </div>

                <div class="col-md-11 col-lg-11">
                    <div class="form-group">
                        <input type="submit" value="Pay Now" class="form_input form-control input-lg btn-success"/>
                    </div>
                </div>

            </form>

        </div>


        <div class="col-md-4 cart">
            <div class="col-md-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="">Tree</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h5 class="my-0"><b> Name : {{ $order->tree->name }}</b></h5>
                            <h5 class="">Category : {{ $order->tree->category->name }}</h5>
                        </div>
                        <span class="">{{ str_limit($order->tree->details,100) }}</span>
                    </li>


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Price (BDT) : </span>
                        <strong>{{ round($order->amount,2) }} TK</strong>
                    </li>
                </ul>
            </div>

        </div>

    </div>
@endsection


@push('js')
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
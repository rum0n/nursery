@extends('layouts.master')

@section('title','Order Details')


@push('css')

@endpush


@section('content')

    {{--<div class="my_panel panel panel-body" >--}}



    <div class="container emp-profile" style="min-height: 604px;">
        <form method="post">
            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-4 col-md-offset-4 order_img" >
                        <img src="{{ asset('images/treePic/'.$order->tree->picture) }}" alt="Donation Picture" class="img img-responsive img-thumbnail mb-5" width="300">
                    </div>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="order_table">Tree Name</th><td >{{ $order->tree->name }}</td>
                        </tr>
                        <tr>
                            <th>Tree Category</th><td>{{ $order->tree->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th><td>{{ $order->user->name }}</td>
                        </tr>

                        <tr>
                            <th>Price</th><td>{{ $order->amount }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Id</th><td>{{ $order->transaction_id }}</td>
                        </tr>

                        <tr>
                            <th>Shipping Address</th><td>{{ $order->customer_address }}</td>
                        </tr>
                        <tr>
                            <th>Shipping City</th><td>{{ $order->city }}</td>
                        </tr>
                        <tr>
                            <th>Customer Mobile</th><td>{{ $order->customer_mobile }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>
                                <span class="btn btn-sm btn-{{$order->status == 'Pending'? 'warning' : 'success'}}">{{ $order->status }}</span>
                            </td>

                        </tr>
                        <tr>
                            <th>Tree Details</th><td>{{ $order->tree->details }}</td>
                        </tr>

                    </table>
                </div>

            </div>
        </form>
    </div>

    {{--</div>--}}

@endsection


@push('js')

@endpush
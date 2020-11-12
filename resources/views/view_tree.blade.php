@extends('layouts.master')


@section('title','Dashboard')


@push('css')

@endpush


@section('content')

    <div class="container" style="min-height: 500px;">
        <div class="tree_div col-lg-10 col-lg-offset-1" >
            <div><h1 class="text-center">{{ $tree->name }}</h1 >
                <div class="col-lg-6" >
                    <img src="{{ asset('images/treePic/'.$tree->picture) }}">
                </div>
                <div class="col-lg-6" >
                    <h3 style="text-align: justify;" class="text-center">Tree's Category : {{ $tree->category->name }}</h3>
                    <h4 style="text-align: justify;" class="text-center">Nursery : <span class="text-primary">{{ $tree->user->name }}</span></h4>
                    <h4 style="text-align: justify;" class="text-center text-info">Details :</h4>
                    <h4 style="text-align: justify;" class="text-center">{{ $tree->details }}</h4>
                    <h3 style="text-align: justify;color: blue;" class="text-center">Price : {{ $tree->price }} Tk.</h3>
                    <h3 style="text-align: justify;color: #298ee6;" class="text-center">Available In Stock : {{ $tree->qty }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-lg-offset-1">
            <center>
                @auth
                    @if(Auth::user()->role_id==3)
                        <a href="{{ route('pay',$tree->id) }}"> <button type="button" class="btn btn-primary btn-lg">Buy Now</button> </a>
                        {{--<a href="{{ route('payment',$tree->id) }}"> <button type="button" class="btn btn-primary btn-lg">Buy Now</button> </a>--}}
                    @endif
                @endauth

                @guest
                    <h4 class="text-danger">Please!! Login to Buy</h4>
                @endguest

            </center>

        </div>
    </div>

@endsection


@push('js')

@endpush
@extends('layouts.master')

@section('title','Nursery')

@section('content')

    <div class="container" >
        <form action="{{ route('search_tree') }}" method="get">
            @csrf
            <div class="col-lg-8" >
                <div class="form-group">
                    <input type="text" class="form-control input-lg"  name="tree_name" value="{{ $message }}" placeholder="Search Here" required>
                </div>
            </div>
            <div class="col-lg-4" >
                <div class="form-group">
                    <input type="submit" class="form-control btn-primary input-lg"  name="" value="Search" >
                </div>
            </div>
        </form>
    </div>

    <section class="tree"  style="min-height: 430px;">
        <div class="container" >

            <h2 class="text-center" >Search Result</h2>

            @foreach($trees as $tree)
                <div class="tree_div col-lg-4" >
                    <a href="{{ route('single_tree',$tree->id) }}" title="See Details">
                        <img src="{{ asset('images/treePic/'.$tree->picture) }}">
                        <div class="centered col-md-4 col-lg-4">
                            <h2>{{ $tree->name }}</h2><br>
                            <h3>{{ $tree->category->name }}</h3>
                            {{--<h3>{{ str_limit($tree->details, 15) }}</h3>--}}

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <span class="paginates">{{$trees->links()}}</span>
    </section>


@endsection

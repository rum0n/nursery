@extends('layouts.master')

@section('title','My Nursery')

@section('content')

    <section class="header_area" >
        <div class="container">
            <div class="form_area col-md-10 col-lg-10 col-lg-offset-1">
                <form action="{{ route('search_tree') }}" method="get" >
                    @csrf
                    <div class="col-lg-8" >
                        <div class="form-group">
                            <input type="text" class="form-control input-lg"  name="tree_name" value="{{ old('tree_name') }}" placeholder="Search Here" required>
                        </div>
                    </div>
                    <div class="col-lg-4" >
                        <div class="form-group">
                            <input type="submit" class="form-control btn-primary input-lg"  name="" value="Search" >
                        </div>
                    </div>
                </form>
            </div>
            <!--    </div>-->
            <!--</section>-->

            <!-- <section class="tree" >-->
            <div class="all-tree" >
                <h2 class="text-center" >Trees We Have</h2>

                @foreach($trees as $tree)
                    <div class="tree_div col-lg-4" >
                        <a href="{{ route('single_tree',$tree->id) }}" title="See Details">
                            <img src="{{ asset('images/treePic/'.$tree->picture) }}">
                            <div class="centered col-md-4 col-lg-4">
                                <h2>{{ $tree->name }}</h2><br>
                                <h3>{{ $tree->category->name }}</h3><br>
                                <h3 class="">{{ $tree->price }} Tk</h3>

                            </div>
                        </a>
                    </div>
                @endforeach


            </div>

        </div>
        <span class="paginates">{{$trees->links()}}</span>
    </section>

@endsection

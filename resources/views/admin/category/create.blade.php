@extends('layouts.master')

@section('title','Add Category')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >
        <div class="container" style="text-align: left; background: #DDDDDD;">
            @include('layouts.sidebar')

            <div class="right_area col-lg-9" >
                <div class="right_area_form col-lg-8 col-lg-offset-2" >

                    <center><h2 style="color: black; font-size: 30px; margin-top: 15px; margin-bottom: 15px" >Add Tree Category</h2></center>
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form_input form-control input-lg" placeholder="Enter Category Name"/>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="file" name="image"  value="{{ old('image') }}" class="form_input form-control input-lg" placeholder="Enter Your Email"/>
                            </div>

                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <input type="submit" value="Add Category" class="form-control btn-success " />
                            <br>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection


@push('js')

@endpush
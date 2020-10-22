@extends('layouts.master')


@section('title','Customer Orders')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >
        <div class="container" style="text-align: left; background: #DDDDDD;">

            @include('layouts.sidebar')

            <div class="right_area col-lg-9" >
                <h2 style="color: white;" class="text-center">All Trees</h2>
                <table class="table table-bordered table-responsive  ">
                    <thead>
                    <tr>


                        <th>Name</th>
                        <th>Category</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody>

                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><img style="height:100px;width:180px;" src="" />img</td>


                        <td><a href="#">
                                <button class="btn btn-success" > <span class="glyphicon glyphicon-edit"></button></a> | <a onclick="return confirm('Are You Sure to Delete It?')" href="#">
                                <button class="btn btn-warning" ><span style="color:red;" class="glyphicon glyphicon-trash"></button></a></td>
                    </tr>


                    </tbody>



                </table>

            </div>

        </div>
    </div>

@endsection


@push('js')

@endpush
@extends('layouts.master')


@section('title','Update')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >

        <div class="container" style="text-align: left; background: #DDDDDD;">
            @include('layouts.sidebar')

            <div class="right_area col-lg-9" >
                <div class="right_area_form col-lg-8 col-lg-offset-2" >

                    <center><h2>Add Tree</h2></center>

                    <form action="{{ route('owner.tree.update',$tree->id) }}" name="tree_edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="text" name="name"  value="{{ $tree->name }}" class="form_input form-control input-lg" placeholder="Enter Tree Name"/>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <select class="form-control input-lg" id="sel1" name="category_id" >
                                    <option value="">Select Category Name</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"{{ $tree->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="text" name="price"  value="{{ $tree->price }}" class="form_input form-control input-lg" placeholder="Enter Tree Price"/>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="text" name="qty"  value="{{ $tree->qty }}" class="form_input form-control input-lg" placeholder="Enter Tree Quantity"/>
                            </div>
                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <textarea class="form-control" name="details" placeholder="Enter Tree Details" rows="3">{{ $tree->details }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <div class="form-group">
                                <input type="file" name="picture"  value="" class="form_input form-control input-lg" placeholder="Enter Your Email"/>
                            </div>

                        </div>

                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">

                            <input type="submit" value="Save Changes" class="form-control btn-primary" />
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@push('js')
    <script type="text/javascript">
        document.forms['tree-edit'].elements['category_id'].value = "{{ $tree->category->id}}"
    </script>
@endpush
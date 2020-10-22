@extends('layouts.master')

@section('title','All Category')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >
        <div class="container" style="text-align: left; background: #DDDDDD;">
            @include('layouts.sidebar')

            <div class="right_area col-lg-9" >

            <h3><i class="fa fa-angle-right"></i> Categories</h3>
            <hr>

            @if(count($categories)==0)
                <h3 class="text-danger">No Data Found</h3>
            @else
                <table class="table table-bordered table-responsive">

                    <thead>
                    <tr>
                        <th>S.I</th>
                        <th> Name</th>
                        <th> Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $x)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $x->name }}</td>
                            <td>
                                <img src="{{ asset('images/categoryPic/'.$x->image) }}" class="img-responsive img-thumbnail" width="100">
                            </td>

                            <td>

                                <button onclick="deletePost({{ $x->id }})" type="submit" class="btn btn-danger btn ml-1"  >Delete</button>
                                <form id="delete-form-{{ $x->id }}" action="{{ route('admin.category.destroy',$x->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @endif

        </div>

        </div>
    </div>


@endsection


@push('js')

    <script type="text/javascript">
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                    // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                )
            }
        })
        }
    </script>
@endpush
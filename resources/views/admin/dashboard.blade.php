@extends('layouts.master')


@section('title','Admin Panel')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >
        <div class="container" style="text-align: left; background: #DDDDDD;">

            @include('layouts.sidebar')

            <div class="right_area col-lg-9" >

                <h3><i class="fa fa-angle-right"></i> Trees</h3>
                <hr>

                @if(count($trees)==0)
                    <h3 class="text-danger">No Data Found</h3>
                @else
                    <table class="table table-bordered table-responsive">

                        <thead>
                        <tr>
                            <th> S.I</th>
                            <th> Name</th>
                            <th> Category</th>
                            <th> Price</th>
                            <th> Details</th>
                            <th> Image</th>
                            <th> Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($trees as $x)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $x->name }}</td>
                                <td>{{ $x->category->name }}</td>
                                <td>{{ $x->price }}</td>
                                <td>{{ str_limit($x->details, 30) }}</td>
                                <td>
                                    <img src="{{ asset('images/treePic/'.$x->picture) }}" class="img-responsive img-thumbnail" width="100">
                                </td>

                                <td>
                                    @if($x->status == 'Pending')
                                        <a href="{{ route('admin.status',$x->id) }}"><span class="btn btn-xs btn-warning">{{ $x->status }}</span></a>
                                    @else
                                        <span class="btn btn-xs btn-success font-weight-bold" disabled>{{ $x->status }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('single_tree',$x->id) }}" class="btn btn-success btn-sm ml-1" title="Edit"><i class="fa fa-eye"></i></a>

                                    <button onclick="deletePost({{ $x->id }})" type="submit" class="btn btn-danger btn-sm ml-1"  ><i class="fa fa-trash"></i></button>
                                    <form id="delete-form-{{ $x->id }}" action="{{ route('admin.delete_tree',$x->id) }}" method="POST">
                                        @csrf
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
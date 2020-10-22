@extends('layouts.master')

@section('title','My Orders')


@push('css')

@endpush


@section('content')

    <div class="my_panel panel panel-body" >
        <div class="container" style="text-align: left; background: #DDDDDD;">

            {{--@include('layouts.sidebar')--}}

            <div class="right_area col-lg-12" >

                <h3><i class="fa fa-angle-right"></i> Purchased Trees</h3>
                <hr>

                @if(count($orders)==0)
                    <h3 class="text-danger">No Data Found</h3>
                @else
                    <table class="table table-bordered table-responsive">

                        <thead>
                        <tr>
                            <th>S.I</th>
                            <th>Tree Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Nursery Owner</th>
                            <th>Transaction Id</th>
                            <th>PaymentStatus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $x)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $x->tree->name }}</td>
                                <td>{{ $x->tree->category->name }}</td>
                                <td>{{ $x->amount }}</td>
                                <td>{{ $x->tree->user->name }}</td>
                                <td>{{ $x->transaction_id }}</td>
                                <td>
                                    {{--<span class="btn btn-xs btn-{{$x->status == 'Pending'? 'warning' : 'success'}}">{{ $x->status }}</span></td>--}}
                                @if($x->status == 'Success')
                                        <span class="btn btn-xs btn-success">Paid</span>
                                @else
                                        <a href="{{ route('pay_now',$x->id) }}" class="btn btn-warning btn-sm ml-1">Pay Now</a>

                                @endif
                                <td>
                                    <a href="{{ route('user.order',$x->id) }}" class="btn btn-primary btn-sm ml-1" title="See Details"><i class="fa fa-eye"></i></a>
                                    {{--<a href="{{ route('user.tree.edit',$x->id) }}" class="btn btn-primary btn-sm ml-1" title="Edit"><i class="fa fa-edit"></i></a>--}}

                                    <button onclick="deletePost({{ $x->id }})" type="submit" class="btn btn-danger btn-sm ml-1"  ><i class="fa fa-trash"></i></button>
                                    <form id="delete-form-{{ $x->id }}" action="{{ route('user.delete',$x->id) }}" method="POST">
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
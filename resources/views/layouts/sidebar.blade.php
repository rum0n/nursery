

<div class="left_area col-lg-3" >

    <ul>

        @if(Auth::user()->role_id==1)

            <li><a class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">All Trees</a> </li>
            <li><a class="{{ Request::is('admin/order*') ? 'active' : '' }}" href="{{ route('admin.order.index') }}">Orders</a> </li>
            <li><a class="{{ Request::is('admin/category/create') ? 'active' : '' }}" href="{{ route('admin.category.create') }}">Add Tree Category</a> </li>
            <li><a class="{{ Request::is('admin/category') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">All Categories</a> </li>

        @elseif(Auth::user()->role_id==2)

            <li><a class="{{ Request::is('owner/tree') ? 'active' : '' }}" href="{{ route('owner.tree.index') }}">My Trees</a> </li>
            <li><a class="{{ Request::is('owner/tree/create') ? 'active' : '' }}" href="{{ route('owner.tree.create') }}">Add Tree</a> </li>

            <li><a class="{{ Request::is('owner/order*') ? 'active' : '' }}" href="{{ route('owner.order.index') }}">Sold Trees</a> </li>
        @else
            {{--<li><a href="{{ route('user.dashboard') }}">My Order</a> </li>--}}
        @endif

    </ul>

</div>


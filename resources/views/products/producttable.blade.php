<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


@extends('layouts.master')
@section('content')
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $items)
        <tr>
            <td>{{ $items->id }}</td>
            <td>{{ $items->name }}</td>
            <td>{{ $items->price }}</td>
            <td>{{ $items->amount }}</td>
             <td><img src="{{ $items->imagepath }}" style="height: 100px; width: 100px"></td>

             <td>   <a href="/removeproduct/{{$items->id}}" class="btn btn-danger"><i class="fas fa-trash"></i> Delet Product</a>
    				<a href="/editproduct/{{$items->id}}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Edit Product</a>
                    <a href="/addproductimages/{{$items->id}}" class="btn btn-dark"><i class="fas fa-image"></i> Add images</a></td>

                </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<script>
    $(document).ready(function () {
       let table = new DataTable('#myTable');
});
</script>


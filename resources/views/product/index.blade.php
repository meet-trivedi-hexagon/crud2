@extends('product.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud demo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th> Product Name</th>
            <th>Product Image</th>
            <th>Product Qty</th>
            <th>Product Price</th>
            <th>Product Total</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($product as $pro)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pro->name }}</td>
            <td>{{ $pro->file_path }}</td>
            <td>{{ $pro->qty }}</td>
            <td>{{ $pro->price }}</td>
            <td>{{ $pro->total }}</td>
            <td>
                <form action="{{ route('product.destroy',$pro->id) }}" method="POST">
                   
                    <a class="btn btn-info" href="{{ route('product.show',$pro->id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('product.edit',$pro->id) }}">Edit</a>
                   
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $product->links() !!}
      
@endsection 
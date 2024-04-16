@extends('admin.layout')

@section('title')
    Variants |
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Variant</h1>
        
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.product.posts.index',['product' => request()->segment(3)]) }}">Product</a>
            </div>
            <div class="breadcrumb-item active">Variant</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.product.variants.create', ['product' => request()->segment(3)]) }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Variant
                    </a>    
                </div>
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    <table class="table table-responsive-sm table-striped table-vertical-align">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 20px;">No</th>
                                <th style="width: 110px;">Preview</th>
                                <th>Information</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($variants as $key => $variant)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <div class="thumbnail">
                                        <img class="img-thumbnail" src="{{ @$variant->image->sm }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <b>{{ $variant->name }}</b> <br>
                                    <span>{{ $variant->size }}</span> <br>
                                    <span>{{ $variant->price }}</span> <br>
                                    <span>{{ $variant->stock }}</span> <br>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{ route('admin.product.variants.edit', ['product' => $product_post_id, 'variant' => $variant->id]) }}">Edit</a>

                                            <form action="{{ route('admin.product.variants.destroy',  $variant->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Delete</button>
                                            </form>
                
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if ($variants->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center"> <b>Table is empty</b> </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $variants->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop

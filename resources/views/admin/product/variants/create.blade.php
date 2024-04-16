@extends('admin.layout')

@section('title')
    Create Variant  |
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Variant</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.product.posts.index') }}">Product</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('admin.product.variants.index', ['product' => $product_post_id]) }}">Variant</a>
            </div>
            <div class="breadcrumb-item active">Create</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" action="{{ route('admin.product.variants.store', ['product' => $product_post_id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_post_id" value="{{ request()->route('product') }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <div class="controls">
                                <input class="form-control" id="name" size="16" type="text" name="name" placeholder="Name of the Variant">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Size</label>
                            <div class="controls">
                                <input class="form-control" id="name" size="16" type="text" name="size" placeholder="Size of the Variant">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <div class="controls">
                                <input class="form-control" id="name" size="16" type="number" name="price" placeholder="Price of the Variant">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Stock</label>
                            <div class="controls">
                                <input class="form-control" id="name" size="16" type="numbert" name="stock" placeholder="Stock of the Variant">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img-container">Image</label>
                            <div class="d-flex">
                                <img src="{{ asset('static/admin/img/default.png') }}" alt="photo">
                                <div class="custom-file ml-3">
                                    <input
                                        id="photo"
                                        type="file"
                                        name="image"
                                        class="custom-file-input"
                                        onchange="document.querySelector('.form-group img').src = window.URL.createObjectURL(this.files[0])"
                                        accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('admin.product.variants.index', ['product' => $product_post_id]) }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Cancel
                            </a>
                            <button class="btn btn-primary ml-2" type="submit">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
</section>
@stop

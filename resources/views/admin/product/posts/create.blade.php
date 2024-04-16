@extends('admin.layout')

@section('title')
    Create Product Posts |
@endsection

@section('additional-styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Posts</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    Product
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.product.posts.index') }}">Posts</a>
                </div>
                <div class="breadcrumb-item active">
                    Create
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if (Session::has('status'))
                    <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endif
                <form class="form-horizontal" action="{{ route('admin.product.posts.store') }}" method="post"
                    enctype="multipart/form-data" id="form-posts">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="title">Title</label>
                                <div class="controls">
                                    <input class="form-control" id="title" size="16" type="text" name="title"
                                        placeholder="Title of the product" value="{{ old('title') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="category">Category</label>
                                <div class="controls">
                                    <select class="form-control" id="category" name="product_category_id" required>
                                        <option disabled {{ old('product_category_id') ? '' : 'selected' }}>Please select
                                            the category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                                </option=>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="price">Price</label>
                                <div class="controls">
                                    <input class="form-control" id="price" size="16" type="number" name="price"
                                        placeholder="Price of product" value="{{ old('price') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="weight">Weight</label>
                                <div class="controls">
                                    <input class="form-control" id="price" size="16" type="text" name="weight"
                                        placeholder="Weight of product" value="{{ old('weight') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="link_shopee">Link Shopee</label>
                                <div class="controls">
                                    <input class="form-control" id="link_shopee" size="16" type="text"
                                        name="link_shopee" placeholder="Link Shopee of the product"
                                        value="{{ old('link_shopee') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_favorite">Favorite</label>
                                <div class="form-check">
                                    <input class="form-check-input mt-2 " type="checkbox" id="is_favorite"
                                        name="is_favorite" value="1" style="width: 25px; height: 25px">
                                    <label class="form-check-label mt-2 ml-3" for="is_favorite">Mark as favorite</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Cover</label>
                        <div class="controls">
                            <a href="javascript:void(0)" class="btn btn-success" onclick="addImage()"
                                style="margin-bottom: 20px;">
                                <i class="fa fa-image"></i> Add Image
                            </a>
                        </div>
                        <div class="row" id="image-added">
                            <div class="col-md-3 halo" style="margin-bottom:40px;">
                                <div class="custom-file">
                                    <input id="photo" type="file" name="image[]" class="custom-file-input"
                                        onchange="document.querySelector('img#photo').src = window.URL.createObjectURL(this.files[0])"
                                        accept="image/*" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <img src="{{ asset('static/admin/img/default.png') }}" alt="photo" id="photo">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <div id="description" class="editor-container" data-placeholder="Description of the product">
                        </div>
                        <textarea name="description" class="d-none"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="important_note">Important Note</label>
                        <div id="important_note_editor" class="editor-container" data-placeholder="Important note for the product"></div>
                        <textarea name="important_note" class="d-none"></textarea>
                    </div>
                    

                    <div class="form-actions">
                        <a href="{{ route('admin.product.posts.index') }}" tabindex="-1" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <button class="btn btn-primary ml-2" type="submit">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @stop

    @section('additional-scripts')
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let editor = new Quill('#description', {
                    theme: 'snow',
                    placeholder: 'Description of the product'
                });

                const formAbout = document.querySelector('form#form-posts');
                const textAreaDescription = document.querySelector('textarea[name=description]');

                formAbout.addEventListener('submit', (e) => {
                    textAreaDescription.value = editor.root.innerHTML;
                });
            });
        </script>
        </script>
        <script type="text/javascript">
            let tahu = 0;

            function addImage() {
                tahu++;
                var wrap = $("#image-added");
                var kelas = "\'img#photo-" + tahu + "\'";
                var assets = "{{ asset('static/admin/img/default.png') }}";
                var html = '<div class="col-md-3 halo" style="margin-bottom:20px;">' +
                    '<div class="custom-file">' +
                    '<input id="photo-' + tahu +
                    '" type="file" name="image[]" class="custom-file-input" accept="image/*"                                  onchange="document.querySelector(' +
                    kelas + ').src = window.URL.createObjectURL(this.files[0])">' +
                    '<label class="custom-file-label" for="customFile">Choose file</label>' +
                    '</div>' +
                    '<img src="' + assets + '" alt="photo" id="photo-' + tahu + '">' +
                    '<a href="javascript:void(0)" onclick="imageRemove(this)" class="btn btn-icon btn-danger" title="delete"><i class="fas fa-trash"></i> Delete</a>' +
                    '</div>';

                $(wrap).append(html);
            }

            function imageRemove(that) {
                $(that).parents('.col-md-3').remove();
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Quill editor for important_note
                let importantNoteEditor = new Quill('#important_note_editor', {
                    theme: 'snow',
                    placeholder: 'Important note for the product'
                });
        
                const formPosts = document.querySelector('form#form-posts');
                const textAreaImportantNote = document.querySelector('textarea[name=important_note]');
        
                formPosts.addEventListener('submit', (e) => {
                    textAreaImportantNote.value = importantNoteEditor.root.innerHTML;
                });
            });
        </script>
        
    @endsection

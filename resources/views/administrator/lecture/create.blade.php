@extends('administrator/template')
@section('content')
<div class="container">
    <form action="{{ asset('lecture/create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <h3 class="fw-bold mt-3">Lecture Name</h3>
                <input type="text" name="name" id="" class="form-control">
                @if($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>
            <div class="col-sm-6">
                <h3 class="fw-bold mt-3">Price</h3>
                <input type="text" name="price" id="" class="form-control">
                @if($errors->has('price'))
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                @endif
            </div>
            <div class="col-sm-12">
                <h3 class="fw-bold mt-3">Category</h3>
                <select class="js-example-basic-single form-control" name="category_id[]" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('category_id'))
                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                @endif
            </div>
            <div class="col-sm-12">
                <h3 class="fw-bold mt-3">Category</h3>
                <textarea name="description" id="content" placeholder="Description" rows="5">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success fw-bold">Next <i class="fas fa-forward"></i></button>
        </div>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#content' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ],
            },
        } )
        .catch( error => {
            console.log( error );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                theme: "classic"
            });
        });
   </script>
</div>
@endsection
@extends('administrator/template')
@section('content')
<div class="container">
    <form action="{{ asset('lesson/create') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="lecture_id" value="{{ Request::get('id') }}">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <h3 class="fw-bold mt-3">Title</h3>
                <input type="text" name="title" value="{{ old('title') }}" id="" class="form-control">
                @if($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div class="col-sm-12">
                <h3 class="fw-bold mt-3">Description</h3>
                <textarea name="description" id="content" placeholder="Description" rows="5">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                @endif
            </div>
            <div class="col-sm-12">
                <h3 class="fw-bold mt-3">Video <small class="">only mp4,mkv files</small></h3>
                <video width="400" class="d-none" id="preview" controls>
                    <source src="" id="video_here">
                      Your browser does not support HTML5 video.
                  </video>
                <input type="file" name="file" id="video" class="form-control">
                @if($errors->has('file'))
                    <small class="text-danger">{{ $errors->first('file') }}</small>
                @endif
                @if($errors->any())
                    <small class="text-danger">please re-upload the video</small>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success fw-bold">Save</button>
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

    <script>
        $("#video").on('change',function(){
            $("#preview").removeClass('d-none');
            var $source = $('#video_here');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });
    </script>
</div>
@endsection
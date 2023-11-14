@extends('administrator/template')
@section('content')
<div class="container mt-4">
    <div class="row">
        @if ($lecture)
        <div class="col-sm-12">
            <h1>{{ $lecture->name }}</h1>
            {!! $lecture->description !!}
            <hr>
            <div class="d-flex justify-content-between">
              <h1>Lessons</h1>
              <a href="{{ asset('administrator/lecture/lesson?id='.$lecture->id) }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Lesson</a>
            </div>
            <div class="accordion" id="accordionExample">
              @foreach ($lesson as $item)
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                      {{ $item->title }}
                    </button>
                  </h2>
                  <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="d-flex justify-content-center">
                        <video src="{{ asset('assets/lesson-video').'/'.$item->file }}" width="400" controls></video>
                      </div>
                      {!! $item->description !!}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        @else
        <div class="col-sm-12">
            <h1>Lectures</h1>
        </div>
            @foreach ($lectures as $item)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                        <hr>
                        <a href="{{ asset('administrator/lecture?id='.$item->id) }}" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn text-warning">Published</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
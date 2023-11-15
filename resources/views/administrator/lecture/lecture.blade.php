@extends('administrator/template')
@section('content')
<div class="container mt-4">
  <div class="row">
    @if ($lecture)
    <div class="col-sm-12">
      <div class="d-flex justify-content-between">
        <div>
          <h1>{{ $lecture->name }}</h1>
        </div>
        <div>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings 
            </button>
            <ul class="dropdown-menu">
              <li><button class="dropdown-item" type="button">Edit</button></li>
              <li><button class="dropdown-item" onclick="deleteLecture()" type="button">Delete</button></li>
            </ul>
          </div>
        </div>
      </div>
      {!! $lecture->description !!}
      <hr>
      <div class="d-flex justify-content-between">
        <h1>Lessons</h1>
        <a href="{{ asset('administrator/lecture/lesson?id='.$lecture->id) }}" class="btn btn-success"><i
            class="fas fa-plus"></i> Add Lesson</a>
      </div>
      <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
        @foreach ($lesson as $item)
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="btn btn-primary w-100 text-left collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapse{{ $item->id }}" aria-expanded="false"
              aria-controls="flush-collapse{{ $item->id }}">
              <div class="d-flex justify-content-between">
                <div>
                  {{ $item->title }}
                </div>
                <div>
                  <a href="" class="text-warning"><i class="fas fa-edit"></i></a>
                  <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                </div>
              </div>
            </button>
          </h2>
          <div id="flush-collapse{{ $item->id }}" class="accordion-collapse collapse"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="d-flex justify-content-center">
                {{-- <video id="video{{ $item->id }}" src="#" width="400" controls></video> --}}
                <video id="video{{ $item->id }}" class="video-js" src="{{ asset('assets/lesson-video').'/'.$item->file }}" controls preload="auto" width="640" height="264" poster="{{ asset('assets/lesson-video/thumbnail.svg')}}" data-setup="{}">
                </video>
              </div>
              {!! $item->description !!}
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
      <div class="col-sm-12 d-flex justify-content-center">
        {{ $lectures->links('pagination::bootstrap-4') }}
      </div>
    </div>
    @endif
  </div>
</div>
<script>
  function deleteLecture(){
    swal({
    title: "Are you sure?",
    text: "Once deleted, all lesson videos will be deleted",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Poof! data deleted successfully!", {
        icon: "success",
      });
    } else {
      swal("Your data is safe!");
    }
  });
  }
  
</script>

@endsection
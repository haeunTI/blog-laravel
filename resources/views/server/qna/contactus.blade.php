@extends('admin.dashboard')

@section('container')
<div class="page-content"> 
        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                      <div class="d-flex align-items-center">
                        <i data-feather="star" class="text-primary icon-lg me-2"></i>
                        <span>Q&A</span>
                      </div>
                      <div>
                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Forward"><i data-feather="share" class="text-muted icon-lg"></i></a>
                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Print"><i data-feather="printer" class="text-muted icon-lg"></i></a>
                        <a type="button" data-bs-toggle="tooltip" data-bs-title="Delete"><i data-feather="trash" class="text-muted icon-lg"></i></a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                      <div class="d-flex align-items-center">
                        <div class="me-2">
                          <img src="https://via.placeholder.com/36x36" alt="Avatar" class="rounded-circle img-xs">
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="text-body">{{ $data->nama }}</span> 
                          <span class="mx-2 text-muted">to</span>
                          <span class="text-body me-2">me</span>
                        </div>
                      </div>
                      <div class="tx-13 text-muted mt-2 mt-sm-0">{{ $data->created_at->format('l M d') }}</div>
                    </div>
                    <div class="p-4 border-bottom">
                      <p>{{$data->question }}</p>
                    </div>
                    <div class="p-3">
                      <div class="mb-3">User Data</div>
                      <ul class="nav flex-column">
                        <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="user" class="icon-lg text-muted"></span> Customer Email : {{ $data['email'] }} </a></li>
                    </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Balas Pertanyaan</h6>
                  @if ($data['isReply'] == 0)
                  <form class="forms-sample" method="POST" action="{{ route('admin.qna.reply') }}" id="myForm">
                    @csrf
                    <input type="hidden" name="from" value="contactus" >
                    <input type="hidden" name="email" value="{{ $data['email'] }}" >
                    <input type="hidden" name="id" value="{{ $data['id'] }}" >
                    <div class="col-sm-6">
                        <div class="mb-3 form-group">
                            <label for="subject" class="form-label">subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" autocomplete="off" @error('subject') is-invalid @enderror>
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="col-sm-12">
                        <div class="mb-3 form-group">
                            <label for="message" class="form-label">message</label>
                            <textarea class="form-control" name="message" id="tinymceExample" rows="10"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary me-2">Reply</button>
                    </div>
        
                  </form>
                  @else
                  <div class="alert alert-info">
                      QnA has been replied.
                  </div>
                  @endif
              </div>
            </div>
            
          </div>
        </div>

			</div>
@endsection
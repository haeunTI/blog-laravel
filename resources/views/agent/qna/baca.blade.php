@extends('agent.dashboard')

@section('container_agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content"> 
        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                      <div class="d-flex align-items-center">
                        <span>Q&A</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                      <div class="d-flex align-items-center">
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
                        <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="phone" class="icon-lg text-muted"></span> Customer Phone : {{ $data['phone'] }} </a></li>
                        @if ($data->id_item != null)
                          <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="file" class="icon-lg text-muted"></span> Property Name : {{ $data['item']['nama_property'] }}</a></li>
                          <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="file" class="icon-lg text-muted"></span> Property Code : {{ $data['item']['kode_property'] }}</a></li>  
                          <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="file" class="icon-lg text-muted"></span> Property Status : {{ $data['item']['status_property'] }}</a></li>  
                        @else
                          <li class="nav-item"><a href="javascript:;" class="nav-link text-body"><span data-feather="file" class="icon-lg text-muted"></span> No Property was asked</a></li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>         
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                  <h6 class="card-title">Balas Komentar</h6>
                  @if ($data['isReply'] == 0)
                  <form class="forms-sample" method="POST" action="{{ route('agent.qna.reply') }}" id="myForm">
                  @csrf
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
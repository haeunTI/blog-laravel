@extends('agent.dashboard')

@section('container_agent')

@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

@endphp
<div class="page-content">
        
        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 border-end-lg">
                    <div class="d-flex align-items-center justify-content-between">
                      <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                        <span class="icon"><i data-feather="chevron-down"></i></span>
                      </button>
                      <div class="order-first">
                        <h4>Mail Service</h4>
                        <p class="text-muted">{{ $profileData->email }}</p>
                      </div>
                    </div>
                    <div class="email-aside-nav collapse">
                      <ul class="nav flex-column">
                        <li class="nav-item {{ $for == 'inbox' ? 'active' : '' }}">
                          <a class="nav-link d-flex align-items-center" href="{{ route('agent.qna') }}">
                            <i data-feather="inbox" class="icon-lg me-2"></i>
                            Inbox
                            @if ($for == "inbox")
                            <span class="badge bg-danger fw-bolder ms-auto">{{ count($data) }}                              
                            @endif
                          </a>
                        </li>
                        <li class="nav-item {{ $for == 'all' ? 'active' : '' }}">
                          <a class="nav-link d-flex align-items-center" href="{{ route('agent.qnaAll') }}">
                            <i data-feather="inbox" class="icon-lg me-2"></i>
                            All
                            @if ($for == "all")
                            <span class="badge bg-danger fw-bolder ms-auto">{{ count($data) }}                              
                            @endif
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="p-3 border-bottom">
                      <div class="row align-items-center">
                        <div class="col-lg-6">
                          <div class="d-flex align-items-end mb-2 mb-md-0">
                            <i data-feather="inbox" class="text-muted me-2"></i>
                            <h4 class="me-1">Inbox</h4>
                            <span class="text-muted">({{ count($data) }} messaages)</span>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search mail...">
                            <button class="btn btn-light btn-icon" type="button" id="button-search-addon"><i data-feather="search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="email-list">

                      <!-- email list item -->
                    @foreach ($data as $qna )
                    <div class="email-list-item email-list-item--unread">
                        <a href="{{ route('agent.qna.baca', $qna->id) }}" class="email-list-detail">
                          <div class="content">
                            <span class="from">{{ $qna->nama}}
                              @if ($qna->isReply == 1)
                                  <span class="badge bg-primary">Replied</span>
                              @endif
                            </span>
                            <p class="msg">{{ $qna->question }}</p>
                          </div>
                          <span class="date">
                          {{ $qna->created_at->format('l M d') }}                          </span>
                        </a>
                      </div>
                    @endforeach
                     

                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

			</div>
@endsection
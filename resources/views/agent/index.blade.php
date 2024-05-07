@extends('agent.dashboard')

@section('container_agent')

@php
$id = Auth::user()->id;
$agentId = App\Models\User::find($id);
$status = $agentId->status;
@endphp

<div class="page-content">

  @if ($status == "active")
    <h4>Selamat Datang!</h4>
  @else
    <h4>Akun anda sedang tidak aktif!</h4>
    <p>Silakan menunggu admin untuk aktivasi akun anda!</p>
  @endif

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">

  </div>

  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Total Properti</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">0</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Total Jadwal</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">0</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Total Messages</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">0</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->


</div>
@endsection
@php
$id = Auth::user()->id;
$agentId = App\Models\User::find($id);
$status = $agentId->status;
@endphp


<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      REAL<span>estate</span>Agent
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ route('agent.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      @if ($status == "active")
      <li class="nav-item nav-category">Fitur</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('agent.all.item') }}">
          <i class="link-icon" data-feather="anchor"></i>
          <span class="link-title">Property</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('agent.jadwal.tour') }}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Jadwal Tour</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('agent.qna') }}" class="nav-link">
          <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">QnA</span>
        </a>
      </li>
      @else

      @endif
      <li class="nav-item nav-category">Docs</li>
      <li class="nav-item">
        <a href="#" target="_blank" class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Documentation</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
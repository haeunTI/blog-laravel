<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        REAL<span>estate</span>
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
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.property')}}" class="nav-link">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Tipe Property</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.amenity')}}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Amenity</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.item')}}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Property</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.qna') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">QnA</span>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('admin.jadwal') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">Jadwal Tour</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.agent') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">Agent</span>
            </a>
          </li>
          <li class="nav-item nav-category">Blog Management</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="post">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Manage  post</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="post">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{ route('admin.tipe_blog') }}" class="nav-link">Kategori Post</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('post.all.type') }}" class="nav-link">Semua Post</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.comment') }}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Komentar</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('data.web')}}" class="nav-link">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Data Web</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

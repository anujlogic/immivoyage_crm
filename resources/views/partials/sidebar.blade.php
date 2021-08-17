  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ URL::asset('public/asset/image/fav_icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ImmiVoyage</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::check())
            @if(Auth::user()->image)
              <img src="{{ URL::asset('public/image/')}}/{{ Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
            @else
              <img src="{{ URL::asset('public/image/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
            @endif
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">@if(Auth::check()){{ Auth::user()->name }}@endif</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/applicant/create') }}" class="nav-link active canada_btn" style="background-color: #de0303 !important;">
              <i class="far fa-copy"></i>
              <p>Add New Application</p>
            </a>
          </li>
          @if(Auth::check() && Auth::user()->user_type=='client')
          <li class="nav-header">Assets</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Application</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Documents</p>
                </a>
              </li> 
            </ul>  
          </li>
          @elseif(Auth::check() && Auth::user()->user_type=='admin')
          <li class="nav-header">LEADS</li>
          <li class="nav-item">
            <a href="{{url('/client')}}" class="nav-link">
              <i class="fas fa-mobile-alt"></i>
              <p>Call Leads</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('call.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lead List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('call.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>  
          </li>
          <li class="nav-header">CLIENTS</li>
          <li class="nav-item">
            <a href="{{url('/client')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Clients</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/client') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('client.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>  
          </li>
          <li class="nav-header">MANAGEMENT</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                MANAGEMENT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('management.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('management.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">IELTS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-graduate"></i>
              <p>
                IELTS MANAGE
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ilets.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IELTS List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ilets.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">CAIPS NOTES</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                CAIPS  NOTES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('caips.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('caips.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">TUTORS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                TUTOR LIST
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tutor.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tutor List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tutor.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::check() && Auth::user()->user_type=='tutor')
             <!--  <li class="nav-header">MODULE</li>
              <li class="nav-item">
                <a href="{{url('/client')}}" class="nav-link">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <p>Module List</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('ielts.test.list') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Module List</p>
                    </a>
                  </li>
                </ul>  
              </li> -->
              <li class="nav-header">IELTS Test</li>
              <li class="nav-item">
                <a href="{{url('/client')}}" class="nav-link">
                  <i class="fas fa-book-open"></i>
                  <p>IELTS TEST</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('ielts.test.list') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Test List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ielts.test.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                </ul>  
              </li>
          @elseif(Auth::check() && Auth::user()->user_type=='lead')
              <li class="nav-header">ONLINE TEST</li>
              <li class="nav-item">
                <a href="{{url('/client')}}" class="nav-link">
                  <i class="fas fa-book-open"></i>
                  <p>TEST LIST</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('ielts.test.list') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>TEST LIST</p>
                    </a>
                  </li>
                </ul>  
              </li>
              <li class="nav-header">UPLOAD TEST</li>
              <li class="nav-item">
                <a href="{{url('/client')}}" class="nav-link">
                  <i class="fas fa-book-open"></i>
                  <p>UPLOAD TEST</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('test.upload.view') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>UPLOAD</p>
                    </a>
                  </li>
                </ul>  
              </li>
          @else
          <li class="nav-header">LEADS</li>
          <li class="nav-item">
            <a href="{{url('/client')}}" class="nav-link">
              <i class="fas fa-mobile-alt"></i>
              <p>Call Leads</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('call.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lead List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('call.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>  
          </li>
          <li  class="nav-header">CLIENTS</li>
          <li class="nav-item">
            <a href="{{url('/client')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Clients</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/client') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('client.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>  
          </li>
          <li class="nav-header">IELTS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-graduate"></i>
              <p> IELTS MANAGE <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ilets.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IELTS List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ilets.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>

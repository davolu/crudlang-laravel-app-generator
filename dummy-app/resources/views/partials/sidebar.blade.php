  <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        

        <li  {{{ (Request::is('dashboard') ? 'class=active' : '') }}}  >
          <a href="{{route('user.dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
<!--              <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
      





  

        <li   {{{ (Request::is('addpost') || Request::is('managepost') ? 'class=active treeview' : 'class=treeview') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('form.addpost')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route('view.managepost')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>






   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
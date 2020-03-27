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
      





 
        <li   {{{ (Request::is('addwallet') || Request::is('managewallet') ? 'class=active treeview' : 'class=treeview') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>Wallet</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('form.addwallet')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route('view.managewallet')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>

        <li   {{{ (Request::is('addnotification') || Request::is('managenotification') ? 'class=active treeview' : 'class=treeview') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>Notification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('form.addnotification')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route('view.managenotification')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>
 
 





   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
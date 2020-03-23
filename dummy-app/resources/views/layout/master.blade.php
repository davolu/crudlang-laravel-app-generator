<!doctype html>
<html lang="en">
<head>
	<title>@yield('title')</title>
<!-- Latest compiled and minified CSS -->
		@yield('styles')
 @include('partials.header')
 
 @include('partials.sidebar')
   
   
   
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
       </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        		@yield('content')
    </section>

	</div>	 

 
@include('partials.footer')
  
  @yield('scripts')

</body>
</html>
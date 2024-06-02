<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.frontend_layout.headerlink')

</head>
<body>


<!-- Wrap -->
<div id="wrap">



  @include('layouts.frontend_layout.header')
  <!-- Main Layout -->
  <main class="cd-main-content">

  @yield('home_content')
    @include('layouts.frontend_layout.footer')
  </main>

  @include('layouts.frontend_layout.footerlink')
  @yield('extra-scripts')
</div>
</body>
</html>

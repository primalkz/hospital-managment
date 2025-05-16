<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.dashboard.head')
<body>
  <!-- Sidebar -->
  @include('layout.dashboard.sidebar')
  @include('layout.dashboard.header')
  
  {{-- main content --}}
  @yield('content')
  
  @includeIf('layout.dashboard.scripts')
</body>
</html>
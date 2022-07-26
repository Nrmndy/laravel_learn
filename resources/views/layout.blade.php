
@include('layout.header')
@include('layout.nav')

<main role="main" class="container w-50">
    <div class="row">
        @yield('content')
    </div>
</main><!-- /.container -->

@include('layout.footer')

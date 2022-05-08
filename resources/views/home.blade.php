@extends('layouts.base')
@section('body')

<body class="full-screen register">
    <!-- Navbar -->
    @include('layouts.user.navbar')

    <div class="wrapper">
        <div class="page-header" style="background-image: url('{{ asset('assets') }}/img/sections/daniel-olahh.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="title">
                                <span>Welcome!</span>
                            </h1>
                            <p class="description">
                                This is the best app for you to get your work done.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.user.footer')
</body>

@endsection

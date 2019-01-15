@extends('layout')

@section('content')

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        @include('main.header')

        <main role="main" class="inner cover">
            <h1 class="cover-heading">"Roga & Kopyta"</h1>
            <p class="lead">Welcome to Bank system, which allows you to login, to create your own card and make some
                transactions.</p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Bank template by <strong>Roga</strong> team</p>
            </div>
        </footer>
    </div>

@endsection




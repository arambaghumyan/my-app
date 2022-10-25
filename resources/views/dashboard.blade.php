@extends('layouts.master')
@section('content')
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6 col-xl-5">
            <h2>{{ $user->username }}</h2>
            <form method="GET" action="{{ route('logout') }}">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
      </div>
    </div>
@endsection
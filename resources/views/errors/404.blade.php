@extends('layouts.app')


@section('content')
    <div class="not-found-page">
        <img src="{{asset('/images/whoops.png')}}"
             alt="Icon with a surprised face to indicate something went wrong while loading this page."
             class="header-icon">
        <h1>Oh dear!</h1>
        <p>Looks like something went wrong there.</p>
        <p>If you're seeing this issue repeatedly, please let us know.</p>
        <a href="{{ url()->previous() }}" class="button button-white">Go back</a>
    </div>
@endsection

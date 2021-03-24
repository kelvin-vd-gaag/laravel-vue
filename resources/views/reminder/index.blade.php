@extends('layouts.app')

@section('content')
    <div class="item-main-section">
        <img src="{{asset('/images/happiness-reminder.png')}}" alt="Logo of the happiness reminder feature." class="header-icon">
            <div class="feature-title">What are you grateful for today?</div>

        <a href="{{url('/reminder/create')}}" class="button button-white">Upload a <br>Picture</a>
        <a href="{{url('/reminders')}}" class="button button-white">View <br> Reminders</a>
    </div>
@endsection


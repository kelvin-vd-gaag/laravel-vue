@extends('layouts.app')

@section('content')
    <div class="intro">
        <div class="greeting" v-cloak>@{{ greet_message }}, <span class="user-name-greeting">{{ Auth()->user()->name }}</span>.</div>
        <div class="call-to-action">What would you like to do today?</div>
    </div>
    <div class="actions">
        <a href="{{url('/mood-tracker')}}">

            <div class="action">

                <img src="{{asset('/images/mood-tracker.png')}}" alt="Icon of the mood tracker feature">
                <div class="action-name">
                    Mood<br> Tracker
                </div>
            </div>
        </a>
        <a href="{{url('/daily-goals')}}">

            <div class="action">

                <img src="{{asset('/images/daily-goals.png')}}" alt="Icon of the mood tracker feature">
                <div class="action-name">
                    Daily<br> Goals
                </div>
            </div>
        </a>

        <a href="{{url('/take-a-breath')}}">

            <div class="action">
                <img src="{{asset('/images/take-a-breath.png')}}" alt="Icon of the mood tracker feature">
                <div class="action-name">
                    Take a<br> breath
                </div>
            </div>
        </a>
        <a href="{{url('/reminder')}}">

            <div class="action">
                <img src="{{asset('/images/happiness-reminder.png')}}" alt="Icon of the mood tracker feature">
                <div class="action-name">
                    Happiness<br> reminder
                </div>
            </div>
        </a>
        <a href="{{url('/gratitude')}}">

            <div class="action">

                <img src="{{asset('/images/gratitude-journal.png')}}" alt="Icon of the mood tracker feature">
                <div class="action-name">
                    Gratitude<br> Journal
                </div>
            </div>
        </a>

    </div>
@endsection


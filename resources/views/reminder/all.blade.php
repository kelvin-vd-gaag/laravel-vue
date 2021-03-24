@extends('layouts.app')

@section('content')
    <div class="item-main-section">
        <img src="{{asset('/images/happiness-reminder.png')}}" alt="Logo of the happiness reminder feature."
             class="header-icon">
        <div class="feature-title">Overview of your happiness reminders.</div>
        <div class="grateful-image-library">
            @foreach($reminders as $reminder)
                <div class="item">
                    <img src="{{ url('storage/' . $reminder->gratitude_image ) }}" alt="Image from the user {{Auth::user()->name}} with the description: {{$reminder->description}}">
                    <div class="item-data">
                        <div class="item-description">{{$reminder->description}}</div>
                        <div class="item-create-date">{{$reminder->created_at}}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{url('/reminder')}}" class="button button-white">Go back</a>
    </div>
@endsection


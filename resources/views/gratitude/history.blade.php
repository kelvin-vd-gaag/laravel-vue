@extends('layouts.app')

@section('content')
    <div class="item-main-section">
        <img src="{{asset('images/gratitude-journal.png')}}" alt="Logo of the gratitude journal feature"
             class="header-icon">
        <h1>History</h1>
        @if(count($lists) > 0)
            <div class="feature-title">What are you grateful for today?</div>
        @else
            <div class="gratitude-no-entry">
                <p>Looks like you haven't added any entries yet!</p>
            </div>
        @endif
        <div class="gratitude-list">
            @foreach($lists as $list)
                <ul>
                    @foreach($list as $item)
                        <li>{{$item->content}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        <a href="{{url('/gratitude')}}" class="button button-white">Go back</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="item-main-section">
        <img src="{{asset('/images/happiness-reminder.png')}}" alt="Logo of the happiness reminder feature.">
        <div class="feature-title">Upload a reminder</div>
        <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> Select a file
        </label>
        <form action="{{url('/reminder')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input id="file-upload" type="file" name="file-upload">
            <div class="form-actions">
                <input type="text" id="description" name="description" placeholder="Description">
                <input type="submit" value="submit">
            </div>
        </form>
    </div>
@endsection


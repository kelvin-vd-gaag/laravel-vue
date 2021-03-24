@extends('layouts.app')

@section('content')
    <div class="single-page">
        <h1>F.A.Q</h1>
        <p>Do you have questions? You can find the answer to some of them here. Is your question not answered after
            this?
            You can
            <a href="{{url('/contact')}}">contact us</a></p>
        <div class="faq">
            <div class="faq-item">
                <span class="font-weight-bold faq-question">Why do I need an account?</span>
                <span class="faq-answer">Because you do</span>
            </div>
            <div class="faq-item">
                <span class="font-weight-bold faq-question">Why do I need an account?</span>
                <span class="faq-answer">Because you do</span>
            </div>
            <div class="faq-item">
                <span class="font-weight-bold faq-question">Why do I need an account?</span>
                <span class="faq-answer">Because you do</span>
            </div>

        </div>
    </div>
@endsection


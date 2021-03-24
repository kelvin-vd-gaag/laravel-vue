<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    {{--TODO Check what user-scalable does exactly (default value is no)--}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/d6c5d52f3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <meta name="description" content="Temporary is a website where you can track your mental health">
    {{--Change the placeholder name of the meta description--}}
    <title>{{ url('') }}</title>
</head>
<body class="body">
<div id="app">
    <div class="overlay" v-if="nav_visible || show_bug_form" v-on:click="toggle_nav(false)" v-cloak></div>
    <div class="report-a-bug-form" v-if="show_bug_form" v-cloak>
        <form @submit="formSubmit" v-if="form">
            <div class="form-field">
                <label for="issue">Describe the issue you're running into.</label>
                <textarea id="issue" name="issue" v-model="issue" v-on:input="check_for_debug_input()">
                    @{{ issue }}
                </textarea>
            </div>
            <div class="form-field form-footer">
                <input type="submit" value="Submit the report" :disabled="!bug_form_send"
                       v-bind:class="{ submittable: bug_form_send}">
                <div class="word-counter" v-bind:class="{ 'warning-text': bug_word_count > 1000}">@{{ bug_word_count
                    }}/1000
                </div>

            </div>
        </form>
        <div class="bug-submitted" v-else>
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <span>Thank you!</span>
            <div class="thank-you-message">
                <span>We've received your report.</span>
            </div>
        </div>
    </div>
    <transition name="fade">
        <nav-component v-if="nav_visible" home="{{url('/home')}}" account="{{url('/account')}}"
                       settings="{{url('/settings')}}" privacy="{{url('/privacy')}}" about="{{url('/about')}}" faq="{{url('/faq')}}"></nav-component>
    </transition>
    <header>
        <a href="{{url('/home')}}"><img src="{{asset('/images/temporary-logo-web.png')}}" alt="Logo of the website"
                                        class="logo"></a>
        <div class="hamburger" id="hamburger-1" v-on:click="toggle_nav()" v-bind:class="{ 'is-active': nav_visible}">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    <div class="report-a-bug" v-bind:class="{ bugformopen: show_bug_form}">
        <i class="fas fa-times" v-if="show_bug_form" v-on:click="toggle_bug_form(false)" v-cloak></i>
        <img src="{{asset('/images/bug-icon.png')}}" alt="Icon of a bug" v-else v-on:click="toggle_bug_form(true)">
        <span v-if="show_bug_form === false" v-on:click="toggle_bug_form(true)">Found a bug?</span>
    </div>
    <footer>
        <img src="{{asset('/images/leaf-detail.png')}}" alt="">
        <div class="copyright">&copy; Temporary {{ now()->year }}</div>
    </footer>

</div>


<script src="{{asset('/js/app.js')}}" crossorigin="anonymous"></script>

</body>
</html>

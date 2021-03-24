<template>
        <nav>
            <ul>
                <li><a :href="home">Home</a></li>
                <li><a :href="account">Account</a></li>
                <li><a :href="settings">Settings</a></li>
                <li><a :href="privacy">Privacy</a></li>
                <li><a :href="about">About</a></li>
                <li><a :href="faq">FAQ</a></li>
                <li class="logout-url"><a href="#" >Logout</a></li>
            </ul>
        </nav>
</template>

<script>
export default {
    props: ['home','account','settings','privacy','about','faq'],
    name: "gratitude-component",
    mounted () {
        axios
            .get('gratitude')
            .then(response => (this.info = response))
    }
}
</script>

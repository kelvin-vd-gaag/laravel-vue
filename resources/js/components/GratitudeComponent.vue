<template>
    <div class="item-main-section">
        <img :src="'images/gratitude-journal.png'" alt="Logo of the gratitude journal feature"
             class="header-icon">
        <div class="feature-title">What are you grateful for today?</div>
        <div class="grateful">Today I feel grateful for:</div>
        <div class="gratitude-list" v-if="calculate_list_length > 0">
            <ul>
                <li v-for="item in list">
                    <div class="list-item-gratitude">{{ item.content }}</div>
                    <div class="edit-options">
                        <input type="image" :src="'images/renew.png'" @click="callEditForm(item.id, item.content)"
                               alt="Edit item">

                        <input type="image" :src="'images/delete.png'" @click="gratitudeDelete(item.id)"
                               alt="Delete item">
                    </div>
                </li>
            </ul>
        </div>
        <div class="form-container" v-if="calculate_list_length < 3" v-cloak>
            <form @submit="gratitudeSubmit" v-if="form_active">
                <div class="form-field">

                    <input type="text" placeholder="I am grateful for..." id="gratitude" name="gratitude "
                           v-model="gratitude" autocomplete="off" autofocus v-on:input="validate()" ref="gratitude"
                           v-cloak>
                    <input type="hidden" :value="gratitude_id" id="gratitude_id">
                </div>
                <input type="submit" :disabled="!submittable" value="Submit"
                       class="button button-blue submit-gratitude" v-bind:class="{ submittable: submittable}">
            </form>
            <div class="call-form" @click="set_form_status()" v-else></div>
        </div>
        <a href="gratitude/history" class="button button-white">History</a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            list: [],
            list_length: null,
            gratitude: null,
            form_active: true,
            submittable: false,
            gratitude_id: null,

        }
    },

    methods: {
        callEditForm(id, content) {
            this.gratitude = content;
            this.gratitude_id = id;
            if (this.form_active === false) {
                this.set_form_status();
            }
            this.$refs.gratitude.focus();



        },

        validate() {
            this.submittable = this.gratitude.length > 0;
        },


        gratitudeSubmit(e) {
            this.form = false;
            this.set_form_status();

            this.list.push(e)

            e.preventDefault();
            let currentObj = this;

            axios.post('gratitude', {
                id: this.gratitude_id,
                content: this.gratitude,
            }).then(response => {
                if (response.status === 200) {
                    this.grab_todays_gratitude();
                    this.gratitude = null;
                    this.gratitude_id = null;
                }
            }).catch(function (error) {
                currentObj.output = error;
            });
        },


        gratitudeDelete(id) {
            axios.delete('gratitude/' + id, {
                params: {
                    id: id,
                }
            }).then((response) => {
                this.grab_todays_gratitude();
            }, (error) => {
                // error callback
            })
        },

        grab_todays_gratitude() {
            axios
                .get('grab_gratitude')
                .then(response => (
                    this.list = response.data.list_today
                ))
        },

        set_form_status() {
            this.form_active = !this.form_active;
        },


    },

    created() {
        this.grab_todays_gratitude();
    },

    computed: {

        calculate_list_length() {
            return this.list && this.list.length;
        }
    }
}
</script>

<style scoped>

</style>

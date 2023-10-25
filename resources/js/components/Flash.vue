<template></template>
<script>
    import {EventBus} from "../app";

    export default {
        props: ['message', "active"],

        mounted() {
            EventBus.$on('flash', message => {
                this.flash(message)
            })
            if (this.active){
                this.flash('נוצלו יותר מ-50% מהתקציב','is-warning')
            }
        },

        methods:{
            flash(message, type = 'is-success') {
                this.$buefy.toast.open({
                    duration: 4000,
                    type: type,
                    message: message,
                    position: 'is-bottom-left',
                    actionText: null,
                    queue: false
                })
            }
        }

    }
</script>

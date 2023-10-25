<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "MonthsBar",
    props: ['months'],
    methods: {
        getHref(month){
           return `/activity/this-month/${month.month}/${month.year}`
        }
    }
})
</script>

<template>
<div class="buttons is-centered months-bar">
    <button class="button has-text-black is-rounded is-small" v-for="(month, index) in months" :key="index">
        <a :href=getHref(month) class="has-text-weight-bold">{{month.monthName}} {{month.year}}</a>
    </button>
</div>

</template>

<style scoped>
.months-bar{
    flex-wrap: nowrap;
    overflow-x: scroll;
    scrollbar-width: none;
}
@media (min-width: 1024px) {
    .months-bar{
        justify-content: center;
    }
}
@media (max-width: 768px) {
    .months-bar{
        justify-content: normal;
    }
}
</style>

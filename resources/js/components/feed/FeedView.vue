<script>
export default {
    name: "FeedView",
    props: ['feed'],
    data() {
        return {
            isLoading: false,
            info: '',
            lastFeed: null
        }
    },
    mounted() {
        this.lastFeed = this.feed;
    },
    methods: {
        addFeed() {
            this.isLoading = true
            axios.post('/feed', {info: this.info})
                .then(res => {
                this.isLoading = false;
                this.info = '';
                this.lastFeed = res.data;
            }).catch(error => {
                this.isLoading = false;
            }).finally(() => {
                this.isLoading = false;
            })
        }
    }
}
</script>

<template>
    <div class="container">
        <h1 class="title has-text-centered is-1-mobile">זמני האכלה</h1>
        <hr/>
        <div class="box">
          <b>{{lastFeed?.info}}</b>
        </div>
            <textarea v-model="info" class="textarea mrg-btm is-success" placeholder="מידע על ההאכלה"></textarea>
            <button :class="isLoading ? 'is-loading' : ''" class="button is-fullwidth is-success" @click="addFeed()">הוא אכל</button>
    </div>
</template>

<style scoped>
.mrg-btm {
    margin-bottom: 1.5rem;
}
</style>

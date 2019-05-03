<template>
<div>
    <div class="card" v-for="feed in feeds" :key="feed.id">
        <div class="card-header">
            <img :src="feed.user.avatar" width="30px" height="30px">  {{ feed.user.name }}

            <span> {{ feed.title }} </span>
            <span class="text-right"> {{ feed.created_at | moment }} </span>
        </div>
        <div class="card-body">
            {{ feed.description }}
        </div>
    </div>
</div>
</template>

<script>

import moment from 'moment';

export default {
    mounted() {
        // as soon as components is mounted get method
        this.get_feed();
    },
    data() {
        return {
            feeds: []
        }
    },
    methods: {
        get_feed() {
            this.$http.get('/feed').then((res) => {
                res.body.forEach((feed) => {
                    this.feeds.push(feed);
                });
            });
        }
    },
    filters: {
        moment: function(date) {
            return moment(date).fromNow();
        }
    }
}
</script>

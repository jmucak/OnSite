<template>
<div>
    <div class="feed" v-for="feed in feeds" :key="feed.id">
        <div class="feed__header">
            <figure class="feed__header--avatar">
                <img :src="feed.user.avatar" width="50px" height="50px">
                <span class="feed__header--date"> 
                    Published by {{ feed.user.name }} on {{ feed.created_at | moment }} 
                </span>
            </figure>
        </div>
        <hr>
        <div class="feed__body">
            <a :href="'/stories/' + feed.slug"><h4>{{ feed.title }}</h4></a>
            <p>
                {{ feed.description }}
            </p>
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
            return moment(date).format("MMMM Do YYYY");
        }
    }
}
</script>

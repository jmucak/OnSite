<template>
    <div>
        <p v-if="loading">
            Loading...
        </p>

        <p v-if="!loading">
            <button class="btn btn-onsite-success" v-if="status == 0" @click="add_friend">Add Friend</button>
            <button class="btn btn-onsite-success" v-if="status == 'pending'" @click="accept_friend">Accept Friend</button>
            <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
            <span class="text-success" v-if="status == 'friends'">Friends</span>
        </p>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/check_relationship_status/' + this.profile_user_id )
            .then((res) => {
                //console.log(res);

                this.status = res.body.status
                this.loading = false
            })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            add_friend() {
                this.loading = true;
                this.$http.get('/add_friend/' + this.profile_user_id )
                .then( (res) => {
                    //console.log(res);

                    if(res.body == 1) {
                        this.status = 'waiting';

                        this.loading = false;
                    }
                })
            },
            accept_friend() {
                this.loading = true;
                this.$http.get('/accept_friend/' + this.profile_user_id )
                .then( (res) => {
                    //console.log(res);

                    if(res.body == 1) {
                        this.status = 'friends';

                        this.loading = false;
                    }
                })
            }
        }
    }
</script>

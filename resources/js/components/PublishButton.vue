<template>
    <div class="d-inline">
        <button class="btn btn-sm btn-success" v-if="status == false" @click="publishStory">Publish</button>
        <button class="btn btn-sm btn-info" v-else @click="publishStory">Unpublish</button>
    </div>
</template>

<script>
export default {
    mounted() {
        this.$http.get('/check_publish_status/' + this.story_id).then((res) => {
            this.status = res.body.published;
            //console.log(res);
        });
    },
    props: ['story_id'],
    data() {
        return {
            status: ''
        }
    },
    methods: {
        publishStory() {
            this.$http.get('/stories/publish/' + this.story_id).then((res) => {
                if(res.body.published == 1) {
                    this.status = false;
                } else {
                    this.status = true;
                }
            });
        }
    }
}
</script>


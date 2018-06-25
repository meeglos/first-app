<template>
    <div class="border-b-2 border-dashed pb-4">
        <div v-show="state === 'default'">
            <div class=" flex items-center text-grey-dark leading-normal text-sm">
                <img class="w-12 h-12 rounded-full mr-4" :src="avatar">
                <div class="text-sm">
                    <p><a :href="href" class="text-grey-dark hover:text-blue-dark no-underline">{{ comment.author.name }}</a><span class="mx-1 text-xs">&bull;</span>{{ timestamp }}</p>
                    <!-- <p class="text-xs">{{ comment.created_at }}</p> -->
                </div>
            </div>
            <div class="flex justify-between mb-1 ml-8 pl-8">
                <p class="text-grey-darkest leading-normal text-lg">{{ comment.body }}</p>
                <button class="ml-3 mt-1 mb-auto text-blue hover:text-blue-dark text-sm" v-if="editable" @click="state = 'editing'">Edit</button>
            </div>
        </div>
        <div v-show="state === 'editing'">
            <div class="mb-3">
                <h3 class="text-black text-xl">Update Comment</h3>
            </div>
            <textarea v-model="data.body"
                      placeholder="Update comment"
                      class="bg-grey-lighter text-grey-darker rounded leading-normal resize-none w-full h-24 py-2 px-3">
            </textarea>
            <div class="flex flex-col md:flex-row items-center mt-2">
                <button class="border border-blue bg-blue text-white hover:bg-blue-dark py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:mr-1" @click="saveEdit">Update</button>
                <button class="border border-grey-darker text-grey-darker hover:bg-grey-dark hover:text-white py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:ml-1" @click="resetEdit">Cancel</button>
                <button class="text-red hover:bg-red hover:text-white py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:ml-auto" @click="deleteComment">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        props: {
            user: {
                required: true,
                type: Object,
            },
            comment: {
                required: true,
                type: Object,
            }
        },
        data: function() {
            return {
                state: 'default',
                data: {
                    body: this.comment.body,
                }
          }
        },
        computed: {
            href() {
                return 'mailto:' + this.comment.author.email;
            },
            avatar() {
                return '/uploads/avatars/' + this.comment.author.avatar;
            },
            editable() {
                return this.user.id === this.comment.author.id;
            },
            timestamp: function () {
                return moment(this.comment.created_at).fromNow();
            }
        },
        methods: {
            resetEdit() {
                this.state = 'default';
                this.data.body = this.comment.body;
            },
            saveEdit() {
                this.state = 'default';

                this.$emit('comment-updated', {
                    'id': this.comment.id,
                    'body': this.data.body,
                });
            },
            deleteComment() {
                this.$emit('comment-deleted', {
                    'id': this.comment.id,
                });
            }
        }
    }
</script>

<template>
    <div class="border-b pb-4">
        <div v-show="state === 'default'">
            <div class=" flex items-center text-grey-dark leading-normal text-sm">
                <img class="w-12 h-12 rounded-full mr-4" :src="notice.attachment.image">
                <div class="text-sm">
                    <p><a :href="href" class="text-grey-dark hover:text-blue-dark no-underline">{{ notice.user.name }}</a><span class="mx-1 text-xs">&bull;</span>{{ timestamp }}</p>
                    <!-- <p class="text-xs">{{ comment.created_at }}</p> -->
                </div>
            </div>
            <div class="flex justify-between mb-1 ml-8 pl-8">
                <p class="text-grey-darkest leading-normal text-xl">{{ notice.title }}</p>
                <p class="text-grey-darkest leading-normal text-xl">{{ notice.body }}</p>
                <button class="ml-3 mt-1 mb-auto text-blue hover:text-blue-dark text-sm" v-if="editable" @click="state = 'editing'">Edit</button>
            </div>
        </div>
        <div v-show="state === 'editing'">
            <div class="mb-3">
                <h3 class="text-black text-xl">Update Notice</h3>
            </div>
            <textarea v-model="data.body"
                      placeholder="Update notice"
                      class="bg-grey-lighter text-grey-darker rounded leading-normal resize-none w-full h-24 py-2 px-3">
            </textarea>
            <div class="flex flex-col md:flex-row items-center mt-2">
                <button class="border border-blue bg-blue text-white hover:bg-blue-dark py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:mr-1" @click="saveEdit">Update</button>
                <button class="border border-grey-darker text-grey-darker hover:bg-grey-dark hover:text-white py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:ml-1" @click="resetEdit">Cancel</button>
                <button class="text-red hover:bg-red hover:text-white py-2 px-4 rounded tracking-wide mb-2 md:mb-0 md:ml-auto" @click="deleteNotice">Delete</button>
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
            notice: {
                required: true,
                type: Object,
            }
        },
        data: function() {
            return {
                state: 'default',
                data: {
                    body: this.notice.title,
                    body: this.notice.body,
                }
          }
        },
        computed: {
            href() {
                return 'mailto:' + this.notice.user.email;
            },
            attachment() {
                return '/uploads/attachments/' + this.notice.attachment.image;
            },
            editable() {
                return this.user.id === this.notice.user.id;
            },
            timestamp: function () {
                return moment(this.notice.created_at).fromNow();
            }
        },
        methods: {
            resetEdit() {
                this.state = 'default';
                this.data.title = this.notice.title;
                this.data.body = this.notice.body;
            },
            saveEdit() {
                this.state = 'default';

                this.$emit('notice-updated', {
                    'id': this.notice.id,
                    'title': this.data.title,
                    'body': this.data.body,
                });
            },
            deleteNotice() {
                this.$emit('notice-deleted', {
                    'id': this.notice.id,
                });
            }
        }
    }
</script>

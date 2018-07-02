<template>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded shadow p-8 mb-4">
            <div class="mb-4">
                <h2 class="text-black">Notices</h2>
            </div>
            <textarea  v-model="data.body"
                        placeholder="Add a notice"
                        class="bg-grey-lighter text-grey-darker rounded leading-normal resize-none w-full h-10 py-2 px-3"
                        :class="[state === 'editing' ? 'h-24' : 'h-10']"
                        @focus="startEditing">
            </textarea>
            <div v-show="state === 'editing'" class="mt-3">
                <button class="border border-blue bg-blue text-white hover:bg-blue-dark py-2 px-4 rounded tracking-wide mr-1" @click="saveNotice">Save</button>
                <button class="border border-grey-darker text-grey-darker hover:bg-grey-dark hover:text-white py-2 px-4 rounded tracking-wide ml-1" @click="stopEditing">Cancel</button>
            </div>
        </div>
        <div class="bg-white rounded shadow-sm p-8">
            <notice v-for="(notice, index) in notices"
                    :key="notice.id"
                    :user="user"
                    :notice="notice"
                    :class="[index === notices.length -1 ? '' : 'mb-6']"
                    @notice-updated="updateNotice($event)"
                    @notice-deleted="deleteNotice($event)">
            </notice>
        </div>
    </div>
</template>
<script>
    import notice from './NoticeItem'
    export default {
        components: {
            notice
        },
        props: {
            user: {
                required: true,
                type: Object,
            }
        },
        created() {
            this.fetchNotices();
        },
        data: function() {
            return {
                state: 'default',
                data: {
                    title: '',
                    body: ''
                },
                notices: []
            }
        },
        methods: {
            fetchNotices() {
                const t = this;

                axios.get('/notices')
                    .then(({data}) => {
                        t.notices = data
                    })
            },
            startEditing() {
                this.state = 'editing';
            },
            stopEditing() {
                this.state = 'default';
                this.data.title = '';
                this.data.body = '';
            },
            updateNotice($event) {
                const t = this;

                axios.put(`/notices/${$event.id}`, $event)
                    .then(({data}) => {
                        t.notices[t.noticeIndex($event.id)].body = data.title;
                        t.notices[t.noticeIndex($event.id)].body = data.body;

                        flash('Your notice has been updated!');
                    })
            },
            deleteNotice($event) {
                const t = this;

                axios.delete(`/notices/${$event.id}`, $event)
                    .then(() => {
                        t.notices.splice(t.noticeIndex($event.id), 1);

                        flash('Your notice has been deleted!');
                    })
            },
            saveNotice() {
                const t = this;

                axios.post('/notices', t.data)
                    .then(({data}) => {
                        t.notices.unshift(data);

                        flash('Your notice has been posted!');

                        t.stopEditing();
                    })
            },
            noticeIndex(noticeId) {
                return this.notices.findIndex((element) => {
                    return element.id === noticeId;
                });
            }
        }
    }
</script>

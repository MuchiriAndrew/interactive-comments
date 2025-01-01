<template>
    <div class="comment w-full md:w-[730px] md:max-w-full flex justify-end items-center">

        <form
        @submit.prevent="submit"
            class="h-auto min-w-full md:min-w-full bg-white rounded-[8px] flex flex-col md:flex-row md:justify-center items-center md:items-start md:gap-[16px] md:px-[24px] overflow-hidden">

            <div class="w-[40px] h-[40px] justify-center items-start pt-[24px] hidden md:flex">
                <img class="w-[40px] h-[40px] rounded-full" :src="profile_photo_url" alt="">
            </div>

            <div
                class="w-full px-[16px] md:w-auto md:px-0 justify-center pt-[24px] md:py-[24px] flex flex-col h-[80%] md:h-full flex-grow">

                <textarea 
                style="border-width: 1px; resize: none; height: auto;"
                    class="w-full min-h-[96px] h-auto rounded-[8px] border-moderate-blue outline-0 pt-[12px] px-[24px] flex-grow"
                    name="" id=""
                    v-model="form.content"
                    ></textarea>
                    <div v-if="errors.content" class="text-red-500 font-semibold">{{ errors.content }}</div>


                   
            </div>

            <div class="h-[20%] md:flex hidden justify-between items-center pt-5">
                <button
                    class="w-[104px] h-[48px] rounded-[8px] bg-moderate-blue text-white font-rubik font-medium">SEND</button>
            </div>

            <input
            id="reply_type"
            hidden type="text" name="reply_type"
            v-model="form.reply_type"
            >




            <div class="w-full h-[20%] flex md:hidden justify-between items-center p-5">
                <img class="w-[40px] h-[40px] rounded-full" :src="profile_photo_url" alt="">


                <div class="items-center gap-2 flex">

                    <!-- <p class="font-rubik text-moderate-blue font-medium">Reply</p> -->
                    <button class="w-[104px] h-[48px] rounded-[8px] bg-moderate-blue text-white font-rubik font-medium">
                        SEND
                    </button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
import { router, usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toastification'

export default {
    props: {
        isReplying: {
            type: Boolean,
            required: true,
        },
        post_id: {
            type: Number,
            required: false,
        }
    },
    data() {
        return {
            form: {
                content: '',
                reply_type: this.isReplying ? 'reply' : 'post',
                parent_post_id: this.post_id,
                
                
            },
            profile_photo_url: this.$page.props.auth.user.profile_photo_path
          ? `/storage/${this.$page.props.auth.user.profile_photo_path}`
          : '/images/avatars/default.jpg',
            errors: {}
        }
    },
    setup() {
        const toast = useToast()
        const { props } = usePage()
        const flash = props.flash




        if (flash && flash.success) {
            toast.success(flash.success)
        }

        if (flash && flash.fail) {
            toast.error(flash.fail)
        }

        return {
            toast,
            flash
        }
    },
    methods: {
        submit() {
            router.post('/create', this.form, {
                onError: (err) => {
                    console.log(err); // Log the error to see its structure
                    Object.keys(err).forEach(key => {
                        this.errors[key] = err[key];
                    });
                    this.toast.error('Creation failed. Please check the form for errors.');
                },
                onSuccess: () => {
                    console.log('success');
                    
                    this.toast.success('Creation successful');

                    this.form.content = '';

                    //reload the page
                    location.reload();
                }
            });
        },
    },
    
}
</script>
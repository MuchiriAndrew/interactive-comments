<template>
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity" @click="$emit('close')"></div>
        
<!-- {{ post_id }} -->

    <div class="modal w-auto max-w-[343px] h-[224px] md:max-w-[406px] md:h-[252px] rounded-[8px] bg-white
    
    z-10 transition-transform transform scale-95">
        <div class="p-[24px] md:p-[32px] flex flex-col items-start md:gap-[20px] gap-[16px]">
            <h3 class="font-rubik text-dark-blue font-medium text-[24px]">Delete Comment</h3>
            <p class="font-rubik text-grayish-blue text-start">Are you sure you want to delete this comment? This will remove the comment and can't be undone.</p>

            <div class="flex md:gap-[16px] gap-[12px]">
                <button @click="$emit('close')" class="w-[138px] md:w-[161px] h-[48px] rounded-[8px] bg-grayish-blue text-white font-rubik font-medium">NO, CANCEL</button>
                <button
                @click="deletePost(post_id)"
                class="w-[138px] md:w-[161px] h-[48px] rounded-[8px] bg-soft-red text-white font-rubik font-medium">YES, DELETE</button>
                </div>  

        </div>        
    </div>

    </div>



</template>

<script>
import { router, usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toastification'


export default {
    name: 'Modal',
    props: {
        post_id: {
            type: Number,
            required: true
        },
        toggleModal: {
            type:Function,
            required: true
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
        deletePost(post_id) {
            // console.log("event emitted by userpost");
            

            router.post('/delete', 
            "post_id=" + post_id
            , {
                onError: (err) => {
                    console.log(err); // Log the error to see its structure
                    Object.keys(err).forEach(key => {
                        this.errors[key] = err[key];
                    });
                    this.toast.error('Deletion failed. Please check the form for errors.');
                },
                onSuccess: () => {
                    console.log('success');
                    
                    this.toast.success('Post Deleted');

                    this.toggleModal;

                    //reload the page
                    location.reload();
                   
                }
            });



        }
    }
};
</script>
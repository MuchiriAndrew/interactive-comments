<!-- filepath: /home/muchiri/myprojects/interactive-comments/resources/js/Pages/Auth/EditProfile.vue -->
<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-very-light-gray">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-8 space-y-6">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <!-- <img src="" alt="brand" class="w-16 h-16"> -->
                <svg data-v-170e02af="" xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 640 512">
                    <path data-v-170e02af=""
                        d="M456 0c-48.6 0-88 39.4-88 88v29.2L12.5 390.6c-14 10.8-16.6 30.9-5.9 44.9s30.9 16.6 44.9 5.9L126.1 384H259.2l46.6 113.1c5 12.3 19.1 18.1 31.3 13.1s18.1-19.1 13.1-31.3L311.1 384H352c1.1 0 2.1 0 3.2 0l46.6 113.2c5 12.3 19.1 18.1 31.3 13.1s18.1-19.1 13.1-31.3l-42-102C484.9 354.1 544 280 544 192V128v-8l80.5-20.1c8.6-2.1 13.8-10.8 11.6-19.4C629 52 603.4 32 574 32H523.9C507.7 12.5 483.3 0 456 0zm0 64a24 24 0 1 1 0 48 24 24 0 1 1 0-48z">
                    </path>
                </svg>
            </div>
            <!-- /Logo -->
            <h2 class="text-center text-2xl font-bold text-dark-blue">Edit Profile</h2>
            <form id="formEditProfile" @submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="name" class="block text-sm font-medium text-grayish-blue">Name <span
                                class="text-soft-red">*</span></label>
                        <input type="text" v-model="form.name"
                            class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            id="name" name="name" placeholder="Enter your name" autofocus>
                        <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.name">{{ errors.name
                            }}</span>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="email" class="block text-sm font-medium text-grayish-blue">Email <span
                                class="text-soft-red">*</span></label>
                        <input type="text" v-model="form.email"
                            class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            id="email" name="email" placeholder="Enter your email">
                        <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.email">{{ errors.email
                            }}</span>
                    </div>
                </div>

                <div>
                    <label for="old_password" class="block text-sm font-medium text-grayish-blue">Old Password <span
                            class="text-soft-red">*</span></label>
                    <div class="mt-1 relative">
                        <input type="password" id="old_password"
                            class="block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            value="" v-model="form.old_password" name="old_password" placeholder="••••••••"
                            aria-describedby="old_password">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                    <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.old_password">{{
                        errors.old_password }}</span>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-grayish-blue">New Password <span
                            class="text-soft-red">*</span></label>
                    <div class="mt-1 relative">
                        <input type="password" id="password"
                            class="block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            value="" v-model="form.password" name="password" placeholder="••••••••"
                            aria-describedby="password">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                    <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.password">{{ errors.password
                        }}</span>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-grayish-blue">Confirm New
                        Password <span class="text-soft-red">*</span></label>
                    <div class="mt-1 relative">
                        <input type="password" v-model="form.password_confirmation" id="password_confirmation"
                            class="block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            name="password_confirmation" placeholder="••••••••"
                            aria-describedby="password_confirmation">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                    <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.password_confirmation">{{
                        errors.password_confirmation }}</span>
                </div>

                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-grayish-blue">Profile
                        Picture</label>
                    <div class="mt-1">
                        <div id="dropzone"
                            class="dropzone border-dashed border-2 border-light-gray rounded-md flex justify-center items-center">
                            <div class="dz-message text-center text-gray-500">
                                Drag and drop a file here or click
                            </div>
                        </div>
                    </div>
                    <span class="text-soft-red font-semibold text-sm mt-1" v-if="errors.profile_picture">{{
                        errors.profile_picture }}</span>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-moderate-blue hover:bg-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-moderate-blue">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive, onMounted } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toastification'

const toast = useToast()

const { props } = usePage()
const user = props.auth.user

const form = reactive({
    name: user.name,
    email: user.email,
    old_password: '',
    password: '',
    password_confirmation: '',
    profile_picture: null,
})

const errors = reactive({})

function submit() {
    const formData = new FormData();
    formData.append('name', form.name ? form.name : '');
    formData.append('email', form.email ? form.email : '');
    formData.append('old_password', form.old_password ? form.old_password : '');
    formData.append('password', form.password ? form.password : '');
    formData.append('password_confirmation', form.password_confirmation ? form.password_confirmation : '');
    if (form.profile_picture) {
        formData.append('profile_picture', form.profile_picture ? form.profile_picture : '');
    }

    router.post('/profile/update', formData, {
        onError: (err) => {
            console.log(err); // Log the error to see its structure
            Object.keys(err).forEach(key => {
                errors[key] = err[key];
            });
            console.log(errors);
            toast.error('Profile update failed. Please check the form for errors.');
        },
        onSuccess: (page) => {
      console.log('success');
      if (page.props.flash.success) {
        var successMessage = page.props.flash.success;
        toast.success(successMessage);
      }

      if(page.props.flash.fail) {
        var failMessage = page.props.flash.fail;
        toast.error(failMessage);
      }

    location.reload();
    }
    });
}

onMounted(() => {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {
        url: "/upload",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        autoProcessQueue: false,
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        dictDefaultMessage: "Drop files here to upload",
        init: function () {
            this.on("addedfile", function (file) {
                form.profile_picture = file;
            });
            this.on("removedfile", function (file) {
                form.profile_picture = null;
            });
        }
    });
});
</script>

<style scoped>
/* Add any additional styles here */
</style>
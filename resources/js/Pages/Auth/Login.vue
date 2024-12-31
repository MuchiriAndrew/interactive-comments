<template>
    <div class="min-h-screen flex items-center justify-center bg-very-light-gray">
        <div class="max-w-md w-[90%] bg-white shadow-md rounded-lg p-8 space-y-6">
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
            <h2 class="text-center text-2xl font-bold text-dark-blue">Access your account</h2>
            <form @submit.prevent="submit" class="space-y-6">
                <!-- <div v-if="flash.fail" class="text-red-500">
            {{ flash.fail }}
          </div> -->
                <div>
                    <label for="email" class="block text-sm font-medium text-grayish-blue">Email</label>
                    <input type="text" v-model="form.email"
                        class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                        id="email" name="email" placeholder="Enter your email" autofocus>
                    <span class="text-soft-red text-sm mt-1" v-if="errors.email">{{ errors.email }}</span>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-grayish-blue">Password</label>
                    <div class="mt-1 relative">
                        <input type="password" v-model="form.password" id="password"
                            class="block w-full px-3 py-2 border border-light-gray rounded-md shadow-sm focus:outline-none focus:ring-moderate-blue focus:border-moderate-blue sm:text-sm"
                            name="password" placeholder="••••••••" aria-describedby="password">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                    <span class="text-soft-red text-sm mt-1" v-if="errors.password">{{ errors.password }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-moderate-blue focus:ring-moderate-blue border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-dark-blue">Remember Me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-moderate-blue hover:text-dark-blue">Forgot your
                            password?</a>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-moderate-blue hover:bg-dark-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-moderate-blue">Sign
                        in</button>
                </div>
            </form>
            <p class="text-center text-sm text-grayish-blue">
                New on our platform?
                <a href="/register" class="font-medium text-moderate-blue hover:text-dark-blue">Create an account</a>
            </p>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import { useToast } from 'vue-toastification'

export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
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
            router.post('/login', this.form, {
                onError: (err) => {
                    console.log(err); // Log the error to see its structure
                    Object.keys(err).forEach(key => {
                        this.errors[key] = err[key];
                    });
                    this.toast.error('Login failed. Please check the form for errors.');
                }
            });
        },



    },
    updated() {
        // console.log(this.$page);
        if (this.$page.props.flash.fail) {
            var failMessage = this.$page.props.flash.fail;
            this.toast.error(failMessage);

            //delete the flash message so that it doesn't show again
            this.$page.props.flash.fail = null;
        }
    }

}
</script>

<style scoped>
/* Add any additional styles here */
</style>
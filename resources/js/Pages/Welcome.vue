<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="text-center">
            <h1 class="text-xl font-bold">Interview Task</h1>
            <hr>
            <h3 class="mt-4 underline">Laravel Crud with:</h3>
            <ol >
                <li> * All From Element</li>
                <li> (Like personal profile) </li>
                <li> * Multiple File Upload</li>
                <!-- <li>Multiple File Upload</li> -->
            </ol>
        </div>
        <div class="text-center mt-4 flex justify-around">
            <Link 
                :href="route('register')"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs
                 text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
                 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                Register
            </Link>

            <Link 
                :href="route('login')"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs
                 text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
                 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                 focus:ring-offset-2 transition ease-in-out duration-150 "
            >
                Login
            </Link>
        </div>

        
    </GuestLayout>
</template>

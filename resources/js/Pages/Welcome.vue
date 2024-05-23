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

        <div class="text-start">
            <h1 class="text-xl font-bold text-center">Interview Task</h1>
            <hr>
            <h3 class="mt-4 underline font-bold text-center">Laravel - Vue Crud Opeartion with</h3>
            <ol >
                <li class="text-center"> * All From Element  (like personal profile) </li>
            </ol>
            <legend class="mt-3 text-center">Form Elements</legend><hr>
            <ul class="py-5 px-5 flex flex-wrap" style="list-style-type:circle">
                <li class="grow w-20">input</li>
                <li class="grow w-20">label</li>
                <li class="grow w-20">select</li>
                <li class="grow w-20">textarea</li>
                <li class="grow w-20">button</li>
                <li class="grow w-20">fieldset</li>
                <li class="grow w-20">legend</li>
                <li class="grow w-20">datalist</li>
                <li class="grow w-20">output</li>
                <li class="grow w-20">option</li>
                <li class="grow w-20">optgroup</li>
            </ul>
            <legend class="mt-3 text-center">Input Attrubute Type</legend><hr><hr>
            <div class="flex mt-4">
                <ul class="ps-5 flex flex-wrap" style="list-style-type:circle">
                    <li class="grow w-full">input type="button"</li>
                    <li class="grow w-full">input type="checkbox"</li>
                    <li class="grow w-full">input type="color"</li>
                    <li class="grow w-full">input type="date"</li>
                    <li class="grow w-full">input type="datetime-local"</li>
                    <li class="grow w-full">input type="email"</li>
                    <li class="grow w-full">input type="file"</li>
                    <li class="grow w-full">input type="hidden"</li>
                    <li class="grow w-full">input type="image"</li>
                    <li class="grow w-full">input type="month"</li>
                </ul>
                <ul class="ps-3 flex flex-wrap" style="list-style-type:circle">
                    <li class="grow w-full">input type="number"</li>
                    <li class="grow w-full">input type="password"</li>
                    <li class="grow w-full">input type="radio"</li>
                    <li class="grow w-full">input type="range"</li>
                    <li class="grow w-full">input type="reset"</li>
                    <li class="grow w-full">input type="search"</li>
                    <li class="grow w-full">input type="submit"</li>
                    <li class="grow w-full">input type="tel"</li>
                    <li class="grow w-full">input type="text"</li>
                    <li class="grow w-full">input type="time"</li>
                    <li class="grow w-full">input type="url"</li>
                    <li class="grow w-full">input type="week"</li>
                </ul>
            </div>
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
            <footer class="text-center mt-5"> 
                <p>
                    Submitted By: Md. Ratan Howlader 
                </p>
            </footer>
        
    </GuestLayout>
</template>

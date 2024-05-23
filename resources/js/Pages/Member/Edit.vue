<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

defineProps(['member']);
const member = usePage().props.member;

const form = useForm({
    name: member.name,
    date_of_birth: member.date_of_birth,
    gender: member.gender,
    email: member.email,
    mobile: member.mobile,
    address: member.address,
    linkedin_url: member.linkedin_url,
    image: '',
    resume: '',
    education_level: member.education_level,
    subject: member.subject,
    institution: member.institution,
    result: member.result,
    result_type: member.result_type,
    language_skill: JSON.parse(member.language_skill),
    experience_in_year: member.experience_in_year,
});

</script>
 
<template>
    <Head title="Edit Member"/>
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <!-- <h3>Form Elements are listed below:</h3> -->
                <legend>Form Elements</legend><hr>
                <ul class="ps-5 flex flex-wrap" style="list-style-type:circle">
                    <!-- <li class="grow w-20">input</li>
                    <li class="grow w-20">label</li>
                    <li class="grow w-20">select</li>
                    <li class="grow w-20">textarea</li>
                    <li class="grow w-20">button</li>
                    <li class="grow w-20">fieldset</li>
                    <li class="grow w-20">legend</li>
                    <li class="grow w-20">datalist</li>
                    <li class="grow w-20">output</li>
                    <li class="grow w-20">option</li> -->
                    <!-- <li>optgroup</li> -->

                    <!-- input type="button" -->
                    <!-- input type="checkbox" -->
                    <!-- input type="color" -->
                    <!-- input type="date" -->
                    <!-- input type="datetime-local" -->
                    <!-- input type="email" -->
                    <!-- input type="file" -->
                    <!-- input type="hidden" -->
                    <!-- input type="image" -->
                    <!-- input type="month" -->
                    <!-- input type="number" -->
                    <!-- input type="password" -->
                    <!-- input type="radio" -->
                    <!-- input type="range" -->
                    <!-- input type="reset" -->
                    <!-- input type="search" -->
                    <!-- input type="submit" -->
                    <!-- input type="tel" -->
                    <!-- input type="text" -->
                    <!-- input type="time" -->
                    <!-- input type="url" -->
                    <!-- input type="week" -->

                </ul>
                <form @submit.prevent="form.patch(route('members.update', member.id), { onSuccess: () => form.reset() })" enctype="multipart/form-data">
                    <fieldset class="mt-4">
                        <legend >Personal Info</legend>
                        <hr>
                        <div class="mt-4">
                            <InputLabel for="name" value="1. Name *" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                placeholder="Ex: Ratan Howlader"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="flex flex-row gap-4">
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="date_of_birth" value="2. Date of Birth" />
                                <TextInput
                                    id="date_of_birth"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.date_of_birth"
                                    required
                                    autofocus
                                    autocomplete="date_of_birth"
                                />
                                <InputError class="mt-2" :message="form.errors.date_of_birth" />
                            </div>
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="gender" value="3. Gender" />

                                <input type="radio" id="male" value="male" v-model="form.gender" />
                                <label class="mx-4" for="male">Male</label>

                                <input type="radio" id="female" value="female" v-model="form.gender" />
                                <label class="mx-4" for="female">Female</label>

                                <input type="radio" id="other" value="other" v-model="form.gender" />
                                <label class="mx-4" for="other">Other</label>

                                <InputError class="mt-2" :message="form.errors.gender" />
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-8">
                        <legend>Contact Info</legend><hr>
                        <div class="flex flex-row gap-4">
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="email" value="4. Email" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    placeholder="example@email.com"
                                    required
                                    autofocus
                                    autocomplete="email"
                                />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="mobile" value="5. Mobile Number" />
                                <TextInput
                                    id="mobile"
                                    type="text"
                                    maxlength="11"
                                    class="mt-1 block w-full"
                                    v-model="form.mobile"
                                    placeholder="01********"
                                    pattern="01[0-9]{9}"
                                    required
                                    autofocus
                                    autocomplete="mobile"
                                />
                                <InputError class="mt-2" :message="form.errors.mobile" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <InputLabel for="address" value="6. Address" />
                            <textarea
                                v-model="form.address"
                                placeholder="Address"
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring  
                                focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            ></textarea>
                            <InputError :message="form.errors.address" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="linkedin_url" value="7. LinkedIn Profile Url" />
                            <TextInput
                                id="linkedin_url"
                                type="url"
                                maxlength="11"
                                class="mt-1 block w-full"
                                v-model="form.linkedin_url"
                                required
                                autofocus
                                autocomplete="linkedin_url"
                                placeholder="https://bd.linkedin.com/in/.."
                            />
                            <InputError class="mt-2" :message="form.errors.linkedin_url" />
                        </div>
                    </fieldset>

                    <fieldset class="mt-8">
                        <legend>Files</legend><hr>
                        <div class="flex flex-row gap-4">
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="image" value="8. Profile Photo" />
                                <TextInput
                                    id="image"
                                    type="file"
                                    accept="image/gif, image/jpeg, image/png"
                                    class="mt-1 block w-full"
                                    @input="form.image = $event.target.files[0]"
                                />
                                <!-- required -->
                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="resume" value="9. CV/Resume" />
                                <TextInput
                                    id="resume"
                                    type="file"
                                    accept="application/pdf"
                                    maxlength="11"
                                    class="mt-1 block w-full"
                                    @input="form.resume = $event.target.files[0]"
                                />
                                <!-- required -->
                                <InputError class="mt-2" :message="form.errors.resume" />
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-8">
                        <legend>Last Education</legend><hr>
                        <div class="flex flex-row gap-4">
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="education_level" value="10. Education Level"/>
                                <TextInput 
                                    list="levels" 
                                    class="mt-1 block w-full"
                                    v-model="form.education_level"
                                    name="education_level"
                                    required
                                    autofocus
                                />
                                <datalist id="levels">
                                    <option value="PhD"/>
                                    <option value="Master's"/>
                                    <option value="Bachelor"/>
                                    <option value="Diploma"/>
                                    <option value="HSC"/>
                                    <option value="SSC"/>
                                </datalist>
                                <InputError class="mt-2" :message="form.errors.education_level" />
                            </div>
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="subject" value="11. Subject" />
                                <TextInput
                                    id="subject"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.subject"
                                    required
                                    autofocus
                                    autocomplete="subject"
                                    placeholder="Ex: CSE/EEE/Science"
                                />
                                <InputError class="mt-2" :message="form.errors.subject" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <InputLabel for="institution" value="12. Institution Name" />
                            <TextInput
                                id="institution"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.institution"
                                required
                                autofocus
                                autocomplete="institution"
                                placeholder="Ex: Abc University"
                            />
                            <InputError class="mt-2" :message="form.errors.institution" />
                        </div>
                        <div class="flex flex-row gap-4">
                            <div class="mt-4 basis-6/12">
                                <InputLabel for="result_type" value="13. Result Type" />
                                <select name="result_type" v-model="form.result_type"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring  focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                >
                                    <option value="" selected>Select</option>
                                    <optgroup  label="Grade Points">
                                        <option value="1">CGPA (Out of 4)</option>
                                        <option value="2">GPA (Out of 5)</option>
                                    </optgroup>
                                    <optgroup label="Others">
                                        <option value="3">Grade/Div</option>
                                        <option value="4">Passed</option>
                                    </optgroup>
                                </select>    
                                <InputError class="mt-2" :message="form.errors.result_type" />
                            </div>
                            
                            <div class="mt-4 basis-6/12" v-if="form.result_type == '1' || form.result_type == '2'">
                                <InputLabel for="result" value="Result" />
                                <TextInput
                                    id="result"
                                    type="number"
                                    max="5.00"
                                    step="0.01"
                                    min="0.00"
                                    class="mt-1 block w-full"
                                    v-model="form.result"
                                    required
                                    autofocus
                                    autocomplete="result"
                                    placeholder="3.89"
                                />
                                <InputError class="mt-2" :message="form.errors.result" />
                            </div>

                            <div v-else class="mt-4 basis-6/12" >
                                <InputLabel for="result" value="Result" />
                                <TextInput
                                    id="result"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.result"
                                    required
                                    autofocus
                                    autocomplete="result"
                                    placeholder="Ex: 1st Division / Passed"
                                />
                                <InputError class="mt-2" :message="form.errors.result" />
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-8">
                        <legend>Language Skill</legend><hr>
                        <div class="mt-4">
                            <InputLabel for="language_skill" value="1. Bangla" class="inline-block px-3 " />
                            <input class="rounded" type="checkbox" id="b-reading" value="1" v-model="form.language_skill">
                            <label class="px-2" for="b-reading">Reading</label>

                            <input class="rounded"  type="checkbox" id="writing" value="2" v-model="form.language_skill">
                            <label class="px-2" for="writing">Writing</label>

                            <input class="rounded"  type="checkbox" id="speaking" value="3" v-model="form.language_skill">
                            <label class="px-2" for="speaking">Speaking</label>
                        </div>
                        <div class="mt-4">
                            <InputLabel for="language_skill" value="2. English" class="inline-block px-3 "/>
                            <input class="rounded" type="checkbox" id="b-reading" value="4" v-model="form.language_skill">
                            <label class="px-2" for="b-reading">Reading</label>

                            <input class="rounded"  type="checkbox" id="writing" value="5" v-model="form.language_skill">
                            <label class="px-2" for="writing">Writing</label>

                            <input class="rounded"  type="checkbox" id="speaking" value="6" v-model="form.language_skill">
                            <label class="px-2" for="speaking">Speaking</label>
                        </div>
                        <InputError class="mt-2" :message="form.errors.language_skill" />
                    </fieldset>
                    <fieldset class="mt-8">
                        <legend>Professional Experience</legend><hr>
                        <div class="mt-4">
                            <InputLabel for="experience_in_year" value="Experience in Year(0-15)" />
                            <TextInput
                                id="experience_in_year"
                                type="range"
                                class="mt-1 block w-full"
                                min="0" max="15"
                                v-model="form.experience_in_year"
                                required
                                autocomplete="experience_in_year"
                                placeholder="Ex:"
                            />
                            Selected Experience: {{ form.experience_in_year }}
                        </div>
                        <InputError class="mt-2" :message="form.errors.experience_in_year" />
                    </fieldset>
                   
                    <div class="text-center">
                        <!-- <PrimaryButton class="mt-4">Update</PrimaryButton> -->
                        <input type="submit" value="Save" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs
                 text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                 focus:ring-offset-2 transition ease-in-out duration-150 "> 
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
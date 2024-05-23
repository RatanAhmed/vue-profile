
  
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['members']);

</script>
<style>

</style>
<template>
  <Head title="Members"/>
  <AuthenticatedLayout>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Members</h2>
      </template>
      
      <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
            <div >
              
            </div>
            <table class="border-collapse table-auto w-full text-sm">
              <thead>
                  <tr>
                    <th class="font-bold border">#</th>
                    <th class="font-bold border">Image</th>
                    <th class="font-bold border">Name</th>
                    <th class="font-bold border">Address</th>
                    <th class="font-bold border">Education</th>
                    <th class="font-bold border">Experience</th>
                    <th class="font-bold border">Action</th>
                  </tr>
              </thead>
              <tbody class="">
                  <tr v-for="(member, index) in members" :key="index">
                    <td class="border text-center">{{ index + 1 }}</td>
                    <td class="border text-center">
                      <img :src="`/storage/${member.image}`">
                      </td>
                    <td class="border text-center">{{ member.name }}</td>
                    <td class="border text-center">{{ member.address }}</td>
                    <td class="border text-center">{{ member.education_level }}</td>
                    <td class="border text-center">{{ member.experience_in_year }}</td>
                    <td class="border text-center">
                      <a 
                          :href="route('members.edit', member.id )"
                          class="my-1 inline-flex items-center px-4 py-1 bg-green-800 border border-transparent rounded-md font-semibold text-xs
                          text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
                          active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                          focus:ring-offset-2 transition ease-in-out duration-150"
                      >
                          Edit
                      </a>
                      <DropdownLink as="button" :href="route('members.destroy', member.id)" method="delete">
                            Delete
                      </DropdownLink>
                    </td>
                  </tr>
              </tbody>
            </table>              
             
          </div>
      </div>
  </AuthenticatedLayout>
</template>

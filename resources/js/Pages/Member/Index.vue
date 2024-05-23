
  
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
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
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table class="border-collapse table-auto w-full text-sm">
                  <thead>
                      <tr>
                        <th class="font-bold border">#</th>
                        <th class="font-bold border">Image</th>
                        <th class="font-bold border">Name</th>
                        <th class="font-bold border">Address</th>
                        <th class="font-bold border">Last Education</th>
                        <th class="font-bold border">Experience(Year)</th>
                        <th class="font-bold border">Action</th>
                      </tr>
                  </thead>
                  <tbody class="">
                      <tr v-for="(member, index) in members" :key="index">
                        <td class="border text-center">{{ index + 1 }}</td>
                        <td class="border align-center">
                          <img :src="`/storage/${member.image}`" class="rounded-full h-16 w-16 mx-auto">
                          </td>
                        <td class="border text-center">{{ member.name }}</td>
                        <td class="border text-center">{{ member.address }}</td>
                        <td class="border text-center">{{ member.education_level }}</td>
                        <td class="border text-center">{{ member.experience_in_year }}</td>
                        <td class="border text-center">
                          <DropdownLink 
                              :href="route('members.edit', member.id )"
                              class="text-center bg-green-800 text-white my-1 hover:text-gray-900"
                              style=" text-align: center!important; "
                          >
                              Edit
                          </DropdownLink>
                          <DropdownLink as="button" :href="route('members.destroy', member.id)" method="delete"
                            class="text-center bg-red-800 text-white my-1 hover:text-gray-900"
                            style=" text-align: center!important; "
                          >
                                Delete
                          </DropdownLink>
                        </td>
                      </tr>
                  </tbody>
                </table>     
              </div>
          </div>
      </div>
  </AuthenticatedLayout>
</template>

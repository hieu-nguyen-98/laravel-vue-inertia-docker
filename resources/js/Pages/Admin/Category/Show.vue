<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  category: {
    type: Object,
    required: true,
  },
});
const formatDate  = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('vi-VN');
};
</script>

<template>
  <AdminLayout title="Categoy Details">
    <template #header>
      Category Details
    </template>

    <div class="max-w-5xl mx-auto pb-1 px-8">
      <div class="flex items-center justify-end">
        <Link :href="route('categories.index')"
          class="cursor-pointer inline-flex items-center ml-3 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
          Back
        </Link>
      </div>
    </div>

    <div class="max-w-5xl mx-auto pt-3 pb-0 sm:px-6 lg:px-8">
      <div class="px-4 py-5 bg-gray-100 sm:p-6 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-0">
          <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" v-if="category.photo">
            <img class="block -my-2 mr-2 w-20 h-20 object-cover object-center rounded-full"
              :src="`${category.photo}`" />
          </div>
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-md font-medium">
                Name
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                <span v-if="category.name">{{ category.name }}&nbsp;</span>
              </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-md font-medium">
                Parent
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ category.parent ? category.parent.name : '' }}
              </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-md font-medium">
                Status
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ category.status == 1 ? 'Active' : 'Inactive' }}
              </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-md font-medium">
                Created At
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ formatDate(category.created_at) }}
              </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-md font-medium">
                Updated At
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ formatDate(category.updated_at) }}
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>

  </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
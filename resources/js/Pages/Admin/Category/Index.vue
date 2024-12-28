<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from '@inertiajs/vue3';

defineProps({
  trashed: false,
  categories: {
    type: Array,
    default: () => ({
      data: [],
      current_page: 1,
      last_page: 1,
      total: 0,
    }),
  },
});
const formatDate  = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('vi-VN');
};
</script>
<template>
    <AdminLayout title="Categories">
        <template #header>
        <div>Category Management</div>
    </template>

    <div class="max-w-7xl mx-auto py-4">
      <div class="flex justify-between">
        <Link 
          class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
          Create Category
        </Link>
      </div>

      <div class="mt-6">
        <table class="w-full whitespace-nowrap border border-gray-200">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6 text-center">#</th>
            <th class="pb-4 pt-6 px-6 text-center">Avatar</th>
            <th class="pb-4 pt-6 px-6">Name</th>
            <th class="pb-4 pt-6 px-6">Parent</th>
            <th class="pb-4 pt-6 px-6">Status</th>
            <th class="pb-4 pt-6 px-6">Created At</th>
            <th class="pb-4 pt-6 px-6">Updated At</th>
            <th class="pb-4 pt-6 px-6 text-center">Action</th>
          </tr>
          <tr v-for="category in categories.data" :key="category.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/categories/${category.id}/show`">
                {{ category.id }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center justify-center px-6 py-4 focus:text-indigo-500"
                :href="`/categories/${category.id}/show`">
                <img v-if="category.photo" class="block -my-2 mr-2 w-8 h-8 rounded-full" 
                  :src="`${category.photo}`" />
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/categories/${category.id}/show`">
                {{ category.name }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 font-bold" :href="`/categories/${category.id}/show`" tabindex="-1">
                {{ category.parent ? category.parent.name : '' }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/categories/${category.id}/show`" tabindex="-1">
                <strong
                  :class="[
                    'badge', 
                    category.status == 1 ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
                  ]"
                >
                  <small>{{ category.status == 1 ? 'Active' : 'Inactive' }}</small>
                </strong>
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/categories/${category.id}/show`" tabindex="-1">
                {{ formatDate(category.created_at) }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/categories/${category.id}/show`" tabindex="-1">
                {{ formatDate(category.updated_at) }}
              </Link>
            </td>
            <td class="border-t flex items-center justify-center">
              
            </td>
          </tr>
          <tr v-if="categories.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No categories found.</td>
          </tr>
        </table>

        <div class="mt-4 flex justify-between items-center">
          <div v-if="categories.meta.current_page > 1">
            <Link
              :href="`?page=${categories.meta.current_page - 1}`"
              class="bg-blue-500 text-white px-4 py-2 rounded"
            >
              Previous
            </Link>
          </div>
          <div class="mt-4 flex justify-center space-x-2">
            <Link
              v-for="page in Array.from({ length: categories.meta.last_page }, (_, i) => i + 1)"
              :key="page"
              :href="`?page=${page}`"
              class="px-4 py-2 border rounded text-sm"
              :class="{ 'bg-blue-500 text-white': page === categories.meta.current_page }"
            >
              {{ page }}
            </Link>
          </div>

          <div v-if="categories.meta.current_page < categories.meta.last_page">
            <Link
              :href="`?page=${categories.meta.current_page + 1}`"
              class="bg-blue-500 text-white px-4 py-2 rounded"
            >
              Next
            </Link>
          </div>
        </div>

        <div class="mt-2 text-sm text-gray-600">
          Hiện tại đang hiển thị trang {{ categories.meta.current_page }} của {{ categories.meta.last_page }}. Tổng cộng có {{ categories.meta.total }} danh mục.
        </div>
      </div>
    </div>
    </AdminLayout>
</template>
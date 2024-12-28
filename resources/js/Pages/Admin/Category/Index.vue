<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

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
  filters: {
    type: Object,
    default: () => ({ 
      search: '' ,
      start_date: '',
      end_date: '',
    }),
  },
});
const formatDate  = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('vi-VN');
};
const searchQuery = ref('');
const startDate = ref('');
const endDate = ref('');
const performSearch = () => {
  router.get(route('categories.index'), { 
    search: searchQuery.value,
    start_date: startDate.value,
    end_date: endDate.value,
  }, { preserveState: true });
};
const changePage = (page) => {
  router.get(route('categories.index'), { 
    search: searchQuery.value, 
    start_date: startDate.value,
    end_date: endDate.value,
    page 
  }, { preserveState: true });
};
</script>
<template>
    <AdminLayout title="Categories">
        <template #header>
        <div>Category Management</div>
    </template>

    <div class="max-w-7xl mx-auto py-4">
      <div class="flex justify-between">
        <div hidden class="md:block">
          <div class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
            <!-- <span class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
              <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                <path id="Icon_awesome-search" data-name="search"
                  d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                </path>
              </svg>
            </span> -->
            <button 
              @click="performSearch"
              aria-label="search"
              class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300"
            >
              <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 mx-auto fill-current text-gray-600"
                viewBox="0 0 35.997 36.004">
                <path id="Icon_awesome-search" data-name="search"
                  d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                </path>
              </svg>
            </button>
            <input 
              type="search" 
              v-model="searchQuery"
              @keydown.enter.prevent="performSearch"
              id="leadingIcon" 
              placeholder="Search here"
              class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition" 
            />
            <input 
              type="date" 
              v-model="startDate" 
              @change="performSearch" 
              placeholder="Start Date"
              class="w-full ml-2 pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition" 

            />
            <input 
              type="date" 
              v-model="endDate" 
              @change="performSearch" 
              placeholder="End Date"
              class="w-full ml-2 pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition" 
            />
          </div>
        </div>
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
            <button
              @click="changePage(categories.meta.current_page - 1)"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
            >
              Previous
            </button>
          </div>
          <div class="mt-4 flex justify-center space-x-2">
            <button
              v-for="page in Array.from({ length: categories.meta.last_page }, (_, i) => i + 1)"
              :key="page"
              @click="changePage(page)"
              class="px-4 py-2 border rounded text-sm hover:bg-blue-100 transition"
              :class="{ 'bg-blue-500 text-white': page === categories.meta.current_page }"
            >
              {{ page }}
            </button>
          </div>

          <div v-if="categories.meta.current_page < categories.meta.last_page">
            <button
              @click="changePage(categories.meta.current_page + 1)"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
            >
              Next
            </button>
          </div>
        </div>

        <div class="mt-2 text-sm text-gray-600">
          Hiện tại đang hiển thị trang {{ categories.meta.current_page }} của {{ categories.meta.last_page }}. Tổng cộng có {{ categories.meta.total }} danh mục.
        </div>
      </div>
    </div>
    </AdminLayout>
</template>
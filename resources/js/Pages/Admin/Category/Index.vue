<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from '@inertiajs/vue3';


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
          Create User
        </Link>
      </div>

      <div class="mt-6">

      </div>
    </div>
    </AdminLayout>
</template>
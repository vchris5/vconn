<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-lg text-gray-700 dark:text-white font-bold text-center">
          <Link :href="route('listing.index')">Connect</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <Link :href="route('realtor.listing.index')" class="text-sm text-gray-600 dark:text-gray-300">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
          <div>
            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-4">
          <Link :href="route('user-account.create')">Register </Link>
          <Link :href="route('login')">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
    <!-- <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-300 dark:border-green-500 bg-green-200 dark:bg-green-400 p-2 dark:text-gray-200"> -->
    <div v-if="flashSuccess" class="flex p-4 mb-4 border rounded-lg shadow-sm text-green-800 border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
      {{ flashSuccess }}
    </div>
    <slot>Default</slot>
  </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const page = usePage()
const flashSuccess = computed(
  () => page.props.value.flash.success,
)
const user = computed(
  () => page.props.value.user,
)

</script>



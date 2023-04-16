<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-lg text-gray-700 dark:text-white font-bold text-center">
          <Link :href="route('index')">Connect</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <Link :href="route('notification.index')">
            <button
              type="button"
              class="relative z-10 block p-2 text-gray-700 bg-white border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none"
            >
              <svg class="w-6 h-6 text-gray-800 dark:text-white" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
              <!-- <span class="sr-only">Notifications</span> -->
              <div v-if="notificationCount" class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-center font-medium text-white bg-red-700 dark:bg-red-500 border border-white rounded-full top-0 right-1 dark:border-gray-900">
                {{ notificationCount }}
              </div>
            </button>
          </Link>
          <Link :href="route('realtor.listing.index')" class="text-sm text-gray-600 dark:text-gray-300">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
          <div>
            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-4">
          <Link :href="route('user-account.create')">Register</Link>
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

/**
 * Math.min is the minimum value
 *
 * NotificationCount only counts numbers between 0-9
*/
const notificationCount = computed(
  () => Math.min(page.props.value.user.notificationCount, 9),
)

</script>



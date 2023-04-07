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
          <div>
            <button
              type="button"
              class="relative z-10 block p-2 text-gray-700 bg-white border border-transparent rounded-md dark:text-white focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:bg-gray-800 focus:outline-none"
            >
              <svg class="w-5 h-5 text-gray-800 dark:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C10.8954 22 10 21.1046 10 20H14C14 21.1046 13.1046 22 12 22ZM20 19H4V17L6 16V10.5C6 7.038 7.421 4.793 10 4.18V2H13C12.3479 2.86394 11.9967 3.91762 12 5C12 5.25138 12.0187 5.50241 12.056 5.751H12C10.7799 5.67197 9.60301 6.21765 8.875 7.2C8.25255 8.18456 7.94714 9.33638 8 10.5V17H16V10.5C16 10.289 15.993 10.086 15.979 9.9C16.6405 10.0366 17.3226 10.039 17.985 9.907C17.996 10.118 18 10.319 18 10.507V16L20 17V19ZM17 8C16.3958 8.00073 15.8055 7.81839 15.307 7.477C14.1288 6.67158 13.6811 5.14761 14.2365 3.8329C14.7919 2.5182 16.1966 1.77678 17.5954 2.06004C18.9942 2.34329 19.9998 3.5728 20 5C20 6.65685 18.6569 8 17 8Z" fill="currentColor" />
              </svg>
              <!-- <span class="sr-only">Notifications</span> -->
              <div v-if="notificationCount" class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-center font-medium text-white bg-red-700 dark:bg-red-500 border border-white rounded-full -top-1 -right-0 dark:border-gray-900">
                {{ notificationCount }}
              </div>
            </button>
          </div>
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



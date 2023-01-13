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
        <div>
          <Link :href="route('listing.create')" class="bg-sky-900 hover:bg-sky-600 text-white font-medium p-2 rounded-md">+ New Listing</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-900 bg-green-100 dark:bg-green-700 p-2">
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

</script>



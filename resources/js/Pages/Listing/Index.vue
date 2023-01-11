<template>
  <div v-for="listing in listings" :key="listing.id">
    <div>
      <Link :href="route('listing.show', {listing: listing.id})">
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <div>
      <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
    </div>
    <div>
      <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
import route from 'vendor/tightenco/ziggy/src/js'
defineProps({
  listings: Array,
})
</script>

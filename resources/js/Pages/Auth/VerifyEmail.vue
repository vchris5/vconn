<template>
  <div>You must be verified to see this page!</div>
  <div>
    <Link
      :href="route('verification.send')"
      method="post"
      as="button"
      class="text-sky-600 dark:text-sky-400"
    >
      Resend verification email
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

</script>

<template>
  <form>
    <div class="mb-4 mt-4 flex flex-wrap gap-4">
      <div class="flex flex-nowrap items-center gap-2">
        <input
          id="deleted"
          v-model="filterForm.deleted"
          type="checkbox"
          class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500"
        />
        <label for="deleted">Deleted</label>
      </div>

      <div>
        <select v-model="filterForm.by" class="input-filter-l w-24">
          <option value="created_at">DATE</option>
          <option value="price">PRICE</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-32">
          <option
            v-for="option in sortOptions"
            :key="option.value"
            :value="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>
    </div>
  </form>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia'
import { reactive, watch, computed } from 'vue'
import { debounce } from 'lodash'

const sortLabels = {
  created_at: [
    {
      label: 'NEW',
      value: 'desc',
    },
    {
      label: 'OLD',
      value: 'asc',
    },
  ],
  price: [
    {
      label: 'HIGH',
      value: 'desc',
    },
    {
      label: 'LOW',
      value: 'asc',
    },
  ],
}

const sortOptions = computed(() => sortLabels[filterForm.by])

const props = defineProps({
  filters: Object,
})

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by ?? 'created_at',
  order: props.filters.order ?? 'desc',
})

watch(
  filterForm, debounce(() => Inertia.get(
    route('realtor.listing.index'),
    filterForm,
    { preserveState: true, preserveScroll: true },
  ), 1000),
)
</script>

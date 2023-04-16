<template>
  <section>
    <div class="flex flex-col items-center mt-20 justify-center px-6 py-8 mx-auto lg:py-0">
      <h1 class="flex items-center mb-6 text-4xl font-bold text-gray-900 dark:text-white">
        Welcome back!
      </h1>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <p class="text-base font-semibold leading-tight tracking-tight text-gray-900 dark:text-white">
            Sign in to your account
          </p>
          <form class="space-y-4 md:space-y-6" @submit.prevent="login">
            <div>
              <div class="relative mt-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                  </svg>
                </div>
                <input id="email" v-model="form.email" type="email" class="peer pl-10 p-2.5 block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-l border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" placeholder=" " />
                <label for="email" class="absolute mb-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8 peer-focus:left-2">Your Email</label>
              </div>
              <div v-if="form.errors.email" class="input-error">
                {{ form.errors.email }}
              </div>
            </div>

            <div>
              <div class="relative mt-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                  </svg>
                </div>
                <input id="password" v-model="form.password" type="password" class="peer pl-10 p-2.5 block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-l border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" placeholder=" " />
                <label for="password" class="absolute mb-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-8 peer-focus:left-2">Password</label>
              </div>
              <div v-if="form.errors.password" class="input-error">
                {{ form.errors.password }}
              </div>
            </div>

            <div class="mt-4">
              <button type="submit" class="btn-primary w-full focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 text-sm text-center">
                Sign in
              </button>
              <p class="mt-3 text-sm font-light text-gray-500 dark:text-gray-400">
                Need an account? <Link :href="route('user-account.create')" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Click here</Link>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'
const form = useForm({
  email: null,
  password: null,
})

const login = () => form.post(route('login.store'))
</script>

@extends('master')

@section('content')
   <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <x-branding.logo size='large' class="mb-6" />
      <div
         class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
               Sign in to your account
            </h1>
            <form method="POST" action="{{ route('auth.login') }}" class="space-y-4 md:space-y-6">
               @csrf
               <div>
                  <x-form.input label="email" type="email" name="email" id="email" placeholder="name@company.com"
                     autocomplete="email" value="{{ old('email', '') }}" required />
               </div>
               <div>
                  <x-form.input label="Password" type="password" name="password" id="password" placeholder="••••••••"
                     required />
               </div>
               <div class="flex items-center justify-between">
                  <div class="flex items-start">
                     <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" type="checkbox"
                           class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                     </div>
                     <div class="ml-3 text-sm">
                        <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                     </div>
                  </div>
                  <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                     password?</a>
               </div>
               <x-form.button>
                  Sign in
               </x-form.button>
               <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                  Don’t have an account yet? <a href="#"
                     class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
               </p>
            </form>
         </div>
      </div>
   </div>
@endsection
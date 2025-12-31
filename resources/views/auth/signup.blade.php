@extends('master')

@section('content')
   <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <x-branding.logo size='large' class="mb-6" />
      <div
         class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
               Create an account
            </h1>
            <form method="POST" action="{{ route('auth.register') }}" class="space-y-4 md:space-y-6">
               @csrf
               <div>
                  <x-form.input label="Username" type="text" name="username" id="username"
                     placeholder="example: bekauridev" value="{{ old('username', '') }}" />
               </div>
               <div>
                  <x-form.input label="Email" type="email" name="email" id="email" placeholder="name@company.com"
                     autocomplete="email" value="{{ old('email', '') }}" />
               </div>
               <div>
                  <x-form.input label="Password" type="password" name="password" id="password" placeholder="••••••••" />
               </div>
               <div>
                  <x-form.input label="Confirm password" type="password" name="password_confirmation"
                     id="password_confirmation" placeholder="••••••••" />
               </div>

               <div class="my-6 h-px w-full bg-gray-200 dark:bg-gray-700"></div>

               <x-form.button>
                  Create an account
               </x-form.button>

               <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                  Already have an account? <a href="{{ route('page.login') }}"
                     class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
               </p>
            </form>
         </div>
      </div>
   </div>
@endsection
<header>
	<nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
		<div class="flex flex-col gap-3 mx-auto max-w-7xl lg:flex-row lg:items-center lg:justify-between">
			<x-branding.logo size='small' layout="full" href='/' />

			<div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-end">
				<a href="/"
					class="inline-flex w-full justify-center text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-2.5 sm:w-auto dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Home</a>
				@if (!Auth::user())
					<a href="{{ route('page.login') }}"
						class="inline-flex w-full justify-center text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-2.5 sm:w-auto dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
						in</a>
					<a href="{{ route('page.signup') }}"
						class="inline-flex w-full justify-center text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-2.5 sm:w-auto dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Sign
						up</a>
				@else
					<form method="GET" action="{{ route('logout') }}">
						<button type="submit"
							class="inline-flex w-full justify-center text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 py-2.5 sm:w-auto dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">log
							out</>
					</form>
				@endif

			</div>
		</div>
	</nav>
</header>
<footer class="bg-gray-900 text-gray-200 py-10">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-3 gap-8">

    <!-- Logo & Description -->
    <div class="flex flex-col gap-2">
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
          <circle cx="7" cy="17" r="2"/>
          <path d="M9 17h6"/>
          <circle cx="17" cy="17" r="2"/>
        </svg>
        <span class="font-bold text-xl">ServicesDb</span>
      </div>
      <p class="text-gray-400 text-sm">{{ __('messages.Connecting you with trusted services effortlessly.') }}</p>
    </div>

    <!-- Quick Links -->
    <div class="flex flex-col gap-2">
      <h3 class="font-semibold text-gray-200 mb-2">{{ __('messages.Quick Links') }}</h3>
      <a href="/privacy-policy" class="hover:text-blue-400 transition-colors">{{ __('messages.Privacy Policy') }}</a>
      <a href="/terms" class="hover:text-blue-400 transition-colors">{{ __('messages.Terms') }}</a>
      <a href="/support" class="hover:text-blue-400 transition-colors">{{ __('messages.Support') }}</a>
    </div>

    <!-- Contact / Socials -->
    <div class="flex flex-col gap-2">
      <h3 class="font-semibold text-gray-200 mb-2">{{ __('messages.Contact') }}</h3>
      <p class="text-gray-400 text-sm">support@servicesdb.com</p>
      <div class="flex gap-3 mt-2">
        <!-- <a href="#" class="hover:text-blue-400 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v15.08c0 .78-.63 1.41-1.41 1.41H1.41A1.41 1.41 0 0 1 0 19.64V4.56C0 3.78.63 3.15 1.41 3.15h21.18c.78 0 1.41.63 1.41 1.41zM8.21 17.14v-7.05l6.43 3.53-6.43 3.52z"/></svg></a>
        <a href="#" class="hover:text-blue-400 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.52 0-9.96 4.44-9.96 9.96 0 4.41 2.87 8.17 6.83 9.5.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.7-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.46-1.11-1.46-.91-.62.07-.61.07-.61 1.01.07 1.54 1.03 1.54 1.03.89 1.53 2.34 1.09 2.91.83.09-.64.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02a9.55 9.55 0 0 1 5 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.85-2.34 4.7-4.57 4.95.36.31.68.93.68 1.87 0 1.35-.01 2.44-.01 2.77 0 .27.18.58.69.48 3.96-1.33 6.83-5.09 6.83-9.5 0-5.52-4.44-9.96-9.96-9.96z"/></svg></a> -->
      </div>
    </div>

  </div>

  <!-- Bottom Copyright -->
  <div class="mt-8 border-t border-gray-700 pt-4 text-center text-gray-500 text-sm">
    &copy; {{ date('Y') }} ServicesDb. All rights reserved.
  </div>
</footer>

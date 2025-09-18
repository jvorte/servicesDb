<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand-fist-icon lucide-hand-fist"><path d="M12.035 17.012a3 3 0 0 0-3-3l-.311-.002a.72.72 0 0 1-.505-1.229l1.195-1.195A2 2 0 0 1 10.828 11H12a2 2 0 0 0 0-4H9.243a3 3 0 0 0-2.122.879l-2.707 2.707A4.83 4.83 0 0 0 3 14a8 8 0 0 0 8 8h2a8 8 0 0 0 8-8V7a2 2 0 1 0-4 0v2a2 2 0 1 0 4 0"/><path d="M13.888 9.662A2 2 0 0 0 17 8V5A2 2 0 1 0 13 5"/><path d="M9 5A2 2 0 1 0 5 5V10"/><path d="M9 7V4A2 2 0 1 1 13 4V7.268"/></svg>
         {{ __('messages.Support') }}
            </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-6 py-12 space-y-16 bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">

        <!-- Contact Information -->
        <section id="contact-info" class="scroll-mt-28 space-y-5">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Contact Information') }}</h2>
            <p class="text-gray-700 leading-relaxed">
            {{ __('messages.If you need help, our support team is here for you. Reach out via email or phone and we will respond promptly.') }}
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Email: <a href="mailto:support@servicesdb.com" class="text-blue-600 hover:underline">support@servicesdb.com</a></li>
                <li>Phone: <a href="tel:+1234567890" class="text-blue-600 hover:underline">+1 (234) 567-890</a></li>
            </ul>
        </section>

        <!-- FAQ Accordion -->
        <section id="faq" class="scroll-mt-28 space-y-6">
            <h2 class="text-2xl font-semibold text-gray-900 mt-3">{{ __('messages.Frequently Asked Questions') }}</h2>
            <div class="space-y-3">
                <div x-data="{ open: false }" class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = !open" class="w-full px-6 py-4 text-left text-gray-800 font-medium hover:bg-gray-50 transition">
                        {{ __('messages.How do I reset my password?') }}
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 text-gray-700 bg-gray-50">
                        {{ __('messages.Click "Forgot Password" on the login page and follow the instructions.') }}
                    </div>
                </div>
                <div x-data="{ open: false }" class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = !open" class="w-full px-6 py-4 text-left text-gray-800 font-medium hover:bg-gray-50 transition">
                       {{ __('messages.How can I upgrade my plan?') }}
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 text-gray-700 bg-gray-50">
                        {{ __('messages.Go to account settings → "Subscription" → select the plan you want to upgrade to.') }}
                    </div>
                </div>
                <div x-data="{ open: false }" class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = !open" class="w-full px-6 py-4 text-left text-gray-800 font-medium hover:bg-gray-50 transition">
                        {{ __('messages.Where can I find my invoices?') }}
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 text-gray-700 bg-gray-50">
                        {{ __('messages.All invoices are available under "Billing" in your account. You can download PDFs.') }}
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
        <section id="contact-form" class="scroll-mt-28 mt-5 space-y-6">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Send Us a Message') }}</h2>
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded-xl mb-4">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('support.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-medium mb-2">{{ __('messages.Message') }}</label>
                    <textarea name="message" id="message" rows="6" required
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="my-2" style="background-color:#2563EB; color:white; padding:0.35rem 1rem; border-radius:0.75rem;">
                    {{ __('messages.Send') }}
                </button>
            </form>
        </section>

    </div>

    <!-- Smooth scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    </script>

    <!-- Alpine.js for FAQ accordion -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-app-layout>

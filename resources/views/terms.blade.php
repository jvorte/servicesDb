<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-2">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt-text-icon lucide-receipt-text"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/></svg>
            {{ __('messages.Terms') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12 bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">

        <section id="acceptance" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Acceptance of Terms') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.By accessing or using ServicesDb, you agree to be bound by these Terms & Conditions. Please read them carefully before using the service.') }}
            </p>
        </section>

        <section id="use-of-service" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Use of Service') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.You agree to use ServicesDb lawfully, not for any unlawful, fraudulent, or unauthorized purposes. Compliance with all applicable laws is required.') }}
            </p>
        </section>

        <section id="limitations" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Limitations of Liability') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.ServicesDb is provided “as is”. We are not responsible for indirect, incidental, or consequential damages. Your use of the service is at your own risk.') }}
            </p>
        </section>

        <section id="modifications" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Modifications') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.We may revise or update these Terms at any time. Continued use of the service constitutes acceptance of the updated Terms.') }}
            </p>
        </section>

        <section id="contact" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Contact Us') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.For questions about these Terms, please contact us at ') }}
                <a href="mailto:support@servicesdb.com" class="text-blue-600 hover:underline">support@servicesdb.com</a>.
            </p>
        </section>

    </div>

    <!-- Smooth scroll script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    </script>
</x-app-layout>
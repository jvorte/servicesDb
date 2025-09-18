<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hat-glasses-icon lucide-hat-glasses">
                <path d="M14 18a2 2 0 0 0-4 0" />
                <path d="m19 11-2.11-6.657a2 2 0 0 0-2.752-1.148l-1.276.61A2 2 0 0 1 12 4H8.5a2 2 0 0 0-1.925 1.456L5 11" />
                <path d="M2 11h20" />
                <circle cx="17" cy="18" r="3" />
                <circle cx="7" cy="18" r="3" />
            </svg>
            {{ __('messages.Privacy & Policy.') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12 bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">

        <section id="information-we-collect" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Information We Collect') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.We collect information you provide directly to us when using our platform, such as account data, forms, and communications.') }}
            </p>
        </section>

        <section id="how-we-use" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.How We Use Your Information') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.Your data helps us improve Services, personalize experiences, and communicate important updates.') }}
            </p>
        </section>

        <section id="sharing" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Sharing & Disclosure') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.We do not sell your personal information. We share it only with trusted partners or as required by law.') }}
            </p>
        </section>

        <section id="security" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Security') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.We implement reasonable measures to protect your information, though no system is 100% secure.') }}
            </p>
        </section>

        <section id="contact" class="space-y-3 scroll-mt-24">
            <h2 class="text-2xl font-semibold text-gray-900">{{ __('messages.Contact Us') }}</h2>
            <p class="text-gray-700">
                {{ __('messages.Questions? Reach out at') }} <a href="mailto:support@servicesdb.com" class="text-blue-600 hover:underline">support@servicesdb.com</a>.
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
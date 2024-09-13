<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        <a href="#">
            <img class="w-auto h-7 sm:h-8" src="{{ public_path('assets/images/logo-dark.png')  }}" alt="logo">
        </a>

    </header>

    <main class="mt-8">
        <h2 class="text-gray-700 dark:text-gray-200">Hi {{$reservation->user->first_name}},</h2>

        <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
            We're excited to let you know that your reservation has been confirmed. Here are the details: <br/>
        </p>
        <p>
            {{
                'Property: ' . $reservation->property->title . ', From: ' . $reservation->start_date . ', To: ' . $reservation->end_date . ', Total: €' . $reservation->total_price
            }}
        </p>

        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Thanks, <br>
            Hola Roomie Team
        </p>

    </main>


    <footer class="mt-8">
        <p class="text-gray-500 dark:text-gray-400">
            This email was sent to <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">contact@merakiui.com</a>.
            If you'd rather not receive this kind of email, you can <a href="#"
                                                                       class="text-blue-600 hover:underline dark:text-blue-400">unsubscribe</a>
            or <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">manage your email preferences</a>.
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400">© 2024 Meraki UI. All Rights
            Reserved.</p>
    </footer>
</section>

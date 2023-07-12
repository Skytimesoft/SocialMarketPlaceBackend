@extends('frontend.layout')


@section('content')
    <nav class="flex mt-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        Accounts Guidelines
                    </a>
                </div>
            </li>
        </ol>
    </nav>


    <h3 class="font-bold text-2xl my-5">ACCOUNTS GUIDELINES</h3>

    <div class="mt-3 grid gap-3 mb-10 overflow-x-auto">
        There are the accounts guides below that help you to work with all the accounts provided by our store. Please, note
        we only register the accounts, so we can’t fully advise you. You can find all the basic information on any questions
        you might have.

        The guidelines are the following:

        Use only high-level proxy servers.
        The problem: if you log in to multiple accounts using only one IP address all your accounts may be blocked.
        The solution: use high-level proxy servers. High-level proxies or high-quality ones are individual IPv4 proxy
        servers (make sure you have exclusive access).

        What shouldn’t be done:
        - Do not use proxy servers packages like fineproxy, proxymir, etc;
        - Do not use applications like Hola, FreeVPN, etc. to change the IP. VPN services provide access to one IP address
        for several people at once and may be considered as shared proxies.
        - IPv6 proxies are not recommended for use.

        Important: It is impossible to use IPv6 for Vkontakte social network.

        Conclusion: use high-level proxy servers. If you authorize two or more accounts, you must use different proxy
        servers according to our store rules.

        The list of special programs and services can be found here: THE LIST

        Use different devices when logging in to multiple accounts.
        The problem: when you log in to multiple accounts from one device (computer, phone, tablet, etc.) all your accounts
        may be blocked.
        The solution: use various special programs and services.

        What are NOT different devices:
        - Usual browser mode and incognito one;
        - Cleaning cookies of browsers;
        - Different browsers.

        What are the different devices:
        - Computer, one more computer;
        - Phone, one more phone;
        - Special program for logging in to the accounts;
        - Changing UserAgent in the browser and other subsequent actions in the browser;
        - Use of special browsers that change the device data by themselves. For example, Accovod.

        Conclusion: use different devices or special programs. If you authorize two or more accounts, you must use different
        proxy servers according to our store rules.

        The list of special programs and services can be found here: THE LIST

        Limits and humanlike actions.
        The problem: if you immediately start doing mass operations on an account (making thousands of likes, sending
        hundreds of messages, etc.) it will be blocked quickly.
        The solution: to be secured, first you must do some common actions that a normal person would do after registering.
        Example: fill out the page, subscribe to several people, like some posts, add some photos, make a few reposts,
        comments, etc.

        Important: We are not responsible for the program/service developers and proxies providers. All the accounts are
        registered by us or by our partners using the private software (programs that are not available for public access)
        and proxies servers, which we also did by ourselves (they are not available for the public too).
    </div>
@endsection

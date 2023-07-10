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
                        Terms of Use
                    </a>
                </div>
            </li>
        </ol>
    </nav>


    <h3 class="font-bold text-2xl my-5">Terms of Use</h3>

    <div class="mt-3 grid gap-3 mb-10 overflow-x-auto">
        1.1. Accsmarket.com service GUARANTEES:

        - The full validity of the account (within 48 hours after the purchase), according to all the rules described in the
        Terms of Use and in the link https://accsmarket.com/en/recommendations;
        - Sale of accounts in the hands;
        - Replacing accounts in case of invalidity because of accsmarket.com store fault. Namely: the account is blocked,
        deleted, incorrect credentials to login into the account, ACTIVE guarantee (ACTIVE guarantee = NOT canceled
        guarantee);
        - Refund if an invalid account can not be replaced. Refunds can be made only to the following payment systems:
        Perfect Money, Qiwi, Yoo-Money, Advcash, WebMoney, and Litecoin.

        1.2. The following use is FORBIDDEN for the accounts purchased on the accsmarket.com website:

        - Use your original (local, home) IP address;
        - Use VPN services (paid, free, built-in (opera-VPN), and others);
        - Use an anonymous TOR browser;
        - Use virtual machines, device emulators, and servers (VPS, VDS);
        - Use IPv6 - proxy, common proxy, public proxy;
        - Use proxies and devices obtained illegally (including, but not limited to - botnets, etc.);
        - Log in to 2 or more accounts using 1 device and 1 proxy server;
        - Use the program and services: Sobot, proxymania.ru, keyproxy.net, 911.re, instap.ru;
        - Use accounts to harm other people (including, but not limited to - bullying on social networks, comment spam,
        threats, etc.) and to commit other illegal actions (including, but not limited to - fraud, extortion, data theft,
        etc. d.).

        1 legal private IPv4 proxy server and 1 new device (new UserAgent, cookie, specialized program) MUST be used for 1
        account.

        1.3. Accsmarket.com and its employees do not provide training and advice.

        1.3.1 The accsmarket.com service and its employees do not store accounts and the history of sold ones. The customer
        must take care of the preservation of the data himself.

        1.4. Accsmarket.com and its employees have the right to do:

        - Not to change the initially valid accounts. If you logged into your account and did something there, and your
        account was blocked after, the problem is most likely on your side;
        - Not to give a refund for purchased valid accounts. If you want to get a refund or a replacement of the account
        after your inattentive purchase, your request can be rejected.
        - Block the customer on accsmarket.com and do not give a refund in the following cases:
        a). The client spams on tickets, email, or chat
        b). The client leaves negative reviews or comments about the service on third-party resources
        c). The client is rude to technical support or uses cuss words.

        1.5. If the client agrees to the rules of the store (at the time of purchase), the CLIENT CONFIRMS that:

        - The client has read the detailed description of the accounts;
        - The client will change passwords for the accounts and will independently take care of their security in case of
        prolonged use of purchased accounts;
        - The responsibility shifts to the buyer after the purchase is made;
        - THE GUARANTEE IS BEING CANCELED in case of the violation of paragraph 1.2. and the client DOES NOT HAVE any claims
        to the service accsmarket.com;
        - The client refers to all the points above of the agreement.

        1.6 Additional information for suppliers:

        Accs Market immediately blocks the identified accounts and access to them if its support detects that the Users,
        selling the accounts on the website, have more than one account. And all the funds of the User balance are
        transferred to Accs Market as penalties and are not refundable.

        Useful information for beginners and persons who have problems when working with the accounts -
        https://accsmarket.com/en/info and https://accsmarket.com/en/faq

        If you have any problems with the purchase, after the purchase of goods, or other difficulties associated with this,
        please, contact us.

        Disclaimer - The accsmarket.com service is an intermediary between account sellers and buyers. The buyers are
        responsible themselves if use the accounts for any illegal activity. Accsmarket.com does not approve spamming (i.e.,
        commercial emailing without the prior consent of the recipients) and any fraudulent activity using the accounts.
    </div>
@endsection

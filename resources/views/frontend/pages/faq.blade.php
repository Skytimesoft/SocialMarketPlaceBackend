@extends('frontend.layout')


@section('content')
    <h3 class="font-bold text-2xl my-5">FAQ</h3>

    <div class="mt-3 grid gap-3 mb-10">
        <div x-data="{faq_item_open: false}" class="faq_wrap w-full relative rounded-lg border-1 border-slate-200 bg-white divide-y hover:ring-2 hover:ring-indigo-500" >
            <button x-on:click="faq_item_open=!faq_item_open" class="flex p-2 gap-2 w-full text-left items-center">
                <div class="w-full flex-1 flex items-center">
                    <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h4 class="text-lg flex-1 font-semibold text-black">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    </h4>
                </div>
                <div class="flex w-[30px] h-[30px] items-center justify-center rounded-full">
                    <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                        <path
                            d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                            fill="#3056D3" stroke="#3056D3"></path>
                    </svg>
                </div>
            </button>
            <div x-show="faq_item_open==true" class="faq-content" style="display: none;">
                <p class="p-3 text-base leading-relaxed text-body-color">
                    Rem, earum quae nesciunt blanditiis voluptate aliquam magnam quam, culpa vero sit quas veritatis? Necessitatibus magni adipisci tenetur magnam cum ipsam reprehenderit?
                </p>
            </div>
            <div x-show="faq_item_open==true" class="absolute rotate-180 top-full left-20 flex h-8 items-end overflow-hidden" style="display: none;">
                <div class="flex -mb-px h-[2px] w-80 -scale-x-100">
                    <div
                        class="w-full flex-none blur-sm [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                    <div
                        class="-ml-[100%] w-full flex-none blur-[1px] [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{faq_item_open: false}" class="faq_wrap w-full relative rounded-lg border-1 border-slate-200 bg-white divide-y hover:ring-2 hover:ring-indigo-500" >
            <button x-on:click="faq_item_open=!faq_item_open" class="flex p-2 gap-2 w-full text-left items-center">
                <div class="w-full flex-1 flex items-center">
                    <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h4 class="text-lg flex-1 font-semibold text-black">
                        Rem, earum quae nesciunt blanditiis voluptate aliquam magnam quam
                    </h4>
                </div>
                <div class="flex w-[30px] h-[30px] items-center justify-center rounded-full">
                    <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                        <path
                            d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                            fill="#3056D3" stroke="#3056D3"></path>
                    </svg>
                </div>
            </button>
            <div x-show="faq_item_open==true" class="faq-content" style="display: none;">
                <p class="p-3 text-base leading-relaxed text-body-color">
                    Rem, earum quae nesciunt blanditiis voluptate aliquam magnam quam, culpa vero sit quas veritatis? Necessitatibus magni adipisci tenetur magnam cum ipsam reprehenderit?
                    Rem, earum quae nesciunt blanditiis voluptate aliquam magnam quam, culpa vero sit quas veritatis? Necessitatibus magni adipisci tenetur magnam cum ipsam reprehenderit?
                </p>
            </div>
            <div x-show="faq_item_open==true" class="absolute rotate-180 top-full left-20 flex h-8 items-end overflow-hidden" style="display: none;">
                <div class="flex -mb-px h-[2px] w-80 -scale-x-100">
                    <div
                        class="w-full flex-none blur-sm [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                    <div
                        class="-ml-[100%] w-full flex-none blur-[1px] [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let faq_wrap = document.querySelectorAll('.faq_wrap')
        console.log(faq_wrap);
    </script>
@endsection

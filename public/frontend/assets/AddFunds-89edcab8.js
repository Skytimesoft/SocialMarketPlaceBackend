import{_ as i,o as l,c as n,a as e,r,n as a,g as c,F as u,e as _}from"./index-dfdb6224.js";const b={},f={class:"absolute rotate-180 top-full left-20 flex h-8 items-end overflow-hidden"},x=e("div",{class:"flex -mb-px h-[2px] w-80 -scale-x-100"},[e("div",{class:"w-full flex-none blur-sm [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]"}),e("div",{class:"-ml-[100%] w-full flex-none blur-[1px] [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]"})],-1),m=[x];function p(o,t){return l(),n("div",f,m)}const g=i(b,[["render",p]]),h=e("h1",{class:"mb-4 font-bold text-xl"}," ADD FUNDS ",-1),v={class:"border-indigo-500 border inline-flex rounded-full overflow-hidden"},w={class:"mt-5 flex"},y={class:"bg-white w-full max-w-[500px] p-5 rounded-xl shadow relative"},k=_('<h2 class="font-semibold text-xl">Amount to add, $:</h2><div class="flex flex-col mt-5"><label class="grid gap-1 mb-3"><span>Amount</span><input type="number" class="rounded-full flex-1"></label><label class="flex items-center pr-5 gap-2 mb-4"><input type="checkbox"><span>I agree to The Public Offer and The Terms of Use</span></label><div class="flex justify-end"><button class="py-2 px-10 rounded-full text-white bg-indigo-500">Add</button></div></div>',2),B={__name:"AddFunds",setup(o){const t=r("PaymentMethod");return(A,s)=>(l(),n(u,null,[h,e("div",null,[e("div",v,[e("button",{class:a([{"bg-indigo-500 text-white":t.value=="PaymentMethod"},"py-2 px-5"]),onClick:s[0]||(s[0]=d=>t.value="PaymentMethod")}," Payment methods ",2),e("button",{class:a([{"bg-indigo-500 text-white":t.value=="BalanceHistory"},"py-2 px-5"]),onClick:s[1]||(s[1]=d=>t.value="BalanceHistory")}," Balance history ",2)])]),e("div",w,[e("div",y,[k,c(g)])])],64))}};export{B as default};
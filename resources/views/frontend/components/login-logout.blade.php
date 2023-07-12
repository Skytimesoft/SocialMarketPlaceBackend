<div x-show="signUpDialougOpen==true"
    class="fixed top-0 left-0 right-0 bottom-0 z-10 bg-black/10 backdrop-blur-[2px] flex items-center justify-center"
    style="display: none;">
    <div class="bg-white text-black w-full max-w-[500px] rounded shadow-2xl">
        <div class="border-b pt-4 pb-4 px-4 text-xl flex justify-between">
            SIGN UP TO YOUR ACCOUNT
            <button x-on:click="toggleSignUp" class="py-1 px-4">
                <i class="fa-regular fa-times"></i>
            </button>
        </div>
        <form class="p-4 grid gap-4" x-on:submit.prevent="handleRegister">
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Name:</span>
                <input type="text" name="name" x-model="signup.name" class="py-1 flex-1" required />
            </label>
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Email:</span>
                <input type="email" name="email" x-model="signup.email" class="py-1 flex-1" required />
            </label>
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Your password:</span>
                <input type="password" name="password" x-model="signup.password" class="py-1 flex-1" required />
            </label>
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Confirm password:</span>
                <input type="password" name="password_confirmation" x-model="signup.password_confirmation"
                    class="py-1 flex-1" required />
            </label>
            <label class="flex items-center gap-2">
                <span class="w-[150px]">User Type:</span>
                <div class="flex gap-2 items-center">
                    <div class="flex items-center gap-2">
                        <input id="default-radio-1" type="radio" x-model="signup.user_type" value="Buyer"
                            name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="default-radio-1"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Buyer</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input checked id="default-radio-2" type="radio" x-model="signup.user_type" value="Seller"
                            name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="default-radio-2"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seller</label>
                    </div>
                </div>
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" required>
                I agree to the
                <a href="/en/public-offer" class="text-indigo-500" target="_blank">public offer</a> and
                <a href="/en/conditions" class="text-indigo-500" target="_blank">terms of use</a>
            </label>
            <button type="submit"
                class="max-w-[300px] w-full bg-indigo-500 text-white rounded py-1 px-4 text-center mx-auto">
                Sign up
            </button>
            <div class="text-center">
                Already have an account?
                <a href="#" class="text-indigo-500">Login</a>
            </div>
        </form>
    </div>
</div>


{{-- login dialoug --}}
<div x-show="signInDialougOpen==true"
    class="fixed top-0 left-0 right-0 bottom-0 z-10 bg-black/10 backdrop-blur-[2px] flex items-center justify-center"
    style="display: none;">
    <div class="bg-white text-black w-full max-w-[500px] rounded shadow-2xl">
        <div class="border-b pt-4 pb-4 px-4 text-xl flex justify-between">
            SIGN In
            <button x-on:click="toggleSignUp" class="py-1 px-4">
                <i class="fa-regular fa-times"></i>
            </button>
        </div>
        <form class="p-4 grid gap-4" x-on:submit.prevent="handleLogin">
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Email:</span>
                <input type="email" name="email" x-model="login.email" class="py-1 flex-1" required />
            </label>
            <label class="flex items-center gap-2">
                <span class="w-[150px]">Your password:</span>
                <input type="password" name="password" x-model="login.password" class="py-1 flex-1" required />
            </label> 
            <button type="submit"
                class="max-w-[300px] w-full bg-indigo-500 text-white rounded py-1 px-4 text-center mx-auto">
                Sign In
            </button>
            {{-- <div class="text-center">
                Already have an account?
                <a href="#" class="text-indigo-500">Login</a>
            </div> --}}
        </form>
    </div>
</div>

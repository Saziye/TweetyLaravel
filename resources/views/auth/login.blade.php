<x-master>
    <div class="container mx-auto flex justify-center ">
        <div class="px-12 py-8 bg-gray-200 rounded-lg border border-gray-300">
            <div class="col-md-8">
                <div class="card">
                    <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-6">
                                <label 
                                    class="block mb-2 uppercase  font-bold text-xs text-gray-700" 
                                    for="email"
                                >
                                    Email
                                </label>
                                <input 
                                    type="email" 
                                    class="border bordey-gray-400 p-2 w-full" 
                                    name="email" 
                                    id="email"
                                    value="{{old ('email')}}"
                                    required
                                    autocomplete="email"
                                >
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2"> 
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label 
                                    class="block mb-2 uppercase  font-bold text-xs text-gray-700" 
                                    for="password"
                                >
                                    Password
                                </label>
                                <input 
                                    type="password" 
                                    class="border bordey-gray-400 p-2 w-full" 
                                    name="password" 
                                    id="password"
                                    required
                                    autocomplete="current-password"
                                >
                    
                                @error('password')
                                    <p class="text-red-500 text-xs mt-2"> 
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <div>
                                    <input 
                                        type="checkbox" 
                                        class="mr-1" 
                                        name="remember" 
                                        id="remember" {{old('remember') ? 'checked': ''}}
                                    >
                                    <label 
                                        class="uppercase  font-bold text-xs text-gray-700" 
                                        for="remember"
                                    > 
                                        Remember Me
                                    </label>
                                </div>
                                @error('remember')
                                    <p class="text-red-500 text-xs mt-2"> 
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>

                            <div >
                                <button 
                                    type="submit" 
                                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                                >
                                    Submit
                                </button>
                                <a class="text-xs text-gray-700" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>

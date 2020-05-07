<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img 
                src="/images/banner.jpg" 
                alt="" 
                class="mb-2"
                style="width: 700px; height:223px; border-radius:20px; background-color:rgba(246,248,250)"
            >
            <img 
                src="{{$user->avatar}}" 
                alt=""
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"

            > 
        </div>
         
        <div class="flex justify-between items-center mb-6">

            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">
                    {{$user->name}}
                </h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a 
                        href=" {{$user->path('edit')}} " 
                        class="rounded-full border border-gray-300 py-2 px-4 mr-2 text-black text-xs"
                    >
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            Vestibulum nec tellus arcu. Aenean ut ante sem. Morbi a metus lobortis turpis aliquam euismod. Aliquam et diam nulla. In cursus rutrum dapibus. Aenean hendrerit porta arcu ac bibendum. Nam sit amet dapibus ex. Aenean quis erat odio. Vivamus in massa nulla. Curabitur sollicitudin tortor ligula, eget porttitor lorem suscipit non.
        </p>


      
    </header>
    <hr>
    @include('_timeline', [
        'tweets' => $tweets
    ])
   
</x-app>

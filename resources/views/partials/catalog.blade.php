<div class="grid grid-cols-4 gap-4 mt-4">
    @foreach ($latest_catalogs as $catalog)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
               
                @foreach ($catalog->images as $image)

                    @if ($image->featured)
                        <img class="w-full" src="{{$image->image}}" alt="Sunset in the mountains">
                    @endif

                @endforeach
                
                <div class="px-6 py-4">
                    <div class=" text-xl mb-2">{{$catalog->name}}</div>
                  
                    <p class="font-extrabold text-gray-700 text-base">
                        {{$catalog->start_at}}
                        @if($catalog->end_at)
                            <span> - {{$catalog->end_at}}</span>
                        @endif
                    </p>
                    <p class="text-gray-700 text-base">
                        By <a  href="{{$catalog->store->name}}" class="no-underline hover:underline text-blue-400">
                            {{$catalog->store->name}}
                        </a>
                    </p>
                    <p class="text-gray-700 text-base">
                        <a href="{{$catalog->slug}}" class="no-underline hover:underline text-blue-500 text-lg">View Details</a>
                    </p>
                </div>
            </div>
    @endforeach
    
</div>

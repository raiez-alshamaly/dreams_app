<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


    @forelse ($steps as $step)
        <div class="group relative flex gap-x-5">
            <!-- Icon -->
            <div
                class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                <div class="relative z-10 size-6 flex justify-center items-center">
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <!-- End Icon -->

            <!-- Right Content -->
            <div class="grow pb-8 group-last:pb-0">
               <div class="flex flex-row justify-between ">
                <div>
                    <h3 class="mb-1 text-xs text-color-light-200">
                        {{ $step->created_at }}
                    </h3>
    
    
    
                    <p class="mt-1 text-sm text-color-light-200"> {{ $step->description }} </p>
                </div>
                <div>
                    <button type="button" wire:click='delete({{ $step->id }})'>
                        delete
                    </button>
                    <button type="button" wire:click="edit({{ $step->id }})">edit</button>
                </div>
               </div>
               
                @if (count($step->media) > 0)
                    <!-- Slider -->
                    <div data-hs-carousel='{
                                "loadingClasses": "opacity-0",
                                "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer",
                                "isAutoPlay": true
                            }'
                        class="relative">
                        <div class="hs-carousel relative overflow-hidden w-full min-h-96 bg-white rounded-lg">
                            <div
                                class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                                @forelse ($step->media as $item)
                                  
                                    @if ($item->getType() == 'image')
                                        <div class="hs-carousel-slide">
                                            <div class="flex justify-center h-full  ">
                                                <img class="  max-w-full h-auto   object-cover rounded-s-lg"
                                                    src="{{ asset('storage/' . $item->path) }}" alt="step-media">
                                            </div>
                                        </div>
                                    @elseif ($item->getType() == 'video')
                                        {{-- video show --}}
                                    @endif
                                @empty
                                @endforelse

                            </div>
                        </div>

                        <button type="button"
                            class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-11.5 h-full text-color-light-200 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-s-lg">
                            <span class="text-2xl" aria-hidden="true">
                                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                            </span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button type="button"
                            class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-11.5 h-full text-color-light-200 hover:bg-gray-800/10 focus:outline-hidden focus:bg-gray-800/10 rounded-e-lg">
                            <span class="sr-only">Next</span>
                            <span class="text-2xl" aria-hidden="true">
                                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </span>
                        </button>

                        <div
                            class="hs-carousel-pagination  justify-center absolute bottom-3 start-0 end-0 flex gap-x-2">
                        </div>
                    </div>
                    <!-- End Slider -->
                    {{-- <div class="mt-3">


                        <div class="relative flex items-center ">
                            <img class="  max-w-full h-auto   object-cover rounded-s-lg"
                                src="{{ asset('storage/' . $step->media) }}" alt="step-media">
                        </div>


                    </div> --}}
                @else
                @endif
            </div>
            <!-- End Right Content -->
        </div>
    @empty
        <div> </div>
    @endforelse
</div>


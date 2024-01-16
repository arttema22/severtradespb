@if (count($slides) > 0)
<section class="bg-grey py-12 xl:pt-12 xl:pb-0 overflow-hidden">
    <div class="container mx-auto h-full">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <div class="container mx-auto h-full">
                        <!-- text & img -->
                        <div class="flex flex-col xl:flex-row items-bottom justify-between h-full">
                            <!-- text -->
                            <div class="xl:w-[48%] text-center xl:text-left">
                                <!-- bage -->
                                <div class="flex items-center bg-white py-[10px] px-[20px]
                               w-max gap-x-2 mb-[26px] rounded-full mx-auto xl:mx-0">
                                    <!-- bage icon -->
                                    <i class="{{ $slide->bage_icon }} text-2xl text-accent"></i>
                                    <div class="uppercase text-base font-medium
                                  text-[#9ab4b7] tracking-[2.24px]">{{ $slide->bage_title }}</div>
                                </div>
                                <!-- title -->
                                <h1 class="h1 mb-6">{{ $slide->title }}</h1>
                                <!-- desc -->
                                <p class="mb-[42px] md:max-w-xl">
                                    {!! $slide->text !!}
                                </p>
                                <!-- btn-->
                                <a href="{{ $slide->btn_url }}" class="btn btn-lg btn-accent mx-auto xl:mx-0">
                                    <i class="{{ $slide->btn_icon }} text-2xl text-white"></i>
                                    {{ $slide->btn_title }}
                                </a>
                            </div>
                            <!-- image -->
                            <div class="hidden xl:flex max-w-[814px] self-end">
                                <img src="{{ asset('storage/'.$slide->image) }}" alt="{{ $slide->title }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endif
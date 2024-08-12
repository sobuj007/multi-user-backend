@extends('layouts.app')

@section('content')


        <div class="container relative z-40 mx-auto mt-12">

            <div class="flex flex-wrap justify-center mx-auto lg:w-full md:w-5/6 xl:shadow-small-blue">

                <a href="{{route('agents.index')}}" class="hover:bg-green-400   active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-portfolio-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Store Profile Info
                        </p>
                    </div>
                </a>

                <a href="{{route('certificate_images.index')}}" class="hover:bg-green-400   active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-blog-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Certificate
                        </p>
                    </div>
                </a>
                <a href="{{route("service_images.index")}}" class="hover:bg-green-400   active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-landing-page-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Services Image
                        </p>
                    </div>
                </a>

                <a href="{{route('experts.index')}}" class="hover:bg-green-400  active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-ecommerce-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Expats
                        </p>
                    </div>
                </a>

                <a href="{{route("services.index")}}" class="hover:bg-green-400   active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-startup-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Add Service product
                        </p>
                    </div>
                </a>

                <a href="#" class="hover:bg-green-400  active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-business-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Locations
                        </p>
                    </div>
                </a>

                <a href="#" class="hover:bg-green-400   active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-lifestyle-green.svg" class="block mx-auto">

                        <p class=" pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Users
                        </p>
                    </div>
                </a>



                <a href="#" class="hover:bg-green-400  active:bg-green-400  hover:text-slate-900 focus:outline-none focus:ring focus:ring-violet-300 block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="https://redpixelthemes.com/assets/images/icon-health-green.svg" class="block mx-auto">

                        <p class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            health
                        </p>
                    </div>
                </a>

            </div>

        </div>


      </div>
</body>
</html>
@endsection

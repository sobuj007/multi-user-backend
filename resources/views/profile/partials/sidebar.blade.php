<nav class="h-full">
    <ul class="list-group py-5 px-6 ">

        @if(Auth::user()->role==='admin')
        <li calss="{{ request()->is('/admin*') ? 'text-white-500' : 'text-gray-700' }} list-group-item  text-orange-500 " ><a class="text-neutral-50 block" href="{{Route('admin.dashboard')}}">Home</a></li>
        {{-- <li calss="{{ request()->is('*admin/*') ? 'text-blue-500' : 'text-gray-700' }} list-group-item py-2  active:text-white-600 " ><a href="">Subcategory</a></li> --}}

        @endif
        @if(Auth::user()->role==='agent')
            <li calss="{{ request()->is('*agent*') ? 'text-blue-500' : 'text-gray-700' }} list-group-item py-2  active:text-white-600 " ><a href="{{Route('agent.dashboard')}}">Home</a></li>
            <li class="list-group-item py-2 {{request()->is('agent/dashboard*') ? 'active' : ''}} active:bg-blue-600 " ><a href="">My Tasks</a></li>

        @endif
    </ul>
</nav>

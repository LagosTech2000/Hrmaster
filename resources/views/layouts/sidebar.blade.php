<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img style="width:4.5cm;" src="{{asset('/img/logoHRmaster.jpeg')}}" alt="">
         
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logohondutel.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>

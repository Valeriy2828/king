﻿@if($menu)
    {{--@dd($menu->roots())--}}
    <div class="menu classic">
        <ul id="nav" class="menu">
            @include('pink.customMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif

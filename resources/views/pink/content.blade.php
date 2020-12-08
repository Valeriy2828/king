@if($portfolios && count($portfolios) > 0)
<div id="content-home" class="content group">
    <div class="hentry group">
        <div class="section portfolio">

            <h3 class="title">{{ __('messages.Latest movies') }}</h3>

            @foreach($portfolios as $k => $item)
                @if($k == 0)
                    <div class="hentry work group portfolio-sticky portfolio-full-description">
                        @if($en)
                            <div class="work-thumbnail">
                                <a class="thumb"><img src="{{ asset('pink/images/projects/'.$item->img->max ) }}" alt="{{ $item->title->en }}" title="{{ $item->title->en }}" /></a>
                                <div class="work-overlay">
                                    <h3><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->en }}</a></h3>
                                    <p class="work-overlay-categories"><img src="{{ asset('pink/images/categories.png') }}" alt="Categories" />{{-- in: <a href="#">--}}{{--{{ $item->filter->title }}--}}{{--</a>--}}</p>
                                </div>
                            </div>
                            <div class="work-description">
                                <h2><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->en }}</a></h2>
                                {{--<p class="work-categories">in: <a href="#">--}}{{--{{ $item->filter->title }}--}}{{--</a></p>--}}
                                <p>{{ str_limit($item->text->en,200) }}</p>
                                    <a href="{{ route('portfolios.show',['alias' => $item->slug]) }}" class="read-more">|| Read more</a>
                            </div>
                        @elseif($ru)
                            <div class="work-thumbnail">
                                <a class="thumb"><img src="{{ asset('pink/images/projects/'.$item->img->max ) }}" alt="{{ $item->title->ru }}" title="{{ $item->title->ru }}" /></a>
                                <div class="work-overlay">
                                    <h3><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->ru }}</a></h3>
                                    <p class="work-overlay-categories"><img src="{{ asset('pink/images/categories.png') }}" alt="Categories" />{{-- in: <a href="#">--}}{{--{{ $item->filter->title }}--}}{{--</a>--}}</p>
                                </div>
                            </div>
                            <div class="work-description">
                                <h2><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->ru }}</a></h2>
                                {{--<p class="work-categories">in: <a href="#">--}}{{--{{ $item->filter->title }}--}}{{--</a></p>--}}
                                <p>{{ str_limit($item->text->ru,200) }}</p>
                                <a href="{{ route('portfolios.show',['alias' => $item->slug]) }}" class="read-more">|| Читать полностью</a>
                            </div>
                         @endif
                    </div>

                    <div class="clear"></div>
                    @continue
                @endif



            @if($k == 1)
                <div class="portfolio-projects">
            @endif
                    @if($en)
                        <div class="related_project {{ ($k == 4) ? 'related_project_last related_project' : '' }}">
                            <div class="overlay_a related_img">
                                <div class="overlay_wrapper">
                                    <img src="{{ asset('pink/images/projects/'.$item->img->mini) }}" alt="{{ $item->title->en }}" title="{{ $item->title->en }}" />
                                    <div class="overlay">
                                        <a class="overlay_img" href="{{ asset('pink/images/projects/'.$item->img->path ) }} " rel="lightbox" title="{{ $item->title->en }}"></a>
                                        <a class="overlay_project" href="{{ route('portfolios.show',['alias' => $item->slug]) }}"></a>
                                        <span class="overlay_title">{{ $item->title->en }}</span>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->en }}</a></h4>
                            <p>{{ str_limit($item->text->en,200) }}</p>
                        </div>
                    @elseif($ru)
                        <div class="related_project {{ ($k == 4) ? 'related_project_last related_project' : '' }}">
                            <div class="overlay_a related_img">
                                <div class="overlay_wrapper">
                                    <img src="{{ asset('pink/images/projects/'.$item->img->mini) }}" alt="{{ $item->title->ru }}" title="{{ $item->title->ru }}" />
                                    <div class="overlay">
                                        <a class="overlay_img" href="{{ asset('pink/images/projects/'.$item->img->path ) }} " rel="lightbox" title="{{ $item->title->ru }}"></a>
                                        <a class="overlay_project" href="{{ route('portfolios.show',['alias' => $item->slug]) }}"></a>
                                        <span class="overlay_title">{{ $item->title->ru }}</span>
                                    </div>
                                </div>
                            </div>
                            <h4><a href="{{ route('portfolios.show',['alias' => $item->slug]) }}">{{ $item->title->ru }}</a></h4>
                            <p>{{ str_limit($item->text->ru,200) }}</p>
                        </div>
                    @endif

                    @endforeach
                </div>

        </div>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>
@else
    <p>{{ __('messages.Big problem!!!') }}</p>
@endif

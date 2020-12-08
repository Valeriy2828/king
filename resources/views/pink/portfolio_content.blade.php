{{--@dd($portfolio->title->en)--}}
<div id="content-page" class="content group">
    <div class="clear"></div>
    <div class="posts">
        <div class="group portfolio-post internal-post">
            @if($portfolio)
            <div id="portfolio" class="portfolio-full-description">

                <div class="fulldescription_title gallery-filters">
                    @if($en)
                        <h1>{{ $portfolio->title->en }}</h1>
                    @elseif($ru)
                        <h1>{{ $portfolio->title->ru }}</h1>
                    @endif
                </div>

                <div class="portfolios hentry work group">
                    <div class="work-thumbnail">
                        <a class="thumb"><img src="{{ asset('pink/images/projects/'.$portfolio->img->max) }}" alt="{{ $portfolio->title->en }}" title="{{ $portfolio->title->en }}" /></a>
                    </div>
                    <div class="work-description">
                        @if($en)
                            <p>{{ $portfolio->text->en }}</p>
                        @elseif($ru)
                            <p>{{ $portfolio->text->ru }}</p>
                        @endif
                        <div class="clear"></div>
                        <div class="work-skillsdate">
                            @if($en)
                                <p class="skills"><span class="label">{{ __('messages.Director') }}:</span> {{ $portfolio->director->en }}</p></p>
                                <p class="workdate"><span class="label">{{ __('messages.Starring') }}:</span> {{ $portfolio->customer->en }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Year') }}:</span> {{ $portfolio->year }}</p>
                            @elseif($ru)
                                <p class="skills"><span class="label">{{ __('messages.Director') }}:</span> {{ $portfolio->director->ru }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Starring') }}:</span> {{ $portfolio->customer->ru }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Year') }}:</span> {{ $portfolio->year }}</p>
                             @endif
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
                @if(!$portfolios->isEmpty())
                <h3>{{ __('messages.Other movies') }}</h3>

                <div class="portfolio-full-description-related-projects">
                    @foreach($portfolios as $portfolio)
                        <div class="related_project">
                            @if($en)
                                <a class="related_proj related_img" href="{{ route('portfolios.show',['alias' =>$portfolio->slug ]) }}" title="{{ $portfolio->title->en }}"><img src="{{ asset('pink/images/projects/'.$portfolio->img->mini) }}" alt="{{ $portfolio->title->en }}" title="{{ $portfolio->title->en }}" /></a>
                                <h4><a href="{{ route('portfolios.show',['alias' =>$portfolio->slug ]) }}">{{ $portfolio->title->en }}</a></h4>
                            @elseif($ru)
                                <a class="related_proj related_img" href="{{ route('portfolios.show',['alias' =>$portfolio->slug ]) }}" title="{{ $portfolio->title->ru }}"><img src="{{ asset('pink/images/projects/'.$portfolio->img->mini) }}" alt="{{ $portfolio->title->ru }}" title="{{ $portfolio->title->ru }}" /></a>
                                <h4><a href="{{ route('portfolios.show',['alias' =>$portfolio->slug ]) }}">{{ $portfolio->title->ru }}</a></h4>
                             @endif
                        </div>
                    @endforeach
                </div>
                 @endif
            </div>
            @endif
            <div class="clear"></div>
        </div>
    </div>
</div>

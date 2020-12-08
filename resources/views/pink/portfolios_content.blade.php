<div id="content-page" class="content group">
    <div class="hentry group">
        <!--<script>
            jQuery(document).ready(function($){
                $('.sidebar').remove();

                if( !$('#primary').hasClass('sidebar-no') ) {
                    $('#primary').removeClass().addClass('sidebar-no');
                }

            });
        </script>-->
        {{--@dd($portfolios)--}}
        @if($portfolios && (count($portfolios) > 0))
        <div id="portfolio" class="portfolio-big-image">
            @foreach($portfolios as $portfolio)
                {{--@dd($portfolio->customer->en)--}}
                <div class="hentry work group">
                    <div class="work-thumbnail">
                        <div class="nozoom">
                            <img src="{{ asset('pink/images/projects/'.$portfolio->img->max) }}" alt="{{ $portfolio->title->en }}" title="{{ $portfolio->title->en }}" />
                            <div class="overlay">
                                <a class="overlay_project" href="{{ route('portfolios.show',['alias' => $portfolio->alias ]) }}"></a>
                                @if($en)
                                    <span class="overlay_title">{{ $portfolio->title->en }}</span>
                                @elseif($ru)
                                    <span class="overlay_title">{{ $portfolio->title->ru }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="work-description">
                        @if($en)
                            <h3>{{ $portfolio->title->en }}</h3>
                        @elseif($ru)
                            <h3>{{ $portfolio->title->ru }}</h3>
                        @endif

                        @if($en)
                            <p>{{ mb_substr($portfolio->text->en, 0, 500) }} [.....]</p>
                        @elseif($ru)
                            <p>{{ mb_substr($portfolio->text->ru, 0, 500) }} [.....]</p>
                        @endif

                        <div class="clear"></div>
                        <div class="work-skillsdate">
                            @if($en)
                                <p class="skills"><span class="label">{{ __('messages.Director') }}:</span> {{ $portfolio->director->en }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Starring') }}:</span> {{ $portfolio->customer->en }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Year') }}:</span> {{ $portfolio->year }}</p>
                            @elseif($ru)
                                <p class="skills"><span class="label">{{ __('messages.Director') }}:</span> {{ $portfolio->director->ru }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Starring') }}:</span> {{ $portfolio->customer->ru }}</p>
                                <p class="workdate"><span class="label">{{ __('messages.Year') }}:</span> {{ $portfolio->year }}</p>
                            @endif
                        </div>
                        <a class="read-more" href="{{ route('portfolios.show',['alias' => $portfolio->slug ]) }}">{{ __('messages.Read description') }}</a>
                    </div>
                    <div class="clear"></div>
                </div>
            @endforeach
                <div class="general-pagination group">
                    @if($portfolios->lastPage() > 1)
                        @if($portfolios->currentPage() !== 1)
                            <a href="{{ $portfolios->url($portfolios->currentPage() - 1) }}">&laquo;</a>
                        @endif

                        @for($i = 1; $i <= $portfolios->lastPage(); $i++ )
                            @if($portfolios->currentPage() == $i)
                                <a class="selected disabled">{{ $i }}</a>
                            @else
                                <a href="{{ $portfolios->url($i) }}">{{ $i }}</a>
                            @endif
                        @endfor
                        @if($portfolios->currentPage() !== $portfolios->lastPage())
                            <a href="{{ $portfolios->url($portfolios->currentPage() + 1) }}" >&raquo;</a>
                        @endif
                    @endif
                </div>
        </div>
        @else
            <h2>{{ __('messages.No content added!!!!') }}</h2>
        @endif
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>

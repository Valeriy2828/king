
    <div class="widget-first widget recent-posts">
        @if($articles)
        <h3>{{ __('messages.Recently added') }}</h3>
        <div class="recent-post group">
            @foreach($articles as $article)
            <div class="hentry-post group">
                <div class="thumb-img"><img src="{{ asset('pink/images/articles/'.$article->img->mini) }}" alt="001" title="001" /></div>
                <div class="text">
                    {{--@dd($article)--}}
                    @if($en)
                        <a href="{{ route('articles.show',['alias' => $article->slug]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title->en }}</a>
                    @elseif($ru)
                        <a href="{{ route('articles.show',['alias' => $article->slug]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title->ru }}</a>
                    @endif
                    {{--<p class="post-date">{{ $article->created_at->format('F d, Y') }}</p>--}}
                    <p class="post-date">{{ $article->year->part1 }}{{ $article->year->part2 }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="widget-last widget text-image">
        <h3>{{ __('messages.Best quotes') }}</h3>
       {{-- <div class="text-image" style="text-align:left"><img src="{{ asset('pink/images/callus.gif') }}" alt="Customer support" /></div>--}}

        @foreach($quotes as $quote)
            @foreach($quote->text as $k => $text)
                @if($en)
                    @if($k == 'en')
                        <p>{{ $text }}</p>
                    @endif
                @elseif($ru)
                    @if($k == 'ru')
                        <p>{{ $text }}</p>
                    @endif
                @endif
            @endforeach
        @endforeach
    </div>
    @endif


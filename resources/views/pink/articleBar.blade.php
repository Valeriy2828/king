
    <div class="widget-first widget recent-posts">
        <h3>{{ __('messages.The last notes') }}</h3>
        <div class="recent-post group">
            @if(!$portfolios->isEmpty())
                @foreach($portfolios as $portfolio)
                    <div class="hentry-post group">
                        <div class="thumb-img"><img style="width: 55px;" src="{{ asset('pink/images/projects/'.$portfolio->img->mini) }}" alt="001" title="001" /></div>
                        <div class="text">
                            @if($en)
                                <a href="{{ route('portfolios.show',['alias' => $portfolio->slug]) }}" title="{{ $portfolio->title->en }}" class="title">{{ $portfolio->title->en }}</a>
                                <p>{{ str_limit($portfolio->text->en,130) }} </p>
                                <a class="read-more" href="{{ route('portfolios.show',['alias' => $portfolio->slug]) }}">&rarr; Read More</a>
                             @elseif($ru)
                                <a href="{{ route('portfolios.show',['alias' => $portfolio->slug]) }}" title="{{ $portfolio->title->ru }}" class="title">{{ $portfolio->title->ru }}</a>
                                <p>{{ str_limit($portfolio->text->ru,130) }} </p>
                                <a class="read-more" href="{{ route('portfolios.show',['alias' => $portfolio->slug]) }}">&rarr; Читать больше</a>
                             @endif
                        </div>
                    </div>
                 @endforeach
             @endif
        </div>
    </div>

{{--<div id="last-tweets-2" class="widget last-tweets">
    <h3>Last Tweets</h3>
    <div class="list-tweets"></div>
    <script type="text/javascript">
        jQuery(function($){
            $('#last-tweets-2 .list-tweets').tweetable({
                listClass: 'tweets-widget',
                username: 'YIW',
                time: true,
                limit: 3,
                replies: true
            });
        });
    </script>
</div>  --}}

@if(!$comments->isEmpty())
    <div class="widget-last widget recent-comments">
        <h3>{{ __('messages.Recent Comments') }}</h3>
        <div class="recent-post recent-comments group">
            @foreach($comments as $comment)
                <?php
                    $title = json_decode($comment->article->title);
                ?>
                <div class="the-post group">
                    <div class="avatar">
                        {{--<img alt="" src="{{asset('pink/images/avatar/unknow55.png')}}" class="avatar" />--}}
                        @set($hash, ($comment->email) ? md5($comment->email) : $comment->user->email)
                        <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" />
                    </div>
                    <span class="author"><strong>{{ isset($comment->user) ? $comment->user->name : $comment->name}}</strong> - </span>
                    @if($en)
                        <a class="title" href="{{ route('articles.show',['alias' => $comment->article->slug]) }}">{{ $title->en }}</a>
                    @elseif($ru)
                        <a class="title" href="{{ route('articles.show',['alias' => $comment->article->slug]) }}">{{ $title->ru }}</a>
                    @endif
                    <p class="comment">
                        {{ $comment->comments }} <a class="goto" href="{{ route('articles.show',['alias' => $comment->article->alias]) }}">&#187;</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endif




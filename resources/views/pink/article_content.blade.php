<div id="content-single" class="content group">
    <div class="hentry hentry-post blog-big group ">
        {{--@dd($article)--}}
        <!-- post featured & title -->
        @if($article)
                <?php
                    $title = json_decode($article->category->title);
                ?>
        <div class="thumbnail">
            <!-- post title -->
            @if($en)
                <h1 class="post-title">{{ $article->title->en }}</h1>
            @elseif($ru)
                <h1 class="post-title">{{ $article->title->ru }}</h1>
            @endif
            <!-- post featured -->
            <div class="image-wrap">
                <img src="{{ asset('pink/images/articles/'.$article->img->max) }}"  alt="00212" title="00212" />
            </div>
            <p class="date">
                {{--<span class="month">{{ $article->created_at->format('M') }}</span>
                <span class="day">{{ $article->created_at->format('D') }}</span>--}}
                <span class="month">{{ $article->year->part1 }}</span>
                <span class="day">{{ $article->year->part2 }}</span>
            </p>
        </div>
        <!-- post meta -->
        <div class="meta group">
            <p ><i class="fas fa-star-half-alt fa-lg"></i> <span>{{ $article->rating }}</span></p>
            @if($en)
                <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias' => $article->category->alias]) }}" title="View all posts in {{ $title->en }}" rel="category tag">{{ $title->en }}</a></span></p>
            @elseif($ru)
                <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias' => $article->category->alias]) }}" title="Все книги в категории {{ $title->ru }}" rel="category tag">{{ $title->en }}</a></span></p>
            @endif
            <p class="comments"><span><a href="#comments" title="{{ __('messages.Comment on this book. Enjoy !!') }}">{{ count($article->comments) ? count($article->comments) : '0' }} {{trans_choice('messages.comment', count($article->comments))}}</a></span></p>
        </div>
        <!-- post content -->
        <div class="the-content single group">
            @if($en)
                <p>{{ $article->text->en }}</p>
            @elseif($ru)
                <p>{{ $article->text->ru }}</p>
            @endif
            <div class="socials">
                <h2>{{ __('messages.love it, share it!') }}</h2>
                <a href="https://www.facebook.com" class="socials-small facebook-small" title="Facebook">facebook</a>
                <a href="https://twitter.com" class="socials-small twitter-small" title="Twitter">twitter</a>
                <a href="https://plusone.google.come" class="socials-small google-small" title="Google">google</a>
                <a href="http://pinterest.com" class="socials-small pinterest-small" title="Pinterest">pinterest</a>
                <a href="http://yourinspirationtheme.com" class="socials-small bookmark-small" title="This is the title of the first article. Enjoy it.">bookmark</a>
            </div>
        </div>
        {{--<p class="tags">Tags: <a href="#" rel="tag">book</a>, <a href="#" rel="tag">css</a>, <a href="#" rel="tag">design</a>, <a href="#" rel="tag">inspiration</a></p>--}}
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
        <h3 id="comments-title">
            <span>{{ count($article->comments) }}</span> {{trans_choice('messages.comment', count($article->comments))}}
        </h3>
    @if(count($article->comments) > 0)
        @set($com,$article->comments->groupBy('parent_id'))
        <ol class="commentlist group">
            @foreach($com as $k => $comments)
                @if($k !== 0)
                    @break
                @endif

                @include('pink.comment',['items' => $comments])
            @endforeach
        </ol>
    @endif

        <!-- START TRACKBACK & PINGBACK -->
        {{--@if(!Auth::check())--}}
        @if(!auth()->user())
            <div class="form-brd"><h3>{{ __('messages.Register or login to post comments') }}</h3></div>
        @else
        <h2 id="trackbacks">{{ __('messages.Do not forget to leave your review') }}</h2>
        <ol class="trackbacklist"></ol>
        <p><em>{{ __('messages.And perhaps it is your comment that will help someone with a choice!') }}</em></p>

        <!-- END TRACKBACK & PINGBACK -->
        <div id="respond">
            <h3 id="reply-title">{{ __('messages.Leave a') }} <span>{{ __('messages.Reply') }}</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">{{ __('messages.Cancel reply') }}</a></small></h3>
            <form action="{{ route('comment.store') }}" method="post" id="commentform">
                @csrf
                <p class="comment-form-comment"><label for="comment">{{ __('messages.Your comment') }}</label><textarea id="comment" name="comments" cols="45" rows="8"></textarea></p>
                <div class="clear"></div>
                <p class="form-submit">
                    <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $article->id }}"/>
                    <input id="comment_parent" type="hidden" name="comment_parent" value="0"/>
                    <input name="submit" type="submit" id="submit" value="{{ __('messages.Post Comment') }}" />
                </p>
            </form>
        </div>
        @endif
        <!-- #respond -->
    </div>
    <!-- END COMMENTS -->
    @else
        <p>{{ __('messages.Big problem!!!') }}</p>
    @endif
</div>

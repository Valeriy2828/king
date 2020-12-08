<div id="content-blog" class="content group">
    @if($articles && (count($articles) > 0))

    @foreach($articles as $article)
            {{--@dd($article)--}}
            <?php
                $title = json_decode($article->category->title);
            ?>
    <div class="sticky hentry hentry-post blog-big group">
        <!-- post featured & title -->
        <div class="thumbnail">
            <!-- post title -->
            @if($en)
                <h2 class="post-title"><a href="{{ route('articles.show',['alias' => $article->slug]) }}">{{ $article->title->en }}</a></h2>
            @elseif($ru)
                <h2 class="post-title"><a href="{{ route('articles.show',['alias' => $article->slug]) }}">{{ $article->title->ru }}</a></h2>
            @endif
            <!-- post featured -->
            <div class="image-wrap">
                <img src="{{ asset('pink/images/articles/'.$article->img->max) }}" alt="img" title="img" />
            </div>
            <p class="date">
                {{--<span class="month">{{ ($article->created_at) ? $article->created_at->format('Y') : '' }}</span>
                <span class="day">{{ ($article->created_at) ? $article->created_at->format('d') : '' }}</span>--}}
                <span class="month">{{ $article->year->part1 }}</span>
                <span class="day">{{ $article->year->part2 }}</span>
            </p>
        </div>
        <!-- post meta -->
        <div class="meta group">
            <p ><i class="fas fa-star-half-alt fa-lg"></i> <span>{{ $article->rating }}</span></p>
            @if($en)
                <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias ' => $article->category->alias]) }}" title="View all posts in {{ $title->en }}" rel="category tag">{{ $title->en }}</a>
            @elseif($ru)
                <p class="categories"><span>В: <a href="{{ route('articlesCat',['cat_alias ' => $article->category->alias]) }}" title="View all posts in {{ $title->ru }}" rel="category tag">{{ $title->ru }}</a>
            @endif
            <p class="comments"><span><a href="{{ route('articles.show',['alias' => $article->slug]) }}#respond" title="Comment on Section shortcodes &amp; sticky posts!">{{ count($article->comments) ? count($article->comments) : '0' }} {{trans_choice('messages.comment', count($article->comments))}}</a></span></p>
        </div>
        <!-- post content -->
        <div class="the-content group">
            @if($en)
                {{ mb_substr($article->text->en, 0, 500) }} [.....]
            @elseif($ru)
                {{ mb_substr($article->text->ru, 0, 500) }} [.....]
            @endif

            <p><a href="{{ route('articles.show',['alias' => $article->slug]) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ {{ __('messages.Read more') }}</a></p>
        </div>
        <div class="clear"></div>
    </div>
    @endforeach


    <div class="general-pagination group">
        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a href="{{ $articles->url($articles->currentPage() - 1) }}">&laquo;</a>
            @endif

            @for($i = 1; $i <= $articles->lastPage(); $i++ )
                @if($articles->currentPage() == $i)
                    <a class="selected disabled">{{ $i }}</a>
                @else
                    <a href="{{ $articles->url($i) }}">{{ $i }}</a>
                @endif
            @endfor
                @if($articles->currentPage() !== $articles->lastPage())
                    <a href="{{ $articles->url($articles->currentPage() + 1) }}" >&raquo;</a>
                @endif
         @endif
    </div>
    @else
        <h2>{{ __('messages.No content added!!!!') }}</h2>
    @endif
</div>

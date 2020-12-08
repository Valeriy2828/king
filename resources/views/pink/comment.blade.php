@foreach($items as $item)
<li id="li-comment-{{ $item->id }}" class="comment even {{ ($item->user_id == $article->user_id) ? 'bypostaauthor odd' : ''}}">
    <div id="comment-{{ $item->id }}" class="comment-container">
        <div class="comment-author vcard">

            @set($hash, ($item->email) ? md5($item->email) : $item->user->email)
            <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=75" class="avatar" height="75" width="75" />
            <cite class="fn">{{ $item->user->name }}</cite>
        </div>
        <!-- .comment-author .vcard -->
        <div class="comment-meta commentmetadata">
            <div class="intro">
                <div class="commentDate">
                    @if($en)
                        <p>{{ is_object($item->created_at) ? $item->created_at->format('F d, Y \a\t H:i') : '' }}</p>
                     @elseif($ru)
                        <p>{{ is_object($item->created_at) ? Date::parse($item->created_at)->format('F d, Y \в H:i') : '' }}</p>
                     @endif
                </div>
                <div class="commentNumber">#&nbsp;</div>
            </div>
            <div class="comment-body">
                <p>{{ $item->comments }}</p>
            </div>
            @if(auth()->user())
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{ $item->id }}&quot;, &quot;{{ $item->id }}&quot;, &quot;respond&quot;, &quot;{{ $item->article->id }}&quot;)">{{ __('messages.reply') }}</a>
                </div>
            @endif
            <!-- .reply -->
        </div>
        <!-- .comment-meta .commentmetadata -->
    </div>
    <!-- #comment-##  -->

    @if(isset($com[$item->id]))
        <ul class="children">
            @include('pink.comment',['items' => $com[$item->id]])
        </ul>
    @endif
</li>
@endforeach

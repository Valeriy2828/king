<!-- START PRIMARY -->
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="hentry group">
               {{-- @dd($biographies)--}}
                @foreach($biographies as $biography)
                    @if($en)
                        <p>{{ $biography->text->en }}
                     @elseif($ru)
                        <p>{{ $biography->text->ru }}
                     @endif
                            @if($biography->img)
                                <img class="aligncenter" src="{{ asset('pink/images/features/'.$biography->img) }}" alt="King" />
                            @endif
                         </p>
                @endforeach
                <blockquote>
                    <p>{{ __('messages.In my opinion, one of the favorite activities of the Lord God is to force those who say “never” to act') }}</p>
                </blockquote>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<!-- END PRIMARY -->

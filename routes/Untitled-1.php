

        @if ($post->comments->count() > 0)
                @foreach ($post->comments as $comment)
                <ul class="comment-list">
                    <li class="comment">
                        <div class="vcard">
                            <img src="@if ($comment->user->image) {{ asset($comment->user->image) }} @else
                            {{ asset('frontend/images/user.png') }} @endif"
                                alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <div class="d-flex align-item-center justify-content-between">
                                <h3>{{ $comment->user->name }}</h3>
                                {{-- <a href="{{ route('comment.delete',$comment->id) }}" class="text-danger">Delete</a> --}}

                                    {{-- <form action="{{ route('comment.delete',$comment->id) }}"method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded mr-1"><i
                                                class="fa fa-trash-o"
                                                aria-hidden="true"></i>Delete</button>
                                    </form> --}}
                                    @if ($comment->user_id == Auth::user()->id)

                                    <form action="{{ route('comment.delete',$comment->id) }}"method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded mr-1 text-danger"><i
                                                class="fa fa-trash-o"
                                                aria-hidden="true"></i>Delete</button>
                                    </form>

                                    @endif
                            </div>
                            <h3>{{ $comment->comment }}</h3>
                            <p>{{ $comment->message }}</p>
                            {{-- <div class="meta text-dark"> --}}
                            <div class="text-dark">
                                @if ($comment->created_at)
                                    {{ $comment->created_at->format('M d Y H:i:s A') }}
                                    {{-- {{ $comment->created_at->diffForHumans() }} --}}
                                @endif
                                {{-- {{ $comment->created_at->format('M d ,Y') }} --}}
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
            @endif

<div class="col-lg-6 col-sm-6">
    <div class="single-new-user">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{ asset($user->profile)  }}" alt="Image">
            </div>

            <div class="flex-grow-1 ms-3">
                <h3>
                    <a href="/users/{{ $user->username }}">{{ $user->first_name." ".$user->last_name }}</a>
                </h3>
                <p>{{ $user->username }}</p>
            </div>
        </div>

        <ul class="d-flex justify-content-between align-items-center">
            <li>
                @if($user->questions->count())
                    <p><span>{{ $user->questions->count() }}</span> questions</p>
                @else
                    <p>This user has not posted question yet.</p>
                @endif
            </li>
            <li>
                @if($user->myFollowers->count() && auth()->check())
                    @foreach($user->myFollowers as $x)
                        @php
                            $followerArray [] = $x->pivot->follower_id;
                        @endphp
                    @endforeach
                        @if((in_array(auth()->user()->id,$followerArray)))
                            <form action="/users/follow/destroy" method="post">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="button" class="default-btn unfollow"  data-id="{{ $user->id }}">Unfollow</button>
                            </form>
                        @else
                            <form action="/users/follow/store" method="post">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="button" class="default-btn follow"  data-id="{{ $user->id }}">Follow</button>
                            </form>
                        @endif
                @elseif(!$user->myFollowers->count() && auth()->check())
                    <form action="/users/follow/store" method="post">
                        @csrf
                        <input type="hidden" value="{{ $user->id }}" name="user">
                        <button type="button" class="default-btn follow" data-id="{{ $user->id }}">Follow</button>
                    </form>
                @else
                    <a href="/users/{{ $user->username }}">
                        <button class="default-btn">Visit</button>
                    </a>
                @endif
            </li>
        </ul>
    </div>
</div>

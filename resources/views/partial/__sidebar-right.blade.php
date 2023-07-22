<div class="right-siderbar">
    @if(auth()->check())
        <div class="right-siderbar-common">
            <a href="/question/create" class="default-btn">
                Ask a question
            </a>
        </div>
    @endif
    @yield('topic')
        <div class="right-siderbar-common">
            <div class="trending-tags">
                <h3>
                    <i class="ri-price-tag-3-line"></i>
                    Active Tags
                </h3>

                <ul>
                    @foreach($tags as $x)
                        <li>
                            <a href="/tags/{{ $x->name }}">
                                {{ $x->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>



    <div class="right-siderbar-common">
        <div class="top-members">
            <h3>
                <i class="ri-discuss-line"></i>
                Top members
            </h3>

            <ul>
                @foreach($topuser as $x)
                    <li>
                        <a href="groups.html">
                            <img src="{{ $x->author->avatar }}" alt="Image">
                            <p>{{ $x->author->last_name." ".$x->author->first_name }}
                                <span>({{ $x->author->username}})</span>
                            </p>
                            <span>{{ $x->author->answers->count(). " Answers"}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


</div>

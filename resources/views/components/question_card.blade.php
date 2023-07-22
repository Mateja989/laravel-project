<div class="single-qa-box like-dislike">
    <div class="d-flex">
        <div class="link-unlike flex-shrink-0">
            <a href="/questions">
                <img src="{{ asset($avatar) }}" alt="Image">
            </a>

            <div class="donet-like-list">
                <x-form.reaction
                    action="/questions/like"
                    icon="ri-thumb-up-fill"
                    id="{{ $id }}"
                    name="like"
                />
            </div>

            <div class="donet-like-list">
                <x-form.reaction
                    action="/questions/dislike"
                    icon="ri-thumb-down-fill"
                    id="{{ $id }}"
                    name="dislike"
                    like="1"
                />
            </div>
        </div>
        <div class="flex-grow-1 ms-3">
            <ul class="graphic-design">
                <li>
                    <a href="/users/{{ $username }}">{{ $user }}</a>
                </li>
                <li>
                    <span>Latest Answer: 14 hours ago</span>
                </li>
                <li>
                    <span>In:</span>
                    <a href="tags.html" class="graphic">
                        {{ $topic }}
                    </a>
                </li>
            </ul>

            <h3>
                <a href="/questions/{{ $slug }}">
                    {{ $title }}
                </a>
            </h3>

            <p>
                {{ $excerpt }}
            </p>

            <!--Prebaci u komponentu -->
            <ul class="tag-list">
                @forelse($tags as $t)
                    <li>
                        <a href="/tags/{{ $t }}">{{ $t }}</a>
                    </li>
                @empty
                    <p>No more</p>
                @endforelse

            </ul>

            <div class="d-flex justify-content-between align-items-center">
                <ul class="anser-list">
                    <li>
                        {{ $like }} Likes

                    </li>
                    <li>
                        {{ $dislike }} Dislikes

                    </li>
                    <li>
                        Answers
                    </li>
                </ul>
                <a href="/questions/{{ $slug }}" class="default-btn">
                    Answer
                </a>
            </div>
        </div>
    </div>
</div>

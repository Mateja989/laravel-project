<div class="question-details-content like-dislike">
     <div class="d-flex">
            <div class="link-unlike flex-shrink-0">
                <a href="user.html">
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
                        btn="btn-dislike"
                        count="3"
                    />
                </div>
            </div>
            <div class="flex-grow-1 ms-3">
                <ul class="graphic-design">
                    <li>
                        <a href="/users">{{ $user }}</a>
                    </li>
                    <li>
                        <span>Posted: </span>
                    </li>
                    <li>
                        <span>In:</span>
                        <a href="tags.html" class="graphic">
                            {{ $topic }}
                        </a>
                    </li>
                </ul>
                <h3>
                    <a href="queations-details.html">
                        {{ $title }}
                    </a>
                </h3>

                <p>{{ $body }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="anser-list">
                        <li>
                            <a href="polls.html">
                                24 Vote
                            </a>
                        </li>
                        <li>
                            <a href="most-answered.html">
                                2 Answer
                            </a>
                        </li>
                        <li>
                            <a href="most-visited.html">
                                658 Views
                            </a>
                        </li>
                    </ul>

                    <a href="most-answered.html" class="default-btn">
                        Answer
                    </a>
                </div>
                @error('post')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                @error('like')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror

            </div>
        </div>
    </div>


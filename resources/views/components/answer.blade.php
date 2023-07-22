<div class="answer-question-details like-dislike">
    <div class="d-flex">
        <div class="link-unlike flex-shrink-0">
            <a href="user.html">
                <img src="{{ asset($avatar) }}" alt="Image">
            </a>
        </div>

        <div class="flex-grow-1 ms-3">
            <ul class="latest-answer-list">
                <li>
                    <a href="user.html">{{ $username }}</a>
                </li>
                <li>
                    <span>Latest Answer: {{ $date }}</span>
                </li>
                <li class="reports">
                    <a href="referrals.html" class="report">
                        <i class="ri-error-warning-line"></i>
                        Report
                    </a>
                </li>
            </ul>
            <p>{{ $body }}.</p>

        </div>
    </div>
</div>

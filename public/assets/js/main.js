let url=window.location.pathname


window.onload=function(){
    if( url=='/questions' ||
        url == '/' ||
        url == 'home'
        ) {
        keyword.addEventListener('keyup',function (){
            ajaxCallBack('/questions/filter','post',filterQuestions)
        })
        topic.addEventListener('change',function (){
            ajaxCallBack('/questions/filter','post',filterQuestions)
        })
    }
    if(url.includes('/questions/')) {
        answerBtn.addEventListener('click',function (){
            ajaxCallBack2('/answer','post',AnswerTheQuestions)
        })
        likeBtn.addEventListener('click',function (){

            data = {
                like : reaction.value,
                post : question.value,
            }

            $.ajax({
                url: '/questions/like',
                method: 'post',
                data: data,
                dataType: "json",
                success: function(result){
                    likeBtnColor(result)
                },
                error: function(xhr){
                    console.error(xhr);
                }
            })

        })


        dislikeBtn.addEventListener('click',function (){

            console.log(reaction.value)
            data = {
                like : 1,
                post : question.value,
            }

            $.ajax({
                url: '/questions/like',
                method: 'post',
                data: data,
                dataType: "json",
                success: function(result){
                    dislikeBtnColor(result)
                },
                error: function(xhr){

                }
            })
        })


    }

    if(url.includes('/users')) {

    }
}

var followBtns = document.querySelectorAll('.follow')
var unfollowBtns = document.querySelectorAll('.unfollow')
var keyword = document.querySelector('#keyword')
var topic = document.querySelector('#topic-ddl')
var question_id = document.querySelector('#question')
var answer = document.querySelector('#message')
var answerBtn = document.querySelector('#btn-answer')
var likeBtn = document.querySelector('#btn-like')
var dislikeBtn = document.querySelector('#btn-dislike')
var question = document.querySelector('#question')
var reaction = document.querySelector('#reaction')


function dislikeBtnColor(result){
    likeBtn.innerHTML = `<i class="ri-thumb-up-fill"></i>
        <span id="">${result.likes}</span>
    `
    dislikeBtn.innerHTML = `<i class="ri-thumb-down-fill"></i>
        <span id="">${result.dislikes}</span>
    `

    dislikeBtn.classList.add('text-danger')
}

function likeBtnColor(result){
    likeBtn.innerHTML = `<i class="ri-thumb-up-fill"></i>
        <span id="">${result.likes}</span>
    `
    dislikeBtn.innerHTML = `<i class="ri-thumb-down-fill"></i>
        <span id="">${result.dislikes}</span>
    `
    likeBtn.classList.add('text-success')
}

followBtns.forEach( x => x.addEventListener('click',function (){
    var id = $(this).data('id')
    $.ajax({
        url: '/users/follow/storeajax',
        method: 'post',
        data: {
            user : id
        },
        dataType: "json",
        success: function(result){

            var mesto = document.querySelector('#message-follow')
            mesto.innerHTML = `<p class="alert alert-success">${result.success}</p>`
        },
        error: function(xhr){
            console.error(xhr);
        }
    })
}))

unfollowBtns.forEach( x => x.addEventListener('click',function (){
    var id = $(this).data('id')

    $.ajax({
        url: '/users/follow/destroyajax',
        method: 'post',
        data: {
            user : id
        },
        dataType: "json",
        success: function(result){
            var mesto = document.querySelector('#message-follow')
            mesto.innerHTML = `<p class="alert alert-success">${result.success}</p>`
        },
        error: function(xhr){
            console.error(xhr);
        }
    })
}))

function AnswerTheQuestions(result){
    let html = ''
    for(let x of result) {
        html += `<div class="answer-question-details like-dislike">
                    <div class="d-flex">
                        <div class="link-unlike flex-shrink-0">
                            <a href="user.html">
                                <img src='${x.author.avatar}' alt="Image">
                            </a>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <ul class="latest-answer-list">
                                <li>
                                    <a href="user.html">${x.author.username}</a>
                                </li>
                                <li>
                                    <span>Latest Answer: 12 sec</span>
                                </li>
                                <li class="reports">
                                    <a href="referrals.html" class="report">
                                        <i class="ri-error-warning-line"></i>
                                        Report
                                    </a>
                                </li>
                            </ul>
                            <p>${x.body}</p>
                            </div>
                        </div>
                    </div>`
    }
    document.querySelector('#answers-area').innerHTML = html
}

function filterQuestions(result){

    console.log(result)
    let html = ''

    if(result.length){
        for(let x of result){
            html += `<div class="single-qa-box like-dislike">
                <div class="d-flex">
                    <div class="link-unlike flex-shrink-0">
                        <a href="/questions">
                            <img src="${x.user.avatar}" alt="Image">
                        </a>

                        <div class="donet-like-list">
                            <x-form.reaction
                                action="/questions/like"
                                icon="ri-thumb-up-fill"
                                id="${x.id}"
                                name="like"
                            />
                        </div>

                        <div class="donet-like-list">
                            <x-form.reaction
                                action="/questions/dislike"
                                icon="ri-thumb-down-fill"
                                id="${x.id}"
                                name="dislike"
                                like="1"
                            />
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <ul class="graphic-design">
                            <li>
                                <a href="/users/${x.user.username}">${x.user.first_name + " " + x.user.last_name}</a>
                            </li>
                            <li>
                                <span>Latest Answer: 14 hours ago</span>
                            </li>
                            <li>
                                <span>In:</span>
                                <a href="tags.html" className="graphic">
                                    ${x.topic.name}
                                </a>
                            </li>
                        </ul>

                        <h3>
                            <a href="/questions/{{ $slug }}">
                                ${x.title}
                            </a>
                        </h3>

                        <p>
                            ${x.excerpt}
                        </p>

                        <!--Prebaci u komponentu -->
                        <ul class="tag-list">

                            <li>
                                <a href="/tags/">Programing</a>
                            </li>



                        </ul>

                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="anser-list">
                                <li>
                                    13 Likes

                                </li>
                                <li>
                                    14 Dislikes

                                </li>
                                <li>
                                    Answers
                                </li>
                            </ul>
                            <a href="/questions/" class="default-btn">
                                Answer
                            </a>
                        </div>
                    </div>
                </div>
            </div>`
        }
    }
    else{
        html += `<h3 class="mt-5">No question.</h3>`
    }

    var deo = document.querySelector('#recent-questions')
    return  deo.innerHTML = html
}


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function ajaxCallBack(url,method,callback){
    $.ajax({
        url: url,
        method: method,
        data: {
            keyword:keyword.value,
            topic:topic.value
        },
        dataType: "json",
        success: function(result){
            callback(result)
        },
        error: function(xhr){
            console.error(xhr);
        }
    })
}

function ajaxCallBack2(url,method,callback){
    $.ajax({
        url: url,
        method: method,
        data: {
            question : question_id.value,
            answer : answer.value
        },
        dataType: "json",
        success: function(result){
            callback(result)
        },
        error: function(xhr){
            console.error(xhr);
        }
    })
}

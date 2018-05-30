@extends('layout.main')

@section('content')

<div class="container">



        <div class="col-sm-8">
            <blockquote>
                <p><img src="/image/user.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>


                <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->funs_count}}｜文章：{{$user->posts_count}}</footer>
                @include('user.badges.like',['target_user'=>$user])
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$post->user_id}}">{{$post->user->name}} </a> {{$post->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>
                            <p>{!! str_limit($post->content,20,'..') !!}</p>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="blog-post" style="margin-top: 30px">
                            @foreach($susers as $suser)
                            <p class="">$suser->name</p>
                            <p class="">关注：{{$suser->stars_count}} | 粉丝：{{$suser->fans_count}}｜ 文章：{{$suser->posts_count}}</p>

                                @include('user.badges.like',['target_user'=>$fuser])
                            @endforeach
                        </div>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="blog-post" style="margin-top: 30px">
                            @foreach($fusers as $fuser)
                                <p class="">$fuser->name</p>
                                <p class="">关注：{{$fuser->stars_count}} | 粉丝：{{$fuser->fans_count}}｜ 文章：{{$fuser->posts_count}}</p>

                                @include('user.badges.like',['target_user'=>$suser])
                            @endforeach
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->




@endsection

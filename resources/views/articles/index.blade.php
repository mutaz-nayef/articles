@extends('layout')
@section('content')
    <div id="wrapper">
        <div class="container" id="page">

            @forelse($articles as $article)
                <div class="content">
                    <div class="title">
                        <h2>

                            <a href="{{$article->path()}}">
                                {{--                            <a href="/articles/{{$article->id}}">--}}
                                {{--                                <a href="{{route('articles.show',$article)}}">--}}
                                {{$article->title}}
                            </a>
                        </h2>
                    </div>
                    <p>
                        <img src="/img/banner.jpg"
                             alt="" style="width: 500px;"
                             class="image image-full"/>
                    </p>
                    {!! $article->excerpt !!}
                </div>
            @empty
                <p>No relevant Articles yet.</p>
            @endforelse

        </div>
    </div>
@endsection

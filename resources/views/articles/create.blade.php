@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection
@section('content')
    <div id="wrapper">
        <div class="container" id="page">
            <h1 class="heading-has-text-weight-bold is-size-4">New Article</h1>
            <form method="post" action="/articles">
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input type="text"
                               class="input @error('title') is-danger @endif"
                               name="title"
                               id=""
                               value="{{old('title')}}">
                        @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>
                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @endif"
                                  name="excerpt"
                                  id="excerpt"
                        >{{old('excerpt')}}</textarea>
                        @error('excerpt')
                        <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="body">Body</label>
                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @endif" name="body"
                                  id="body">{{old('body')}}</textarea>
                        @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>


                <div class="field">
                    <label class="label" for="body">Tags</label>
                    <div class="select is-multiple control">
                        <select name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        {{--                        <p class="help is-danger">{{$errors->first('tags')}}</p>--}}
                        <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

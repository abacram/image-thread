@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-image"></i> {{ trans('navs.frontend.new_post') }}
                </div>

                <div class="panel-body">
                    {!! Form::open([
                        'url' => 'post/store', 'method' => 'post', 'files' => true
                    ]) !!}

                    <div class="form-group">
                        {!! Form::label('title', trans('navs.frontend.field_title'), ['class' => 'control-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', trans('navs.frontend.field_image'), ['class' => 'control-label']) !!}
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit(trans('navs.frontend.new_post_button'), ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

        </div>

        @if(count($posts) > 0)
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-image"></i> {{ trans('navs.frontend.post_list') }}</div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-12">
                                    <h2>{{ $post->title }}</h2>
                                    <a href="#" class="thumbnail">
                                        <img data-src="{{ $post->image }}" alt="{{ $post->title }}">
                                    </a>
                                    <p class="pull-right"><i>{{ $post->created_at }}</i></p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
@endsection

@section('after-scripts-end')
    <script>
        console.log(loaded);

        //imgs load defer
        function init() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i=0; i<imgDefer.length; i++) {
                if(imgDefer[i].getAttribute('data-src')) {
                    imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
                } 
            } 
        }
        window.onload = init;
    </script>
@stop
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{!! route('index') !!}">
                <i class="fa fa-image"></i>
                {!! app_name() !!}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">

            <ul class="nav navbar-nav">
                <li>{!! link_to_route('index', 'Posts: '.$nPosts) !!}</li>
                <li>{!! link_to_route('index', 'Views: '.$nViews) !!}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_route('posts/export', trans('navs.frontend.export')) !!}</li>
                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}
                            <span class="caret"></span>
                        </a>

                        @include('includes.partials.lang')
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
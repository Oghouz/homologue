@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    {!! Theme::partial('headers.index') !!}

    <main>
        {!! Theme::partial('breadcrumb') !!}
        <div class="pt-80 pb-80 mt-130">
            <div class="">
                {!! Theme::content() !!}
            </div>
        </div>
    </main>

    {!! Theme::partial('footer') !!}
@endsection

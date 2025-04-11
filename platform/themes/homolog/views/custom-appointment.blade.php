@extends(Theme::getThemeNamespace('layouts.default'))

@section('content')
    {!! Theme::has('content') ? Theme::content() : '' !!}

@endsection
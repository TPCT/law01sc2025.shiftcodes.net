@foreach(config('app.locales') as $locale => $locale_language)
    @continue($language == $locale)
    <li><a href="{{route($route, array_merge(request()->route()?->parameters() ?? [], ['locale' => $locale], request()->query()))}}">{{$locale_language}}</a></li>
@endforeach
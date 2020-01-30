@if(Auth::user()->image)
    {{--dos formas de mostrar la imagen--}}
    {{--<img src="{{ url('/user/avatar/'.Auth::user()->image) }}" />--}}
    <img src="{{ route('user.avatar', [ 'filename' => Auth::user()->image]) }}" class="avatar" />
@endif

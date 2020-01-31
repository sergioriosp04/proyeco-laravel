@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            @foreach($images as $image)
                <div class="card mb-4">
                    <div class="card-header">
                        <img src="{{ route('user.avatar', [ 'filename' => $image->user->image]) }}" class="avatar rounded-circle mr-3" />
                        <span class="font-weight-bold">{{ $image->user->name. '' .$image->user->username }}</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="image-container">
                            <img src="{{ route('image.file',['filename' => $image->image_path]) }}" class="image " alt=" error en la red al cargar la imagen">
                        </div>
                        <div class="likes">

                        </div>
                        <div class="description">
                            <span class="font-weight-bold pl-3 pt-5">{{ '@'.$image->user->nick. ':'}}</span>
                            <p class="pl-3">{{ $image->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
         {{--        PAGINACION--}}
                <p class="text-center">{{$images->links()}}</p>

        </div>

    </div>
</div>
@endsection

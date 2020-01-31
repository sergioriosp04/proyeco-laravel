@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            @foreach($images as $image)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ route('user.avatar', [ 'filename' => $image->user->image]) }}" class="avatar rounded-circle mr-3" />
                        <span class="font-weight-bold">{{ $image->user->name. '' .$image->user->username }}</span>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

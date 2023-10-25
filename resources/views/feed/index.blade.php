@extends('layouts.feed')

@section('title', 'feed')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column">
                <feed-view :feed="{{json_encode($lastFeed)}}"></feed-view>
            </div>
        </div>
    </div>
@endsection

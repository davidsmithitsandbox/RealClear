@extends('layouts.app')

@section('content')

    {{-- Generated Vue Components --}}
    <router-view></router-view>

    {{-- An embedded video to demonstrate asynchronous loading --}}
    <div style="position: fixed;bottom: 0;right: 0;">
        <iframe 
            style="border:none" 
            height="200" 
            src="https://www.youtube.com/embed/o8NPllzkFhE/I?&autoplay=1" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>

@endsection


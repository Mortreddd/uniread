@extends('layouts.admin.index')


@section('title', 'Books') 

@section('content')
    @include('layouts.admin.partials.sidebar')
    @include('layouts.admin.partials.published-books')

@endsection

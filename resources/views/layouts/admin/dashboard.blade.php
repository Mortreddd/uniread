@extends('layouts.admin.index')

@section('title', 'Dashboard')

@section('content')
    @include('layouts.admin.partials.sidebar')
    <section class="relative w-full min-h-full overflow-y-auto bg-gray-200">
        @include('layouts.admin.statistics.author-statistics', ['totalVotes' => $totalVotes, 'activeAuthors' => $activeAuthors, 'inActiveAuthors' => $inActiveAuthors])
        @include('layouts.admin.chart.author-chart')
    </section>
@endsection

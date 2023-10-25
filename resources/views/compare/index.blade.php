@extends('layouts.app')

@section('title', 'Balance - השוואת הכנסות והוצאות')

@section('content')
<div class="columns">
    <canvas id="compareChart" aria-label="השוואת הכנסות והוצאות" role="img"></canvas>
</div>
@endsection


@section('js')
    <script src="{{mix('js/charts/compareChart.js')}}"></script>
@endsection

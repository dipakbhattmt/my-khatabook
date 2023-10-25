@extends('layouts.app')
@section('title', 'Balance - Your Financial Place')

@section('js')
    @auth
     <script src="{{mix('js/charts/monthlyCharts.js')}}"></script>
     <script src="{{mix('js/charts/compareChart.js')}}"></script>
    @endauth
@endsection

@section('content')
    @auth
        <section class="section">
            <div class="columns is-centered">
                <div class="column is-3">
                    <div class="box">
                        <canvas id="compareChart" aria-label="טבלת נתונים עבור הוצאות החודש"  style="display: block; width: 553px; height: 276px;" width="550" height="250"></canvas>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="box">
                        <canvas id="monthlyChart" aria-label="טבלת נתונים עבור הוצאות החודש"  style="display: block; width: 553px; height: 276px;" width="550" height="250"></canvas>
                    </div>
                </div>
            </div>
        </section>
    @endauth
    @include('partials.overview')

@endsection

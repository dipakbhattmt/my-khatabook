@extends('layouts.app')

@section('title')
    Balance - {{__('general.number-of-activities-made-this-month')}}
@endsection

@section('content')
    <h4 class="subtitle is-4-mobile m-1 has-text-centered">
         סך כל הוצאות לחודש הנבחר: {{array_sum(array_column($activities, 'total_amount'))}} {{__('general.currency')}}
    </h4>
    <monthly-view :activities="{{json_encode($activities)}}" :general="{{json_encode(__('general'))}}"></monthly-view>
@endsection

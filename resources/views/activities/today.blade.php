@extends('layouts.app')

@section('title', 'פעילויות היום')

@section('content')
    <h3 class="subtitle is-3-mobile m-1">{{$activities->count()}} {{__('general.number-of-activities-made-today')}}.</h3>
    <div class="columns is-multiline m-1">
            @foreach($activities as $activity)
            <div class="column is-4">
            <div class="box" style="display: flex; flex-direction: column;">
                <a class="list-item"> {{__('general.payments-list.amount')}}{{$activity->amount}} {{__('general.currency')}}</a>
                <a class="list-item">
                    {{__('general.payments-list.info')}} {{$activity->info}}
                </a>
                <a class="list-item">
                    {{__('general.payments-list.bill_number')}} {{$activity->bill_id}}
                </a>
                <a class="list-item">
                    {{__('general.payments-list.paid_at')}} {{$activity->paid_at}}
                </a>
                <a class="list-item">
                    {{__('general.payment-method')}}: {{auth()->user()->locale == 'he' ? $activity->method->type :$activity->method->english_type}}
                </a>
                <div class="list-item">
                  <a class="button is-link " href="{{route('activities.show', $activity)}}">{{__('general.more-about-activity')}}</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection

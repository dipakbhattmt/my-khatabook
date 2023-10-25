@extends('layouts.app')

@section('title')
    {{__('general.budget')}}
@endsection

@section('content')
    <div class="columns is-centered m-1">
        <div class="column is-4">
            <h5 class="subtitle is-5">{{__('general.set-new-budget-for')}} <b>{{$budgetInfo->forMonth}}</b></h5>
            <hr>
            @if($errors->any())
                @include('partials.form-errors')
            @endif
            <form action="{{route('budget.store')}}" method="post">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="number" class="input @error('budget') is-danger @enderror" step="0.01" min="1" name="budget" placeholder="{{__('general.what-budget-would-you-like-to-hold')}}">
                    </div>
                </div>
                <button class="button is-fullwidth is-success is-outlined">{{__('general.bill-form-submit')}}</button>
            </form>
        </div>
        <div class="column is-4">
            <div class="box">
                <h6>{{__('general.budget')}} לחודש <strong>{{$budgetInfo->forMonth}}</strong>: {{number_format($budgetInfo->currentMonthBudget)}}{{__('general.currency')}}.</h6>
                <hr>
                {{__('general.total-paid-this-month')}} <strong>{{$budgetInfo->forMonth}}</strong>: <strong>{{number_format($budgetInfo->totalExpensesThisMonth)}}</strong>{{__('general.currency')}}.
                <hr>
                {{__('general.budget-after-expenses')}}
                @if($budgetInfo->budgetStatus < 0 )
                    <strong style="color: red">{{number_format($budgetInfo->budgetStatus)}}</strong>
                @elseif($budgetInfo->budgetStatus >= 0)
                    <strong style="color: green">{{number_format($budgetInfo->budgetStatus)}}</strong>
                @endif{{__('general.currency')}}.
            </div>
        </div>
    </div>
@endsection

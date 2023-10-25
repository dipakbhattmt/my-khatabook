@extends('layouts.app')

@section('title')
   Balance | הכנסות שלי
@endsection

@section('content')
    <section>
        <div class="columns is-centered m-1">
            <div class="column is-4">

                @if($errors->any())
                    <hr style="margin: 0.2rem;">
                    @include('partials.form-errors')
                    <hr style="margin: 0.2rem;">
                @endif
                <form action="{{route('income.store')}}" method="post">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <input type="number" class="input @error('amount') is-danger @enderror" step="0.01" min="0" name="amount" placeholder="סכום הכנסה">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" name="info" placeholder="מידע נוסף על ההכנסה הזו."></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">תאריך הכנסה</label>
                        <div class="control">
                            <input type="date" id="income_date" name="income_date" class="input @error('income_date') is-danger @enderror" value="{{old('income_date')}}">
                        </div>
                    </div>
                    <button class="button is-fullwidth is-success is-outlined" onclick="this.classList.add('is-loading')">{{__('general.bill-form-submit')}}</button>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="columns is-multiline m-1">
            @forelse($incomeInfo as $income)
                <div class="column is-4">
                    <div class="box">
                        <h6>{{number_format($income->amount)}} {{__('general.currency')}}</h6>
                        <hr>
                        <p>{{$income->info}}</p>
                    </div>
                </div>
            @empty
                 <h1>לא עידכנתם שום הכנסה</h1>
            @endforelse
        </div>
    </section>
@endsection

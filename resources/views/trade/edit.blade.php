@extends('master')
@section('body')
    <div class="container">
        <div class="my-4 flex justify-between">
            <a href="{{ route('index') }}" class="button mx-3" >Visualization data</a>

            <a class="button" href="{{route('trade.index')}}">Trade Home</a>
        </div>
        @if(session()->has('message'))
            <p class="alert alert-lite">{{ session()->get('message') }}</p>
        @endif
        <h3 class="py-2 text-gray-900 border px-3 my-5 text-xl">Create a trade</h3>
        <form action="{{ route('trade.update',$data->id) }}" method="post">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="mb-4 flex flex-col">
                    <label for="dateField">Trade Date</label>

                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" name="date" value="{{ \Carbon\Carbon::parse($data->date)->toDateString() }}" type="date" id="dateField">

                    @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="codeField">Trade Code</label>

                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="trade_code" value="{{ $data->trade_code }}" type="text" id="codeField">
                </div>
                @error('trade_code')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="mb-4 flex flex-col">
                    <label for="highField">High</label>

                    <small>Decimal point must be 2. 100.12 10.1 and no comma(,)</small>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="high" value="{{ $data->high }}" type="text"  id="highField">
                    @error('high')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4 flex flex-col">
                    <label for="lowField">Low</label>

                    <small>Decimal point must be 2. 100.12 10.1 and no comma(,)</small>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="low" value="{{ $data->low }}" type="text" id="lowField">
                    @error('low')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4 flex flex-col">
                    <label for="openField">Open</label>

                    <small>Decimal point must be 2. 100.12 10.1 and no comma(,)</small>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="open" value="{{ $data->open }}" type="text" id="openField">
                    @error('open')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4 flex flex-col">
                    <label for="closeField">Close</label>

                    <small>Decimal point must be 2. 100.12 10.1 and no comma(,)</small>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="close" value="{{ $data->close }}" type="text" id="closeField">
                    @error('close')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4 flex flex-col">
                    <label for="volumeField">Volume</label>

                    <small>Decimal point must be 2. 100.12 10.1 and no comma(,)</small>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  name="volume" value="{{ $data->volume }}" type="text" id="volumeField">
                    @error('volume')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <input class="button" type="submit" value="Save">
            </fieldset>
        </form>
    </div>
@endsection

@section('head')

@endsection


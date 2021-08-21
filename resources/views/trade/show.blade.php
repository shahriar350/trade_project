@extends('master')
@section('body')
    <div class="container">
        <div class="my-4  flex justify-between">
            <a href="{{ route('index') }}" class="button mx-3" >Visualization data</a>
            <a class="button" href="{{route('trade.index')}}">Trade home</a>
            <a class="button" href="{{route('trade.edit',$data->id)}}">Edit</a>
        </div>
        <ul>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Date</span>: {{ $data->date }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Trade_code</span>: {{ $data->trade_code }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">High</span>: {{ $data->high }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Low</span>: {{ $data->low }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Open</span>: {{ $data->open }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Close</span>: {{ $data->close }}</li>
            <li class="border list-none rounded-sm px-3 py-3"><span class="font-bold text-xl">Volume</span>: {{ $data->volume }}</li>
        </ul>

    </div>
@endsection

@section('head')

@endsection


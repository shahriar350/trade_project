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
        <form action="{{ route('trade.store') }}" method="post">
            @csrf
            @method('POST')
            <fieldset>
                @foreach($items as $item)
                    <div class="mb-4 flex flex-col">
                        <label for="{{$item}}Field">{{ ucfirst($item) }}</label>

                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"
                            name="{{$item}}" value="{{ old($item) }}" type="{{ $item == 'date' ? 'date' : 'text' }}"
                            id="{{$item}}Field">

                        @error($item)
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach


                <input class="button" type="submit" value="Save">
            </fieldset>
        </form>
    </div>
@endsection

@section('head')

@endsection


@extends('master')
@section('body')


    <div class="container">

        <p  class="mt-4 flex justify-between">
            <a href="{{ route('index') }}" class="button mx-3" >Visualization data</a>
            <a href="{{ route('trade.create') }}" class="button" >Create new trade</a>
        </p>
        @if(session()->has('message'))
            <p class="alert alert-lite my-3">{{ session()->get('message') }}</p>
        @endif
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trade_code</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">High</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Low</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Open</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Close</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($data as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->trade_code }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->high }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->low }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->open }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->close }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->volume }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-evenly">
                        <a href="{{ route('trade.edit',$item->id) }}" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <a href="{{ route('trade.show',$item->id) }}" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </a>
                        <form onclick="return confirm('Are you sure?')" action="{{ route('trade.destroy',$item->id) }}" method="post" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button style="padding: 0;margin: 0;background:transparent;border: none">
                                <svg color="red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                        <a href="#" title="Delete">

                        </a>
                    </td>
                </tr>
            @endforeach
            <div class="my-3">
                    {{ $data->links() }}
{{--                <a href="{{$data->previousPageUrl()}}" class="button" style="margin: 10px 20px">Previous</a>--}}
{{--                <a href="{{$data->nextPageUrl()}}" class="button" style="margin: 10px 20px">Next</a>--}}
            </div>
            </tbody>
        </table>
    </div>
@endsection

@section('head')

@endsection


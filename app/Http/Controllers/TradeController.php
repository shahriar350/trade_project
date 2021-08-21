<?php

namespace App\Http\Controllers;

use App\Http\Requests\TradeFormRequest;
use App\Models\TradeInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = TradeInfo::paginate(100);
        return view('trade.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $items = [
            'date',
            'trade_code',
            'high',
            'low',
            'open',
            'close',
            'volume',
        ];
        return view('trade.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TradeFormRequest $request)
    {
        TradeInfo::create($request->all());
        Session::flash('message', 'Successfully created');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TradeInfo $tradeInfo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(TradeInfo $tradeInfo, $id)
    {
        $data = TradeInfo::findOrFail($id);
        return view('trade.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TradeInfo $tradeInfo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(TradeInfo $tradeInfo, $id)
    {
        $data = TradeInfo::findOrFail($id);
        return view('trade.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TradeInfo $tradeInfo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(TradeFormRequest $request, $id)
    {
        $data = TradeInfo::findOrFail($id);
        $data->date = $request->get('date');
        $data->trade_code = $request->get('trade_code');
        $data->high = $request->get('high');
        $data->low = $request->get('low');
        $data->open = $request->get('open');
        $data->close = $request->get('close');
        $data->volume = $request->get('volume');
        $data->updated_at = now()->toDate();
        $data->save();
        Session::flash('message', 'Successfully updated');
        return redirect(route('trade.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TradeInfo $tradeInfo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TradeInfo $tradeInfo, $id)
    {
        $data = TradeInfo::findOrFail($id);
        $data->delete();
        Session::flash('message', 'Successfully deleted');
        return back();

    }
}

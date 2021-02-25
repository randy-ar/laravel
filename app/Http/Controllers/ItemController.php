<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\LogController;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        $role = auth()->user()->roles->get(0)->title;
        return view('items.index', [
            'categories' => Category::all(),
            'items' => Category::find($request->category)->items,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        return view('items.create',  [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        abort_if(Gate::denies('user_item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        $attr = $request->all();
        $attr['category_id'] = request('category');
        Item::create($attr);
        $attr['current_quantity'] = request('quantity');
        LogController::store($attr);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        return view('items.show',  [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        return view('items.edit', [
            'categories' => Category::get(),
            'item' => $item,
            'role' => auth()->user()->roles->get(0)->title,
        ]);
    }

    public function takeitem(Item $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        return view('items.takeitem', [
            'categories' => Category::get(),
            'item' => $item,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        abort_if(Gate::denies('user_item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        if(auth()->user()->roles->get(0)->title == "user"){
            dd($request->all());
        }
        $attr = $request->all();
        $attr['quantity'] = abs(intval($item->quantity) - intval(request('quantity')));
        $attr['current_quantity'] = request('quantity');
        $item->update($request->all());
        LogController::store($attr);
        return redirect()->back();
    }

    public function updateUser(Request $request, Item $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        $attr = $item->getAttributes();
        $attr['quantity'] = $attr['quantity'] - request('quantity');
        $item->update($attr);
        $attr['quantity'] = request('quantity');
        $attr['current_quantity'] = $item->quantity;
        LogController::store($attr);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        abort_if(Gate::denies('user_item_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
        $item->delete();
    }
}

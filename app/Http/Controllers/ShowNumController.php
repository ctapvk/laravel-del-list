<?php

namespace App\Http\Controllers;

use App\Models\ShowNum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ShowNumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        //
        return ShowNum::query()->paginate(\request()->get("per_page") ?? 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Artisan::call('db:seed --class=ShowNumSeeder');

        return response("ok");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShowNum  $showNum
     * @return \Illuminate\Http\Response
     */
    public function show(ShowNum $showNum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShowNum  $showNum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowNum $showNum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShowNum  $showNum
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShowNum $num)
    {
        //
        $num->delete();
        return response()->json("ok");
    }
}

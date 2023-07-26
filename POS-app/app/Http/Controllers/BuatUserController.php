<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuatUserRequest;
use App\Http\Requests\UpdateBuatUserRequest;
use App\Models\BuatUser;

class BuatUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        //
    }

    public function api() {
        $books = BuatUser::all();

        return $books;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuatUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BuatUser $buatUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuatUser $buatUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuatUserRequest $request, BuatUser $buatUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuatUser $buatUser)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Junges\InviteCodes\Http\Middlewares\ProtectedByInviteCodeMiddleware;
use Junges\InviteCodes\InviteCodes;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->max == null && $request->fecha == null ){
            $codigo =  \Junges\InviteCodes\Facades\InviteCodes::create()->save();
        }else if($request->max != null && $request->fecha == null){ //tiene limite y no tiene expiracion
            $codigo = \Junges\InviteCodes\Facades\InviteCodes::create()->maxUsages($request->max)->save();
        }else if($request->max == null && $request->fecha != null){ //ilimitado y tiene expiracion
            $codigo = \Junges\InviteCodes\Facades\InviteCodes::create()->expiresAt($request->fecha)->save();
        }else{
            $codigo = \Junges\InviteCodes\Facades\InviteCodes::create()->maxUsages($request->max)->expiresAt($request->fecha)->save();
        }
        return redirect()->route('board',['invite_code'=>$codigo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

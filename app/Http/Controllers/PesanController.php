<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PesanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:PESAN_LIST|PESAN_ADD|PESAN_EDIT|PESAN_DELETE', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pesan::latest()->paginate(20);
        return view('admin.pages.pesan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function store(Request $request)
    {
        $pesan = new Pesan();
        $pesan->name = $request->name;
        $pesan->email = $request->email;
        $pesan->phone = "-";
        $pesan->judul = $request->subject;
        $pesan->pesan = $request->message;
        $pesan->tanggal = date('Y-m-d H:i:s');
        $pesan->save();

        return redirect()->back()->with([
            'message' => 'Pesan berhasil dikirim.',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan): View
    {
        return view('admin.pages.pesan.show', compact('pesan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        //
    }
}

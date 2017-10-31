<?php

namespace App\Http\Controllers;

use App\Note;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes= Note::orderBy('id','desc')->paginate(3);
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notes = Note::all();
        return view('notes.create', compact('notes'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        //validation
        
    $this->validate($request, [
        'title' =>'required',
        'body' => 'required|max:100',

        ]);

    // Save to database

    $note = new Note;

    $note->title = $request->title;
    $note->body = $request->body;


    $note->save();

    //return view

    return redirect()->route('notes.create');


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
        $notes = Note::find($id);
        return view('notes.edit', compact('notes'));
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
                //validation


     $notes=Note::find($id);
        
    $this->validate($request, [
        'title' =>'required',
        'body' => 'required|max:100',

        ]);

    // Save to database


    $notes->title = $request->title;
    $notes->body = $request->body;


    $notes->save();

    //return view

    return redirect()->route('notes.create');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $note = Note::find($id);

        $note->delete();

        return redirect()->route('notes.index');
        //
    }
}

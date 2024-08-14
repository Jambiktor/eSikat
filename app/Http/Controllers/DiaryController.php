<?php

namespace App\Http\Controllers;
use App\Models\Diaries;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
     public function diary() 
    {
        
        $diaries = Diaries::all();
        return view("layout.diary", ['diaries' => $diaries]);
    }

    
    function diaryPost(Request $request)
    {
        $request->validate([
            'notion' => 'required'
        ]);

        $data['notion'] = $request->notion;
        $newDiary = Diaries::create($data);
        if (!$newDiary){
            return redirect(route('layout.landing'))->with("error", "Input error");
        }
        return redirect(route('layout.landing'))->with("success", "Successfully added.");
    }

    public function edit(Diaries $notion){
        return view('layout.edit', ['notion' => $notion]);
    }

    public function update(Diaries $notion, Request $request){
        $request->validate([
            'notion' => 'required'
        ]);

        $data['notion'] = $request->notion;
        $notion->update($data);

        return redirect(route('layout.landing'))->with("success", "Successfully update.");
    }

}
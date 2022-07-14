<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController
{
    public function indexCode()
    {
        $codes = Code::all();
        return view('admin.code.index',compact('codes'));
    }

    public function createCode()
    {
        return view('admin.code.create');
    }

    public function storeCode(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        Code::create([
            'title' => $request->title,
        ]);
        return redirect()->route('admin.indexCode');
    }

    public function editCode($id)
    {
        $code = Code::findOrFail($id);
        return view('admin.code.edit',compact('code'));
    }

    public function updateCode(Request $request,$id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $code = Code::findOrFail($id);
        $code->update([
            'title' => $request->title,
        ]);
        return redirect()->route('admin.indexCode');
    }

    public function deleteCode($id)
    {
        $code = Code::findOrFail($id);
        $code->delete();
        return redirect()->route('admin.indexCode');
    }
}

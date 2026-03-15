<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        //dbに登録する処理
        $contacts = Contact::all();
        $contacts = Contact::Paginate(4);
        return view('admin', compact('contacts'));
    }
    public function destroy($id)
    {
        //dbに登録する処理
        Contact::findOrFail($id)->delete();
        $contacts = Contact::all();
        return redirect('/admin')->with('message', '削除しました');
    }

    public function search(Request $request)
    {
        //dbに登録する処理
        $contacts = Contact::with('category')
            ->CategorySearch($request->category)
            ->GenderSearch($request->gender)
            ->KeywordSearch($request->keyword)
            ->DateSearch($request->date)
            ->paginate(3);
        return view('admin', compact('contacts'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

}

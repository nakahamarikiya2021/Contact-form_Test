<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        return view('admin', compact('contacts'));
    }
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        $contacts = Contact::all();
        return redirect('/admin')->with('message', '削除しました');
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->CategorySearch($request->category)
            ->GenderSearch($request->gender)
            ->KeywordSearch($request->keyword)
            ->DateSearch($request->date)
            ->paginate(7);
        return view('admin', compact('contacts'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

}

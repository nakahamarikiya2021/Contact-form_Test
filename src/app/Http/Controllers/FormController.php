<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
class FormController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        //dbに登録する処理
        $contact = $request->all();
        // 電話番号を結合
        $contact['tel'] = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        Contact::create($contact);
        return view('thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')
            ->withInput($request->all());
    }
    public function verror(Request $request)
    {
        $contact = $request->all();
        return view('confirm', compact('contact'));
    }
}

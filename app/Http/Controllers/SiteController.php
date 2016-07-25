<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class SiteController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
        return view('article', $id);
    }
}
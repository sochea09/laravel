<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about(){

		//only this
		//$name = '<span style="color:red;>Sochea Ty</span>';
		//return view('pages.about')->with('name', $name);

		//{!! $name !!} or <?= $name ?">" => echo in view;

		//return view('pages.about')->with(['first'=>'Sochea','last'=>'Ty']);

		// $data = [];
		// $data['first'] = 'Sochea';
		// $data['last'] = 'Ty';

		// return view('pages.about', $data);

		// $first = 'Sochea';
		// $last = 'Ty';

		// return view('pages.about', compact('first','last'));

		// <h1>About Me: {{ $last }} {{ $first }}</h1> => echo in view;

		$peoples = [];
		//$peoples = ['sochea', 'Dara', 'Papa'];
		return view('pages.about', compact('peoples'));
	}

	public function contact(){
		return view('pages.contact');
	}

}

<?php

class PagesController extends Controller
{
	public function home()
	{
		$talents = TalentType::selectAll();
		require 'views/index.view.php';
	}

	public function about()
	{
		require 'views/about.view.php';

	}

	public function contact()
	{
		require 'views/contact.view.php';

	}
}
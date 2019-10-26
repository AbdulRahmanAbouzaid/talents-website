<?php

class PagesController extends Controller
{
	public function home()
	{
		$talents = TalentType::selectAll();
		$events = Event::getLatest();
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



	public function chat()
	{
		$current_user = $this->getLoggedUser();
		$others = $current_user->recentChatWith();

		$chat_with = isset($_GET['other_id']) ? User::find($_GET['other_id']) : $others[0];
		$chat = Chat::findOrCreate($current_user->id, $chat_with->id);
		$messages = $chat->messages();

		if(isset($_GET['notification_id'])){
			Notification::update($_GET['notification_id'],[
				'is_read' => 1
			]);
		}
		
		require 'views/chat.view.php';

	}

	
}
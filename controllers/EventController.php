<?php



class EventController extends Controller {

    public function delete()
    {
        Event::delete($_GET['id']);             
    }



    public function update()
    {
        Event::update($_POST['event_id'], [
            'content' => $_POST['content'],
            'title' => $_POST['title']
        ]);
    }


}
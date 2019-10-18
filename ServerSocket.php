<?php
// namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ServerSocket implements MessageComponentInterface {

    protected $clients = [];
    protected $activeUsers = [];

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }




    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }





    public function onMessage(ConnectionInterface $from, $msg) {
        $recData =  (json_decode($msg,true));

        if($recData['type'] == 'register_user'){
            $user_id = $recData['user_id'];
            $this->activeUsers[$user_id] = $from->resourceId;
            print_r($this->activeUsers);
        }else if($recData['type'] == 'message'){
            $chat = Chat::findOrCreate($recData['from'], $recData['to']);
            $message = $recData['text'];
            $chat->addMessage($recData);
            $recData['content'] = '/chat?other_id='.$recData['from'];
            $notification_id = Notification::create($recData);
            $content = $message . ';delimeter;' . $recData['from'] . ';delimeter;' . $notification_id;
            foreach($this->clients as $client){
                if($client->resourceId == $this->activeUsers[$recData['to']]){
                    $client->send($content);
                }
            }
            
        }elseif($recData['type'] == 'notification'){
            $message = $recData['text'];
            Notification::create($recData);
            $content = $message . ';from_id=' . $recData['from'];
        }

        
    }




    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }





    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
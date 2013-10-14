<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bucketlist
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Gregory Pike
 * @link		http://ultimate-league.com/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{

    public $default_list = array(
        "On the Field Greatness" => array(
            "Catch a Callahan (preferably with an egregious layout)",
            "Bookends – get the D and the score",
            "Sky someone taller than you",
            "Complete a huge hammer",
            "Stall someone out",
            "Complete a 'Worlds Greatest'",
            "Throw a full field huck for a score",
            "Spike the disc after a contentious play",
            "Catch a Layout D",
            "Catch/Throw a winning score on double game point"
        ),
        "Team Domination" => array(
            "Upset a team who is supposed to be better than you",
            "Win a tournament",
            "Oatbag a team (A 6-0 run)",
            "Play in a game to go to (either regionals or nationals depending on level of play)"
        ),
        "Destinations" => array(
            "Play in a Hat Tournament",
            "Play in another country",
            "Play in an observed game",
            "Go to College Championships",
            "Go to Club Championships",
            "Play in a beach tournament"
        ),
        "Socializing and Arguing" => array(
            "Drink a disc full of beer",
            "Win a party",
            "Master all disc related drinking games",
            "Argue a call until the opponent relents",
            "Heckle so acutely the player responds to you personally"
        ),
        "The 'Kwame Brown' experience of Ultimate" => array(
            "Get spiked on",
            "Drop a pull",
            "Get skied by someone shorter than you",
            "Mess up the force",
            "Injure yourself stupidly",
            "Make a call so bad, you are embarrassed and recant it immediately"
        ),
        "The Devil Wears Patagonia" => array(
            "Wear a sublimated jersey",
            "Buy unnecessary clothing at a tournament",
            "Wear Patagonia shorts",
            "Trade your jersey"
        )
    );

    function default_get()
    {
        $this->response($this->default_list, HTTP_STATUS_OK);
    }

    function index_get()
    {
        $this->response($this->List_model->get_by_user($this->User_model->email), HTTP_STATUS_OK);
    }

	function user_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, HTTP_STATUS_BAD_REQUEST);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
    	$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);
		
    	$user = @$users[$this->get('id')];
    	
        if($user)
        {
            $this->response($user, HTTP_STATUS_OK);
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), HTTP_STATUS_NOT_FOUND);
        }
    }
    
    function user_post()
    {
        //$this->some_model->updateUser( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, HTTP_STATUS_OK);
    }
    
    function user_delete()
    {
    	//$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, HTTP_STATUS_OK);
    }
    
    function users_get()
    {
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);
        
        if($users)
        {
            $this->response($users, HTTP_STATUS_OK);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), HTTP_STATUS_NOT_FOUND);
        }
    }


	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		var_dump($this->put('foo'));
	}
}
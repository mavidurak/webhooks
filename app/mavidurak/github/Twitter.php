<?php namespace Mavidurak\GitHub;

use Config;
use Twitter as TwitterApi;
use App;

class Twitter implements Interfaces\TwitterInterface {

	/**
	 * Template 
	 *
	 * @var String
	 */
	public $template = "%name% just committed to '%repo%' https://github.com/mavidurak/%repo%/commits/master %username%";

	/**
	* Function Name
	*
	* @param  integer
	* @return 
	*/
	public function testTweet($value)
	{
 		$tweet = $this->createFromTemplate($value);
 		$this->updateStatus($tweet);
	}


	/**
	* Update Status
	*
	* @param  String 		$tweet
	* @return null
	*/
	private function updateStatus($tweet)
	{
		if ('alive' === App::environment()) {
	 		TwitterApi::postTweet(array(
	 			'status' => $tweet, 
	 			'format' => 'json'
	 		));		
		}
	}

	/**
	* Create From Template
	*
	* @param  object 		$value
	* @return String
	*/
	private function createFromTemplate($value)
	{
		// Getting datas
 		$text = $this->template;
 		$twitterUserName = $this->getTwitterUsername($value->login);
 		// Replacement
 		$text = str_ireplace('%name%', $value->name, $text);
 		$text = str_ireplace('%repo%', $value->repo_name, $text);
 		return str_ireplace('%username%', $twitterUserName, $text);		
	}

	/**
	* Get Twitter Username
	*
	* @param  String 		$login
	* @return String
	*/
	private function getTwitterUsername($login)
	{
 		$username = Config::get("api.users.{$login}.twitter");
 		if ($username !== null) {
 			$username = '@'.$username;
 		}
		return $username;		
	}

}
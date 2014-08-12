<?php

use Mavidurak\GitHub\Interfaces\TwitterInterface;

class PushController extends BaseController {

	/**
	 * Twitter 
	 * 
	 * @var Object
	 */	
	protected $twitter;

	/**
	* Construct
	*
	* @param 
	* @return Null
	*/
	public function __construct(TwitterInterface $twitter)
	{
		$this->twitter = $twitter;
	}

	/**
	* Post Tweet
	*
	* @return 
	*/
	public function runHook()
	{
		try 
		{
			$payload = $this->getPayload();
			$this->twitter->testTweet((object) array(
				'login' => $payload['head_commit']['committer']['username'],
				'name' => $payload['head_commit']['committer']['name'],
				'repo_name' => $payload['repository']['name']
			));
		} 
		catch (Exception $e) 
		{
			Log::error($e->getMessage());
		}
	}

	/**
	* Get Payload
	*
	* @return json
	*/
	private function getPayload()
	{
		$payload = Input::all();
		if ($payload === null || $this->testAccess($payload)) {
			throw new Exception();
		}
		return $payload;
	}

	/**
	* Test Access
	*
	* @param  object 	$payload
	* @return boolean
	*/
	private function testAccess($payload)
	{
		return !in_array(
				$payload['repository']['name'], 
				Config::get('api.repositories')
			);	
	}

}

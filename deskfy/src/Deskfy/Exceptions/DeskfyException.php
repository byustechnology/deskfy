<?php

namespace Deskfy\Exceptions;
use Exception;

class DeskfyException extends Exception
{

	protected $message;

	public function __construct($message)
	{
		$this->message = $message;
	}

	public function render($request)
	{
		return back()->withErrors($this->message);
	}

}

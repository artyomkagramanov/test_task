<?php
namespace App\Http\Requests;

class ItunesSearchRequest extends AbstractRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'search' => 'required',
			'explicit' => 'in:Yes,No',
			'limit'=>'integer|min:1|max:200'
		];
	}

	public function inputs()
	{
		$result = $this->only('country', 'media', 'explicit', 'limit');
		if(!$this->has('country'))
		{
			$result['country'] = 'US';
		}
		return $result;
	}
}
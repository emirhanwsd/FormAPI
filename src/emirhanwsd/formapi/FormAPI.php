<?php

namespace emirhanwsd\formapi;

use emirhanwsd\formapi\form\SimpleForm;

class FormAPI{

	/**
	 * @param string   $title
	 * @param string   $text
	 * @param array    $buttons
	 * @param \Closure $onSubmit
	 * @param \Closure $onClose
	 *
	 * @return SimpleForm
	 */

	public static function createSimpleForm(string $title, string $text, array $buttons, \Closure $onSubmit, \Closure $onClose) : SimpleForm{
		return new SimpleForm($title, $text, $buttons, $onSubmit, $onClose);
	}
}

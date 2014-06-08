<?php

class Button {

	public static function makeDelete($id, $route, $class, $icon, $text = "")
	{
	    $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class="'.$class.'"><i class="fa '.$icon.'"></i> '.$text.'</a>';
	    $link = URL::route($route, ['id' => $id]);
	    $token = csrf_token();
	    $title = "Delete this item";
	    return sprintf($format, $link, $token, $title);
	}

	public static function makeCommentsDelete($id, $a_id, $route, $class, $icon)
	{
	    $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class="'.$class.'"><i class="fa '.$icon.'"></i></a>';
	    $link = URL::route($route, ['a_id' => $a_id, 'id' => $id]);
	    $token = csrf_token();
	    $title = "Delete this item";
	    return sprintf($format, $link, $token, $title);
	}
	
}
<?php

class Button {

	public static function makeDelete($id)
	{
	    $format = '<a href="%s" data-toggle="tooltip" data-delete="%s" title="%s" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>';
	    $link = URL::route('admin.users.destroy', ['id' => $id]);
	    $token = csrf_token();
	    $title = "Delete the group";
	    return sprintf($format, $link, $token, $title);
	}
	
}
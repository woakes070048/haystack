<?php


class Sortable {

	public static function makeHeader($route_path, $display_name, $field)
	{
		return link_to_route($route_path, ucfirst($display_name), array('sort' =>  $field)). "
			<div class=\"pull-right\">
				<a href=".route($route_path, array('sort' =>  $field, 'order' => 'asc')).">
					<i class=\"fa fa-chevron-up\"></i>
				</a>
				<a href=".route($route_path, array('sort' =>  $field, 'order' => 'desc')).">
					<i class=\"fa fa-chevron-down\"></i>
				</a>	
			</div>";
	}
} 
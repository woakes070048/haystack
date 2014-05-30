<?php

class Dropdown {

	public static function offices($name, $class, $old_input)
	{
		$offices = Office::all();

		$dropdown = "<select name='$name' class='$class'>";
		foreach ($offices as $office) {
			if ( $office->location === $old_input ) {
				$dropdown = $dropdown . "<option selected='selected' value='$office->id'>$office->location</option>";
			} else {
				$dropdown = $dropdown . "<option value='$office->id'>$office->location</option>";				
			}
		}

		return $dropdown . '</select>';
	}

	public static function teams($name, $class, $old_input)
	{
		$teams = Team::all();

		$dropdown = "<select name='$name' class='$class'>";
		foreach ($teams as $team) {
			if ( $team->abbrv === $old_input ) {
				$dropdown = $dropdown . "<option selected='selected' value='$team->id'>$team->abbrv</option>";
			} else {
				$dropdown = $dropdown . "<option value='$team->id'>$team->abbrv</option>";				
			}
		}

		return $dropdown . '</select>';
	}

}
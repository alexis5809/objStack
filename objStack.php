<?php

class objStack {

	public $STACK = NULL;

	/**
	 * @param array $elements An array of objects.
	 * @param boolean $obj_check True by default to check if each value of first paramenter is object.
	 *
	 * @return Returns FALSE if obj_check is TRUE and the passed array is not filled with objects
	 *
	 * Initializig the $this->STACK array.
	 */
	function __construct($elements = NULL, $obj_check = TRUE)
	{
		if (is_null($elements) OR ! count($elements)) return;

		if ($obj_check AND ! $this->check_elements($elements)) return FALSE;

		$this->STACK = $elements;
	}

	/**
	 * @param  array $elements
	 *
	 * @return returns TRUE if all elements are objects and false if not. NULL returned if passed array is empty.
	 *
	 * Checks if passed elements array are all objects
	 */
	private function check_elements($elements)
	{
		if ( ! count($elements)) return NULL;

		foreach ($elements as $element)
		{
			if ( ! is_object($element)) return FALSE;
		}

		return TRUE;
	}

	/**
	 * @param  string $property_name The name of objects variable to find by
	 * @param  string|numeric|boolean $value The value of specified variable
	 *
	 * @return array Array with first found object and the index of it in the $elements array
	 *
	 * Returns first found object with its index in $this->STACK array.
	 */
	public function find_by($property_name, $value)
	{
		foreach ($this->STACK as $index => $element)
		{
			if ($element->$property_name == $value) return ['index' => $index, 'object' => $element];
		}

		return NULL;
	}

	/**
	 * @param  string $property_name The name of objects variable to find by
	 * @param  string|numeric|boolean $value The value of specified variable
	 *
	 * @return array Pairs of objects and the respective indexes from the $stack array
	 *
	 * Returns all found objects with respective index for each from $this->STACK array.
	 */
	public function find_all_by($property_name, $value)
	{
		$result = [];

		foreach ($this->STACK as $index => $element)
		{
			if ($element->$property_name == $value)
			{
				$result[] = ['index' => $index, 'object' => $element];
			}
		}

		return count($result) ? $result : NULL;
	}

	/**
	 * @param  string $property_name The name of objects variable to find max value by
	 * @param  boolean $all_max_values Trigger, whether to return all indexes of max value apearences in $this->STACK array
	 *
	 * @return array Pair(s) of objects and the respective indexes of objects with max found value.
	 *
	 * Returns all found pair(s) of objects and the respective indexes which have the max value among all objects of $this->STACK
	 */
	public function max($property_name, $all_max_values = FALSE)
	{
		$max = ['index' => NULL, 'value' => NULL];

		foreach ($this->STACK as $index => $element)
		{
			if ( ! $all_max_values AND $element->$property_name > $max['value'])
			{
				$max = ['index' => $index, 'value' => $element->$property_name];
			}
			elseif ($all_max_values AND $element->$property_name >= $max['value'])
			{
				if($element->$property_name > $max['value'])
				{
					$max = ['index' => $index, 'value' => $element->$property_name];
				}
				else
				{
					$max['index'] = $max['index'] . ',' . $index;
				}
			}
		}

		return is_null($max['value']) ? NULL : $max;
	}

}

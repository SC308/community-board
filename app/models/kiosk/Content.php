<?php

class Content extends \Eloquent {
	
	protected static function sort($collection, $param)
	{
		$sortByParameter = explode(":", $param);

		$collection->sortBy($sortByParameter[0]);
		
		if(	isset($sortByParameter[1])	)
		{
			if( $sortByParameter[1] == "desc" )
			{
				$collection = $collection->reverse();
			}
			
		}
		return $collection;
	}

	protected static function filter($collection, $param , $tag)
	{
		$c = new \Illuminate\Database\Eloquent\Collection;
		$filters = Content::getFilters($param);
		foreach($filters as $filter)
		{
			foreach($collection as $key=>$item)
			{
				if($item->$tag == $filter || $item->$tag == "all" || in_array($filter, explode(";", $item->$tag) ))
				{
					if(! $c->contains($item->id)){
						$c->add($collection[$key]);
					}
				}

			}
		}
		return($c);

	}
	protected static function getFilters($param)
	{
		$filterRaw = explode(",", $param);

		$filterArray = array();
		foreach($filterRaw as $filter)
		{
			array_push($filterArray, $filter);
		}

		return $filterArray;
	}

	
}
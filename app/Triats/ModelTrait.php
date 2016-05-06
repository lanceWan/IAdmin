<?php
	namespace App\Triats;

	Trait ModelTrait{
		public function scopeById($query, $id){
			return $query->where('id', $id);
		}
	}
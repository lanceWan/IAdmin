<?php
	namespace App\Facades\Project;
	use Illuminate\Support\Facades\Facade;

	class ProjectFacade extends Facade{
		protected static function getFacadeAccessor(){
			return 'ProjectFacade';
		}
	}

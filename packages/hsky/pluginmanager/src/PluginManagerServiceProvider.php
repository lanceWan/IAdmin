<?php
	namespace Hsky\PluginManager;
	use Illuminate\Support\ServiceProvider;

	/*service*/
	use Blade;
	class PluginManagerServiceProvider extends ServiceProvider{

		protected $defer = false;

		public function boot(){
			Blade::directive('plugin', function($arguments){
				list($location, $type) = explode(',',str_replace(["('", "')",' '], '', $arguments));

				return "<?php echo '$location-$type'; ?>";
			});			
	    }
     
	    public function register(){
	    }
	}
<?php 
	
	namespace App\payment;
	use Illuminate\Support\Facades\Facade;

	class paymentfacade extends Facade{

		public static function getFacadeAccessor(){
			return "pay";
		}

	}

?>
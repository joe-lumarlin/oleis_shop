<?php
	class Router{

		private $routes;

		public function __construct(){
			$routesPath = ROOT. '/config/routes.php';
			$this->routes = include($routesPath);
		}

		private function getURI(){
			if(!empty($_SERVER['REQUEST_URI'])){
				return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		public funcion run(){
			$uri = this->getURI();
			foreach($this->routes as $uriPattern => $path){
								if(preg_match("~$uriPattern~", $uri)){
					$internalRoute = preg_replace("~$uriPattern~", $path, $uri) 
					/**
					 * detetmine controller action and parameters
					 */
					$segments = explode('/', $internalRoute);	// розбивае строку на пыдстроки по /
					$controllerName = ucfirst(array_shift($segments)) .'Controller.php';
					$actionName = ucfirst(array_shift($segments));
					$parameters = $segments;

					$controllerFile = ROOT. '/controllers/'. $controllerName;
					if(file_exists($controllerFile)){
						include_once($contollerFile);
					}

					$controllerObject = new $controllerName;

					/**
					 * взивае метод actionName класа controllerName з заданими параметрами
					*/
					$result = call_user_func_array(array($controllerObject,$actionName), $parameters);

					if($result != null){
						break;
					}
				}
			}
		}



	}


?>
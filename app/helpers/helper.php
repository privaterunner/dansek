<?php
	
	use hisorange\BrowserDetect\Parser;

	if(!function_exists('set_session')) {
		function set_session(string $name, array|string|int $data) {
			if(!isset($_SESSION[$name])) {
				$_SESSION[$name] = $data;
			}
		}
	}

	if(!function_exists('get_session')) {
		function get_session(string $name) {
			if(isset($_SESSION[$name])) {
				return $_SESSION[$name];
			}
		}
	}


	if(!function_exists('browser_detect')) {
		function browser_detect() {
			$browser = new Parser(null, null, [
	            'cache' => [
	                'interval' => 86400 // This will override the default configuration.
	            ]
	        ]);

	        $result = $browser->detect();

	        return $result;
		}
	}

	if(!function_exists('set_cookie')) {
		function set_cookie(string $name, string|array|int $value): void {
			if(!isset($_COOKIE[$name])) {
				setcookie($name, $value, time() + (60 * 60 * 2));
			}
		}
	}

	if(!function_exists('get_cookie')) {
		function get_cookie(string $name): string|array|int {
			if(isset($_COOKIE[$name])) {
				return $_COOKIE[$name];
			}
		}
	}

	if(!function_exists('destroy_cookie')) {
		function destroy_cookie(string $name): void {
			if(isset($_COOKIE[$name])) {
				set_cookie($name, "", time() - (60 * 60 * 2));
			}
		}
	}
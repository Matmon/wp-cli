<?php

class Eval_Command extends WP_CLI_Command {

	/**
	 * Execute arbitrary PHP code after loading WordPress.
	 *
	 * @synopsis <php-code>
	 */
	public function __invoke( $args, $assoc_args ) {
		eval( $args[0] );
	}
}

WP_CLI::add_command( 'eval', new Eval_Command );


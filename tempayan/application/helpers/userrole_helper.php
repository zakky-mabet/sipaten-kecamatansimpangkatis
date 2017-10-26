<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if( ! function_exists('is_permission') )
{
	function is_permission($param = '', $action = 'on')
	{
		$ci =& get_instance();

		return true;
	}
}

/* End of file userrole_helper.php */
/* Location: ./application/helpers/userrole_helper.php */
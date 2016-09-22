<?

class fe_util
{
	public static function isV2()
	{
		return true;
		
		/*
		@session_start();
		
		if (isset($_SESSION['layoutV2']) && $_SESSION['layoutV2'] == 1)
		{
			return true;
		} 
		
		if (isset($_REQUEST['layoutV2']))
		{
			$_SESSION['layoutV2'] = 1;
			return true;
		}
		
		return false;
		*/
	}

	public static function isNewLayout()
	{
		
		return true;
		
		/*
		session_start();
		
		if (isset($_SESSION['newlayout']) && $_SESSION['newlayout'] == 1)
		{
			return true;
		} 
		
		if (isset($_REQUEST['newlayout']))
		{
			$_SESSION['newlayout'] = 1;
			return true;
		}
		
		return false;
		 
		*/
		
		
	}		
		
}		
	
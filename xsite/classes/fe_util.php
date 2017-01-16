<?

class fe_util
{
	public static function isV2()
	{
		@session_start();
		
		if(isset($_REQUEST['deactivate-account']))
		{
			$_SESSION['DEACTIVATE-ACCOUNT'] = 1;
			
			if(isset($_SESSION['SEARCHLIST']))
			{
				unset($_SESSION['SEARCHLIST']);
			}
		}
		if(isset($_REQUEST['searchlist']))
		{
			$_SESSION['SEARCHLIST'] = 1;
			
			if(isset($_SESSION['DEACTIVATE-ACCOUNT']))
			{
				unset($_SESSION['DEACTIVATE-ACCOUNT']);
			}		
		}

		
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
	
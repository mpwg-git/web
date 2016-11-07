<?

class fe_mpwgtest
{

	public static function checkIsDeveloper()
	{
		if(libx::isDeveloper())
		{
			return true;
		}
		else
		{
			header("Location: " . xredaktor_niceurl::genUrl(array('p_id' => 2)));
			return false;
		}
	}



}

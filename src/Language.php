<?php namespace Kshabazz;

/**
 * Class Language
 *
 * @package \Kshabazz
 */
class Language
{
	private
		/** @var string INI file. */
		$iniFile,
		/** @var Language. */
		$language,
		/** @var string Path to the language ini files. */
		$path,
		/** @Var array Language strings. */
		$strings,
		/** @var string INI files can be broken down into sub-sets of files to prevent having to load one large file.
		 * Subsets are created by adding a hyphen and word(s) before the ini file extension.
		 * Example: en-US-sweet-talk.ini, where "-sweet-talk" would be the subset. Only the first hyphen after the
		 *          country code is required.
		 */
		$subSet;

	/**
	 * Constructor
	 *
	 * @param $pLanguage
	 * @param $pPath
	 * @param null $pSubSet
	 */
	public function __construct( $pLanguage, $pPath, $pSubSet = NULL )
	{
		$this->language = $pLanguage;
		$this->path = $pPath;
		$this->subSet = $pSubSet;
		$this->loadIniFile();
	}

	/**
	 * Load the ini file.
	 */
	private function loadIniFile()
	{
		$this->iniFile = $this->path . DIRECTORY_SEPARATOR . $this->language;
		// When a subset of the language is requested, load that.
		if ( $this->subSet !== NULL )
		{
			$this->iniFile .= $this->subSet;
		}
		$this->iniFile .= '.ini';
		// Always parse for sections, otherwise just don't use them in your ini.
		$this->strings = \parse_ini_file( $this->iniFile, TRUE );
	}

	/**
	 * Get the language string by key.
	 *
	 * @param string $pKey
	 * @param string $pSection
	 */
	public function keyString( $pKey, $pSection = NULL )
	{
		if ( $pSection !== NULL )
		{
			return $this->strings[ $pSection ][ $pKey ];
		}
		return $this->strings[ $pKey ];
	}
}
?>
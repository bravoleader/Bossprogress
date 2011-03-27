<?php
/**
 * @package bbDkp-installer
 * @author sajaki9@gmail.com
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 * Bossprogress plugin install script
 * 
 */
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
define('IN_INSTALL', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// We only allow a founder install this MOD
if ($user->data['user_type'] != USER_FOUNDER)
{
    if ($user->data['user_id'] == ANONYMOUS)
    {
        login_box('', 'LOGIN');
    }

    trigger_error('NOT_AUTHORISED', E_USER_WARNING);
}

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
    trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

if (!file_exists($phpbb_root_path . 'install/index.' . $phpEx))
{
    trigger_error('Warning! Install directory has wrong name. it must be \'install\'. Please rename it and launch again.', E_USER_WARNING);
}

// The name of the mod to be displayed during installation.
$mod_name = 'Bossprogress Plugin Installer 1.0';

/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'bbdkp_bp_version';

/*
* The language file which will be included when installing
*/
$language_file = 'mods/dkp_admin';

/*
* Run Options
*/
$options = array(
	    'game'     => array('lang' => 'UMIL_CHOOSE', 'type' => 'select', 'function' => 'gameoptions', 'explain' => true),
);

/*
* Optionally we may specify our own logo image to show in the upper corner instead of the default logo.
* $phpbb_root_path will get prepended to the path specified
* Image height should be 50px to prevent cut-off or stretching.
*/
$logo_img = 'install/logo.png'; 

/*
  $user, $config, $db, $table_prefix, $umil, $bbdkp_table_prefix; 
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/

// include required sub installers
$game = request_var('game', '');
switch ($game)
{
		case 'aion':
			include($phpbb_root_path .'install/gamesinstall/install_aion.' . $phpEx);
			break;
    	case 'daoc':
			include($phpbb_root_path .'install/gamesinstall/install_daoc.' . $phpEx);
			break; 
		case 'eq':
			include($phpbb_root_path .'install/gamesinstall/install_eq.' . $phpEx);
			break; 
		case 'eq2':
			include($phpbb_root_path .'install/gamesinstall/install_eq2.' . $phpEx);
			break; 
		case 'FFXI':
			include($phpbb_root_path .'install/gamesinstall/install_ffxi.' . $phpEx);
			break; 
		case 'lotro':
			include($phpbb_root_path .'install/gamesinstall/install_lotro.' . $phpEx);
			break;
		case 'vanguard':
			include($phpbb_root_path .'install/gamesinstall/install_vanguard.' . $phpEx);
			break; 
		case 'warhammer':
			include($phpbb_root_path .'install/gamesinstall/install_warhammer.' . $phpEx);
			break; 
		case 'wow':				    
			include($phpbb_root_path .'install/gamesinstall/install_wow.' . $phpEx);
			break;
		default :
			break; 
}

$versions = array(

    '1.2'    => array(
    	// bbdkp tables (this uses the layout from develop/create_schema_files.php and from phpbb_db_tools)
        'table_add' => array(
		  array($table_prefix . 'bbdkp_zonetable', array(
	              'COLUMNS'            => array(
	                  'id'     	       => array('UINT', NULL, 'auto_increment'), 
	        		  'imagename'      => array('VCHAR_UNI:255', ''),
					  'game'           => array('VCHAR:10', ''),
					  'tier'           => array('VCHAR:30', ''),
					  'completed'      => array('BOOL', 0),
					  'completedate'   => array('TIMESTAMP', 0), 
					  'webid'          => array('VCHAR:255', ''),
	        		  'showzone'	   => array('BOOL', 0),
	        		  'showzoneportal' => array('BOOL', 0), 
	        		  'sequence'	   => array('UINT', 0),
	                ),
	                'PRIMARY_KEY'      => 'id',
	            )),
		          
          array($table_prefix . 'bbdkp_bosstable', array(
	              'COLUMNS'            => array(
	                  'id'     	       => array('UINT', NULL, 'auto_increment'), 
	        		  'imagename'      => array('VCHAR_UNI:255', ''),
	                  'game'           => array('VCHAR:10', ''),
					  'zoneid'         => array('UINT', 0), 
					  'type'           => array('VCHAR:10', ''),
					  'webid'          => array('VCHAR:255', ''),
					  'killed'         => array('BOOL', 0),
					  'killdate'   	   => array('TIMESTAMP', 0), 
					  'counter'        => array('UINT', 0),
	            	  'showboss'	   => array('BOOL', 0), 
	          	),
	                'PRIMARY_KEY'      => 'id',
	          		'KEYS'            => array('zoneid'    => array('INDEX', 'zoneid')),
	            )),        

       ),
       
        // add new parameters
        'config_add' => array(
        
			// show bossprogress block
	        array('bbdkp_portal_bossprogress', 1, true ), 
	        array('bbdkp_bp_blockshowprogressbar', 1, true),

        	//Hide zones with no boss kills
        	array('bbdkp_bp_hidenewzone', 0, true),
        	//Hide never killed bosses?
        	array('bbdkp_bp_hidenonkilled', 0, true),
        	//header image style : sepia, photo, blue
	        array('bbdkp_bp_zonephoto', 0, true),
	        //show zoneprogressionbar
	        array('bbdkp_bp_zoneprogress', 1, true),
	        //bp style : 2 row, 3 row, simple, photo
	        array('bbdkp_bp_zonestyle', 0, true),

	        ),
          
        // add the modules to ACP using the info files, 
		'module_add' => array(
            /*
             * bossprogress menu
             */  
            array('acp', 'ACP_CAT_DKP', 'ACP_DKP_BOSS'),
            array('acp', 'ACP_DKP_BOSS', array(
          		 'module_basename' => 'dkp_bossprogress',
            	 'modes'           => array('bossprogress', 'zoneprogress' ),
         		)),
         		
          ),        
            
        'custom' => array( 
            'gameinstall',
       ), 
    ),
    
		
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

/****************************
 *  
 * global function for rendering pulldown menu
 * 
 */
function gameoptions($selected_value, $key)
{
	global $user;

    /* game pulldown menu rendering */
    $gametypes = array(
        'aion'			=> "Aion: Tower of Eternity",
    	'daoc'     		=> "Dark Age of Camelot",
    	'eq'     		=> "EverQuest",
    	'eq2'     		=> "EverQuest II",
    	'FFXI'     		=> "Final Fantasy XI",
    	'lotro'     	=> "The Lord of the Rings Online",
    	'vanguard'		=> "Vanguard - Saga of Heroes",
    	'warhammer'     => "Warhammer Online", 
    	'wow'     		=> "World of Warcraft", 
    	 
    );
    $default = 'wow'; 
	$pass_char_options = '';
	foreach ($gametypes as $key => $game)
	{
		$selected = ($selected_value == $default) ? ' selected="selected"' : '';
		$pass_char_options .= '<option value="' . $key . '"' . $selected . '>' . $game . '</option>';
	}

	return $pass_char_options;
}

/**************************************
 *  
 * global function for clearing cache
 * 
 */
function bbdkp_caches($action, $version)
{
    global $umil;
    
    $umil->cache_purge();
    $umil->cache_purge('imageset');
    $umil->cache_purge('template');
    $umil->cache_purge('theme');
    $umil->cache_purge('auth');
    
    return 'UMIL_CACHECLEARED';
}

/******************************
 * 
 *  gametable update calls 
 * 
 */
function gameinstall($action, $version)
{
	global $db, $table_prefix, $umil, $phpbb_root_path, $phpEx; 
	$game = request_var('game', '');
	switch ($action)
	{
		case 'install' :
		case 'update' :
			switch ($game)
			{
				case 'aion':
					install_aion();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
					return array('command' => 'UMIL_INSERT_AIONDATA', 'result' => 'SUCCESS');
					break;
				case 'daoc':
					install_daoc();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_DAOCDATA', 'result' => 'SUCCESS');
					break;
				case 'eq':
					install_eq();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_EQDATA', 'result' => 'SUCCESS');
					break;
				case 'eq2':
					install_eq2();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_EQ2DATA', 'result' => 'SUCCESS');
					break;
				case 'FFXI':
					install_ffxi();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_FFXIDATA', 'result' => 'SUCCESS');
					break;
				case 'lotro':
					install_lotro();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_LOTRODATA', 'result' => 'SUCCESS');
					break;
				case 'vanguard':
					install_vanguard();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
		     		return array('command' => 'UMIL_INSERT_VANGUARDDATA', 'result' => 'SUCCESS');
					break;
				case 'wow':
					install_wow();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
					return array('command' => 'UMIL_INSERT_WOWDATA', 'result' => 'SUCCESS');
					break;
				case 'warhammer':
					install_warhammer();
					$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
					return array('command' => 'UMIL_INSERT_WARDATA', 'result' => 'SUCCESS');
					break;
				default :
					break;
			}
			
			 
			break;
	}
					
}

?>
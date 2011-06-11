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
$mod_name = 'Bossprogress Plugin 1.0.3';

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


$versions = array(
    '1.0'    => array(
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
            'Bossprogressupdater',
       ), 
    ),
    
      '1.0.3'    => array(
    
        'custom' => array(          
        	// auto install bossprogress for games installed...
    		'tableupdater103', 
            'gameinstall',
            'Bossprogressupdater',
       ), 
    	
    ),
    
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

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


/**
 * updates bossprogress language table data 1.0 to 1.0.3
 * alter primary key of zone and boss table
 *
 */
function tableupdater103($action, $version)
{
	global $db, $table_prefix, $user;
	switch ($action)
	{
		// only run when upgrading
		case 'update' :
		case 'install' :			
			switch ($version)
			{
				    // only run when upgrading to 1.0.3, 
					case '1.0.3':
						
						// bosses 
						
						// remove autincrement
						$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_bosstable' . " MODIFY id INT NOT NULL";
						$db->sql_query($sql);
						
						// drop pk on bosstable
						$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_bosstable' . " DROP PRIMARY KEY";
						$db->sql_query($sql);
	
						// make new pk 
						$sql= "ALTER TABLE " . $table_prefix . 'bbdkp_bosstable' . "  ADD PRIMARY KEY (game, id)";
						$db->sql_query($sql);
						
						// zones 
						
						// remove autincrement
						$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_zonetable' . " MODIFY id INT NOT NULL";
						$db->sql_query($sql);
						
						// drop pk on zonetable
						$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_zonetable' . " DROP PRIMARY KEY";
						$db->sql_query($sql);
	
						// make new pk 
						$sql= "ALTER TABLE " . $table_prefix . 'bbdkp_zonetable' . "  ADD PRIMARY KEY (game, id)";
						$db->sql_query($sql);	

						
						// this will run once for the past installed game in bp 1.0
						$games = array(
					       'wow'        => $user->lang['WOW'], 
					       'lotro'      => $user->lang['LOTRO'], 
					       'eq'         => $user->lang['EQ'], 
					       'daoc'       => $user->lang['DAOC'], 
					       'vanguard'   => $user->lang['VANGUARD'],
					       'eq2'        => $user->lang['EQ2'],
					       'warhammer'  => $user->lang['WARHAMMER'],
					       'aion'       => $user->lang['AION'],
					       'FFXI'       => $user->lang['FFXI'],
					    );
					    
						foreach($games as $gameid => $gamename)
						{
						    $sql = "select count(sequence) as installcheck from " . $table_prefix . "bbdkp_zonetable where game = '". $gameid ."'";
							$result = $db->sql_query($sql);
							$installed = ((int) $db->sql_fetchfield('installcheck') > 0) ? true: false;
							$db->sql_freeresult($result);
							if($installed)
							{
								$sql = "update " .  $table_prefix . "bbdkp_language set game_id = " . $gameid . " where attribute in ('boss', 'zone') "; 
								$db->sql_query($sql);
							}
						}
						break;
						return array('command' => 'BOSSPROGRESS_INSTALL_MOD', 'result' => 'SUCCESS');
			}
			break;
			
	}
	
}

/******************************
 * 
 *  gametable update calls 
 * 
 */
function gameinstall($action, $version)
{
	global $db, $table_prefix, $umil, $config, $phpbb_root_path, $user, $phpEx; 
	// include required sub installers
	switch ($action)
	{
		case 'install' :
		case 'update' :
			$games = array(
	         'wow'        => $user->lang['WOW'], 
	         'lotro'      => $user->lang['LOTRO'], 
	         'eq'         => $user->lang['EQ'], 
	         'daoc'       => $user->lang['DAOC'], 
	         'vanguard'   => $user->lang['VANGUARD'],
	         'eq2'        => $user->lang['EQ2'],
	         'warhammer'  => $user->lang['WARHAMMER'],
	         'aion'       => $user->lang['AION'],
	         'FFXI'       => $user->lang['FFXI'],
	     	 'rift'       => $user->lang['RIFT'],
	     	 'swtor'      => $user->lang['SWTOR']
		     );
		     

			foreach($games as $gameid => $gamename)
			{
				if ($config['bbdkp_games_' . $gameid] == 1)
				{
					switch ($gameid)
					{
						case 'aion':
							include($phpbb_root_path .'install/gamesinstall/install_aion.' . $phpEx);
							install_aion($action, $version);
							break;
						case 'daoc':
							include($phpbb_root_path .'install/gamesinstall/install_daoc.' . $phpEx);
							install_daoc($action, $version);
							break;
						case 'eq':
							include($phpbb_root_path .'install/gamesinstall/install_eq.' . $phpEx);
							install_eq($action, $version);
							break;
						case 'eq2':
							include($phpbb_root_path .'install/gamesinstall/install_eq2.' . $phpEx);
							install_eq2($action, $version);
							break;
						case 'FFXI':
							include($phpbb_root_path .'install/gamesinstall/install_ffxi.' . $phpEx);
							install_ffxi($action, $version);
							break;
						case 'lotro':
							include($phpbb_root_path .'install/gamesinstall/install_lotro.' . $phpEx);
							install_lotro($action, $version);
							break;
						case 'vanguard':
							include($phpbb_root_path .'install/gamesinstall/install_vanguard.' . $phpEx);
							install_vanguard($action, $version);
							break;
						case 'wow':
							include($phpbb_root_path .'install/gamesinstall/install_wow.' . $phpEx);
							install_wow($action, $version);
							break;
						case 'warhammer':
							include($phpbb_root_path .'install/gamesinstall/install_warhammer.' . $phpEx);
							install_warhammer($action, $version);
							break;
						case 'rift':
							include($phpbb_root_path .'install/gamesinstall/install_rift.' . $phpEx);
							install_rift($action, $version);
							break;
						case 'swtor':
							include($phpbb_root_path .'install/gamesinstall/install_swtor.' . $phpEx);
							install_swtor($action, $version);
							break;
					}
				}
			}
			
			$db->sql_query ( 'update ' . $table_prefix . 'bbdkp_zonetable  set sequence = id '  );
			
			return array('command' => 'BOSSPROGRESS_INSTALL_MOD', 'result' => 'SUCCESS');
			
			break;
			case 'uninstall' :
				// remove content
				$sql = 'DELETE FROM ' . $table_prefix . "bbdkp_language where attribute in ('boss', 'zone') ";
				$db->sql_query($sql);
				$sql = 'TRUNCATE TABLE ' . $table_prefix . "bbdkp_bosstable";
				$db->sql_query($sql);
				$sql = 'TRUNCATE TABLE ' . $table_prefix . "bbdkp_zonetable ";
				$db->sql_query($sql);
				return array('command' => 'BOSSPROGRESS_UNINSTALL_MOD', 'result' => 'SUCCESS');
				
				
	}		
			
}

function Bossprogressupdater($action, $version)
{
	global $db, $table_prefix, $umil, $phpbb_root_path, $phpEx;
	switch ($action)
	{
		case 'install' :
		case 'update' :

			switch ($version)
			{
			    // only run when upgrading to 1.0.3
				case '1.0.3':
		            $umil->table_row_remove($table_prefix . 'bbdkp_plugins',
		                array('name'  => 'Bossprogress')
		            );
		                        
					$umil->table_row_insert($table_prefix . 'bbdkp_plugins', 	
				    array(
		                array(
		        				'name'  => 'Bossprogress', 
		        				'value'  => '1', 
		        				'version'  => $version, 								
		        				'orginal_copyright'  => 'sz3', 				
		        				'bbdkp_copyright'  => 'bbDKP Team', 
		                    ),
		            ));		
		
		       		return array('command' => 'BOSSPROGRESS_INSTALL_MOD', 'result' => 'SUCCESS');
				break;
			}
			break; 
			
		case 'uninstall' :
			// Run this when uninstalling
            $umil->table_row_remove($table_prefix . 'bbdkp_plugins',
                array('name'  => 'Bossprogress')
            );
            
			return array('command' => 'BOSSPROGRESS_UNINSTALL_MOD', 'result' => 'SUCCESS');
			break;
	
	}
}

?>
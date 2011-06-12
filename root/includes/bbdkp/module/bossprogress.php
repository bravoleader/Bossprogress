<?php
/**
 * Bossprogress bbDKP
 * 
 * @package bbDKP
 * @copyright 2009 bbdkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author sz3
 * @version $Id$
 * 
 */


/**
 * @ignore
 */
if ( !defined('IN_PHPBB') OR !defined('IN_BBDKP') )
{
	exit;
}


/*
 * installed games
 */
$games = array(
    'wow'        => $user->lang['WOW'], 
    'lotro'      => $user->lang['LOTRO'], 
    'eq'         => $user->lang['EQ'], 
    'daoc'       => $user->lang['DAOC'], 
    'vanguard' 	 => $user->lang['VANGUARD'],
    'eq2'        => $user->lang['EQ2'],
    'warhammer'  => $user->lang['WARHAMMER'],
    'aion'       => $user->lang['AION'],
    'FFXI'       => $user->lang['FFXI'],
	'rift'       => $user->lang['RIFT'],
	'swtor'      => $user->lang['SWTOR']
);

$installed_games = array();
foreach($games as $id => $gamename)
{
	if ($config['bbdkp_games_' . $id] == 1)
	{
		$installed_games[$id] = $gamename; 
		$template->assign_block_vars ( 'game_row', array (
			'F_BP' 		=> append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=bossprogress&amp;game_id='.$id),
			'U_BPIMG' 	=> "{$phpbb_root_path}images/bossprogress/{$id}/{$id}.png", 
			'GAME_ID' 	=> $id, 
			'GAME_NAME' => $gamename));
	} 
		
}

$game_id = request_var('game_id', '');

//show chosen game
if (array_key_exists ( $game_id , $installed_games))
{
	displaygame($game_id, $installed_games[$game_id]);
}
else 
{
	//show first game
	foreach($installed_games as $id => $gamename)
	{
		displaygame($id, $gamename);
		break 1;	
	}
}

// Output page
page_header($user->lang['MENU_BOSS']);

// end

/**
 * display selected game progress 
 *
 * @param string $game_id
 * @param string $game_name
 */
function displaygame($game_id, $game_name)
{
	
	global $phpbb_root_path, $phpEx, $config, $template, $db, $user;
	
	// add navigationlinks
	$navlinks_array = array(
	array(
		 'DKPPAGE' => $user->lang['MENU_BOSS'],
		 'U_DKPPAGE' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=bossprogress'),
		),
		
	array(
		 'DKPPAGE' 	  => $game_name ,
		 'U_DKPPAGE'  => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=bossprogress&amp;game_id=' . $game_id))
	);
	
	foreach( $navlinks_array as $name )
	{
		$template->assign_block_vars('dkpnavlinks', array(
		'DKPPAGE' => $name['DKPPAGE'],
		'U_DKPPAGE' => $name['U_DKPPAGE'],
		));
	}
	
	$sql_array = array (
		'SELECT' => 'z.id as zoneid, l.name as zonename, l.name_short as zonename_short, z.completed, z.completedate, z.imagename ', 
		'FROM' => array (
			ZONEBASE 		=> 'z', 
			BB_LANGUAGE 	=> 'l',		
			), 
		'WHERE' => " z.showzone = 1 
					AND l.attribute_id = z.id AND l.attribute='zone' AND l.language= '" . $config['bbdkp_lang'] ."' 
					AND z.game= '" . $game_id . "' and z.game = l.game_id ",
		'ORDER_BY' => 'z.sequence desc ' 
	);
	
	if ($config['bbdkp_bp_hidenewzone'] == '1' )
	{
		$sql_array['WHERE'] .= ' AND z.completed = 1 '; 
	}
	
	$zones = array(); 
	$boss = array();
	$sql = $db->sql_build_query ( 'SELECT', $sql_array );
	$result = $db->sql_query ( $sql );
	$i = 0;
	while ( $row = $db->sql_fetchrow ( $result ) )
	{
		$bpshow = true;
		$zones [$i] = array (
			'zoneid' 		 => $row ['zoneid'], 
			'zonename' 		 => $row ['zonename'], 
			'zonename_short' => $row ['zonename_short'], 
			'completed'      => $row ['completed'], 
			'completedate'   => $row ['completedate'], 
			'zoneimage'      => $row ['imagename'], 
		);
		
		$sql_array = array (
			'SELECT' => 'b1.name as bossname, b.id, b1.name_short as bossname_short, 
						 b.imagename, b.type, b.killed, b.webid, b.killdate, b.counter ', 
			'FROM' => array (
				ZONEBASE 	=> 'z' , 
				BOSSBASE 	=> 'b', 
				BB_LANGUAGE => 'b1'
				), 
			'WHERE' => ' b.zoneid = z.id and b.showboss = 1 and z.id = ' . $row ['zoneid'] . "
					AND b1.attribute_id = b.id AND b1.attribute='boss'
					AND b1.language= '" . $config['bbdkp_lang'] ."' 
					AND z.game= '" . $game_id . "' 
					AND z.game = b.game 
					AND b.game = b1.game_id ",
			'ORDER_BY' => 'z.sequence desc , b.id asc ' 
		);
		
		// skip new bosses?
		if ($config['bbdkp_bp_hidenonkilled'] == 1 )
		{
			$sql_array['WHERE'] .= ' AND b.killed = 1 '; 
		}
	
		$boss = array();
		
		$bosskill=0;
		$j = 0;
		$sql2 = $db->sql_build_query ( 'SELECT', $sql_array );
		$result2 = $db->sql_query ( $sql2 );
		while ( $row2 = $db->sql_fetchrow ( $result2 ) )
		{
			$boss[$j] = array( 
				'bossid' => $row2 ['id'], 
				'bossname' => $row2 ['bossname'], 
				'imagename' => $row2 ['imagename'],
				'bossname_short' => $row2 ['bossname_short'], 
				'killdate' => $row2 ['killdate'],
			    'counter' => $row2['counter'], 
				'killed' => $row2 ['killed'], 
				'url' => sprintf($user->lang[strtoupper($game_id).'_BASEURL'], $row2 ['webid']),
			 ); 
			 
			 if ($row2 ['killed'] == 1)
			 {
				$bosskill++;	 
			 }
			 $j++;
		}
		// array with boss info
		$zones[$i]['bosses'] = (array) $boss;
		// total nr of bosses in zone 
		$zones[$i]['bosscount'] = $j;
		// number of bosskills
		$zones[$i]['bosskills'] = $bosskill; 
		// percentage done
		$zones[$i]['completed'] = ($j>0) ? round($bosskill/$j)*100 : 0;
	 	unset ($boss);
		$i++;
		$db->sql_freeresult ($result2);
	}
	$db->sql_freeresult ($result);	
	
	foreach($zones as $key => $zone)
	{
	
		// set the background / progress zone image
		switch ($config['bbdkp_bp_zonephoto'])
		{
			case 0: //sepia
				$progrimg = $phpbb_root_path. 'images/bossprogress/' . $game_id . '/zones/normal/' . $zone['zoneimage'] . '.jpg';
				$background = $phpbb_root_path. 'images/bossprogress/' . $game_id . '/zones/photo/' . $zone['zoneimage'] . '.jpg';
				break;
			case 1: //blackwhite
				$progrimg = $phpbb_root_path. 'images/bossprogress/' . $game_id . '/zones/normal/' . $zone['zoneimage'] . '.jpg';
				$background = $phpbb_root_path. 'images/bossprogress/' . $game_id . '/zones/sw/' . $zone['zoneimage'] . '.jpg';
				break;
			case 2:
				$progrimg = '';
				$background = $phpbb_root_path. 'images/bossprogress/' . $game_id . '/zones/normal/' . $zone['zoneimage'] . '.jpg';
		}
		
		// show zone stats
		if($config['bbdkp_bp_zoneprogress'] == 1)
		{
		    $zonestats = (( !empty($row['completedate']) ) ? date($config['bbdkp_date_format'], $row['completedate']) : ' ') . ' - ' . 
	        $user->lang ['STATUS'] . ' ' . $zone['bosskills'] . '/' . $zone['bosscount'] . ' (' . $zone['completed'] . '%)'; 
		}
		
		//dump to template
		$template->assign_block_vars('zone', array(
				'ZONEPROGRESSIMG'	=> $progrimg, 
				'ZONEBACKIMG'		=> $background, 
				'ZONECOMPLETE'		=> $zone['completed'],
			    'ZONESTATS'			=> $zonestats,
		));
			
		//process bossinfo
		if ( array_key_exists('bosses', $zone  ))
		{
			foreach($zone['bosses'] as $key => $boss)
			{
	
				if (file_exists ( "{$phpbb_root_path}images/bossprogress/" . $game_id . '/bosses/' . $boss['imagename'].'.gif' )) 
	            {
					if ($boss['killed'] == 0)
					{
						$bossimg="{$phpbb_root_path}images/bossprogress/" . $game_id . '/bosses/' . $boss['imagename'] . '_b.gif';  
					}
	                else
	                {
	                	$bossimg="{$phpbb_root_path}images/bossprogress/" . $game_id . '/bosses/' . $boss['imagename'] . '.gif';  
					}
	            } 
				else 
				{
					$bossimg ="{$phpbb_root_path}images/bossprogress/" . $game_id . "/bosses/turkey.gif"; 
				}
	
				$template->assign_block_vars('zone.boss', array(
					'LASTKILL'	    => (!empty($boss['killdate']) ) ? $user->lang ['LASTKILL'] . date($config['bbdkp_date_format'], $boss['killdate']) : ' ',              
					'BOSSCOUNTSTR'	=> $boss['counter'] > 0 ? ($user->lang ['BOSSKILLCOUNT'] . ' : ' . $boss['counter']) : '' ,  
				    'BOSSCOUNT'		=> max( (int) $boss['killed'], (int) $boss['counter']), 
					'BOSSLINK'		=> $boss['url'],  
				    'BOSSNAME'		=> $boss['bossname'],
				    'BOSSIMG'		=> $bossimg,
				    'BOSSIMGALT'	=> $boss['bossname'], 
				));
			}
			
		}

	}
	// dump gamelist to template
	$template->assign_vars(array(
		'F_BP'     => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=bossprogress'),
		'S_STYLE'  => $config['bbdkp_bp_zonestyle'],
	 	'S_BPSHOW' => true,
	));
	
}

?>
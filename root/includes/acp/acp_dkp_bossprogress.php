<?php
/**
* This class manages Bossprogress 
*  
* @package bbDKP.acp
* @author Sajaki@bbdkp.com 
* @copyright (c) 2009 bbdkp http://code.google.com/p/bbdkp/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* $Id$
**/


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (! defined('EMED_BBDKP')) 
{
	$user->add_lang ( array ('mods/dkp_admin' ));
	trigger_error ( $user->lang['BBDKPDISABLED'] , E_USER_WARNING );
}

class acp_dkp_bossprogress extends bbDKP_Admin
{
	var $u_action;
	
	function main($id, $mode) 
	{
	    global $db, $user, $template, $config, $phpEx, $phpbb_admin_path, $cache, $phpbb_root_path;   
        $user->add_lang(array('mods/dkp_admin','mods/dkp_common' ));   
		
		/*
		 * list installed games
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
			'swtor'      => $user->lang['SWTOR'],
            'eve'        => $user->lang['EVE'],
			'gw2'        => $user->lang['GW2'],            
		);
		
		$installed_games = array();
		foreach($games as $id => $gamename)
		{
			if ($config['bbdkp_games_' . $id] == 1)
			{
				$installed_games[$id] = $gamename; 
			} 
			
		}
		
		$game_id = request_var('displaygame', '');
		
		// dump gamelist to template
		foreach ($installed_games as $id => $gamename)
		{
			$template->assign_block_vars ( 'game_row', array (
				'VALUE' => $id, 
				'SELECTED' => ($id == $game_id) ? ' selected="selected"' : '',
				'OPTION' => $gamename));
		}
		
		if (!array_key_exists ( $game_id , $installed_games))
		{
			//show first game
			foreach($installed_games as $id => $gamename)
			{
				$game_id = $id;
				break 1;	
			}
		}
		
        switch ($mode)
		{
			case 'bossprogress':
				$link = '<br /><a href="'.append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress&amp;displaygame=$game_id") . 
					'"><h3>'.$user->lang['RETURN_DKPINDEX'].'</h3></a>';
				
				$showadd = (isset($_POST['bpadd'])) ? true : false;
				$addnew = (isset($_POST['addnew'])) ? true : false;
				$delete = (isset($_GET['delete'])) ? true : false;
				$edit = (isset($_GET['edit'])) ? true : false;
				$submit = (isset($_POST['bpsave'])) ? true : false;
				
				if ($showadd)
				{
					// load template for adding 
					$s_zonelist_options = '';
					
				    $now = getdate();
					$s_day_options = '<option value="0"	>--</option>';
					for ($i = 1; $i < 32; $i++)
					{
						$selected = ($i == $now['mday']) ? ' selected="selected"' : '';
						$s_day_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
			
					$s_month_options = '<option value="0">--</option>';
					for ($i = 1; $i < 13; $i++)
					{
						$selected = ($i == $now['mon']) ? ' selected="selected"' : '';
						$s_month_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
			
					$s_year_options = '<option value="0">--</option>';
					for ($i = $now['year'] - 10; $i <= $now['year']; $i++)
					{
						$selected = ($i == $now['year']) ? ' selected="selected"' : '';
						$s_year_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
					unset($now);
					
					// list of zones
					$sql_array = array(
				    'SELECT'    => 	' z.id, l.name ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id AND l.attribute='zone' 
									AND l.language= '" . $config['bbdkp_lang'] ."' 
									AND z.game = l.game_id 
									AND z.game= '" . $game_id . "'",
					'ORDER_BY'	=> 'sequence desc, id desc ',
				    );
				    
				    $sql = $db->sql_build_query('SELECT', $sql_array);
                    $result = $db->sql_query($sql);
                    while ( $row = $db->sql_fetchrow($result) )
                    {
						$s_zonelist_options .= '<option value="' . $row['id'] . '"> ' . $row['name'] . '</option>';                    
                    }
					
					$template->assign_vars(array(
						'GAME_ID' 					=> $game_id, 
						'S_KILLDATE_DAY_OPTIONS'	=> $s_day_options,
						'S_KILLDATE_MONTH_OPTIONS'	=> $s_month_options,
						'S_KILLDATE_YEAR_OPTIONS'	=> $s_year_options,
						'S_ZONELIST_OPTIONS'  		=> $s_zonelist_options, 
						'S_ADD'   	=> true,
	                 )
	    			);
				}
				elseif ($addnew)
				{
					// add the new boss
					$game_id = request_var('game_id', '');
					$boss_id = request_var('bossid', 0);
					$bossname = utf8_normalize_nfc(request_var('bossname', '', true));
					$bossname_short = utf8_normalize_nfc(request_var('bossname_short', '', true));
					$boss_image = request_var('boss_image', '');
					$boss_type = request_var('boss_type', '');
					$boss_webid = request_var('boss_webid', '');
					$boss_zone = request_var('boss_zone', 0);
					$boss_completed= request_var('boss_completed', 0);
					$boss_killdate_day= request_var('boss_killdate_day', '');
					$boss_killdate_month= request_var('boss_killdate_month', '');
					$boss_killdate_year= request_var('boss_killdate_year', '');
					$kdate = mktime(0,0,0,$boss_killdate_month,$boss_killdate_day , $boss_killdate_year);
					$boss_show = request_var('boss_show', 0);
					
					$data = array(
						'game'			=> (string) $game_id,
						'imagename'		=> (string) $boss_image,
						'zoneid'		=> (int) $boss_zone,
						'type'			=> (string) $boss_type, 
						'webid'			=> (int) $boss_webid,
						'killed'		=> (int) $boss_completed,
						'killdate'		=> (int) $kdate,
						'showboss'		=> (int) $boss_show	,										
					);

					if ($edit)
					{
						// edit the boss
						$sql = 'UPDATE ' . BOSSBASE . ' set ' . $db->sql_build_array('UPDATE', $data) . ' WHERE id = ' . $boss_id . " AND game = '" . $game_id . "'";
						$db->sql_query($sql);	

						$names = array(
							'name'		=> (string) $bossname,
							'name_short'=> (string) $bossname_short,	
						);
						
						$sql = 'UPDATE ' . BB_LANGUAGE . ' set ' . $db->sql_build_array('UPDATE', $names) . ' WHERE 
							attribute_id = ' . $boss_id . " AND attribute='boss'  AND language= '" . $config['bbdkp_lang'] ."'  AND game_id = '" . $game_id . "'";
						$db->sql_query($sql);							
						
						// if the boss is marked as not killed, unmark the zone as completed
						if( $boss_completed == 0 )
						{
							$sql = 'UPDATE ' . ZONEBASE . ' set completed = 0  WHERE id = ' . $boss_zone . " AND game = '" . $game_id . "'";
							$db->sql_query($sql);	
						}
						
						trigger_error( sprintf( $user->lang['BP_BOSSEDITED'], $bossname, $boss_zone) . $link, E_USER_NOTICE);									
					}
					else 
					{
						// insert 
					
						$sql = ' SELECT max(id) as maxid from ' . BOSSBASE . " where game = '" . $game_id . "'";  
						$result = $db->sql_query($sql);
						$boss_id = (int) $db->sql_fetchfield('maxid') + 1;
						$db->sql_freeresult($result);						
						$data['id'] = $boss_id;  				
						
						$sql = 'INSERT INTO ' . BOSSBASE . ' ' . $db->sql_build_array('INSERT', $data) ;
                        $db->sql_query($sql);					
						
						$names = array(
							'attribute_id'	=>  $boss_id,
							'language'		=>  $config['bbdkp_lang'],
							'attribute'		=>  'boss', 
							'game_id'		=> $game_id, 
							'name'			=> (string) $bossname,
							'name_short'	=> (string) $bossname_short,	
						);
						
						$sql = 'INSERT INTO ' . BB_LANGUAGE . ' ' . $db->sql_build_array('INSERT', $names);
						$db->sql_query($sql);							
						
						// if the new boss is marked as not killed, unmark the zone as completed
						if( $boss_completed == 0 )
						{
							$sql = 'UPDATE ' . ZONEBASE . ' set completed = 0  WHERE id = ' . $boss_zone . " AND game = '" . $game_id . "'";	
							$db->sql_query($sql);	
						}
						
						trigger_error( sprintf( $user->lang['RP_BOSSADDED'], $bossname, $boss_zone) . $link, E_USER_NOTICE);
					}
					
				}
				elseif ($edit)
				{
					// load template for editing

					$id = request_var('id', 0); 
					$s_zonelist_options = '';
					
					$sql = 'SELECT zoneid FROM ' . BOSSBASE . ' WHERE id= ' . $id . " AND game = '" . $game_id. "'";
					$result = $db->sql_query($sql);	
					$zoneid = $db->sql_fetchfield('zoneid', 0 ,$result );	
					$db->sql_freeresult($result);
					
					// list of zones
					$sql_array = array(
				    'SELECT'    => 	' z.id, l.name ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id AND l.attribute='zone' AND l.language= '" . $config['bbdkp_lang'] ."' 
					AND z.game = l.game_id AND z.game= '" . $game_id . "'",
					'ORDER_BY'	=> 'z.sequence desc, z.id desc ',
				    );
				    
					$sql = $db->sql_build_query('SELECT', $sql_array);
                    $resultzones = $db->sql_query($sql);
					while ( $rowzones = $db->sql_fetchrow($resultzones) )
                    {
                    	$selected = ($rowzones['id'] == $zoneid) ? ' selected="selected"' : '';
						$s_zonelist_options .= '<option value="' . $rowzones['id'] . '" '.$selected.'> ' . $rowzones['name'] . '</option>';                    
                    }
                    $db->sql_freeresult($result);

					// get boss  
					$sql_array2 = array(
					    'SELECT'    => 	'b.id, l.name, l.name_short, b.imagename, b.webid, b.killed, b.killdate, b.counter, b.showboss, b.zoneid, b.type ', 
					    'FROM'      => array(
					        BOSSBASE 	=> 'b',
					        BB_LANGUAGE 	=> 'l',
					    	),
						'WHERE'	=> "b.id = l.attribute_id AND l.attribute='boss' AND l.language= '" . $config['bbdkp_lang'] ."' AND b.id = " .  $id . " 
								AND b.game = l.game_id AND b.game = '" . $game_id . "'"
					  );
					
				    $sql = $db->sql_build_query('SELECT', $sql_array2);
					$resultx = $db->sql_query($sql);
                	$now = getdate();
	                while ( $row2 = $db->sql_fetchrow($resultx) )
	                {
						$s_day_options = '<option value="0"	>--</option>';
						$day = ($row2['killdate'] == 0) ? '' : date('d', $row2['killdate']); 
						for ($i = 1; $i < 32; $i++)
						{
							$selected = ($i == $day) ? ' selected="selected"' : '';
							$s_day_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
				
						$month = ($row2['killdate'] == 0) ? '' : date('m', $row2['killdate']);
						$s_month_options = '<option value="0">--</option>';
						for ($i = 1; $i < 13; $i++)
						{
							$selected = ($i == $month) ? ' selected="selected"' : '';
							$s_month_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
				
						$year = ($row2['killdate'] == 0) ? 0 : date('Y', $row2['killdate']);
						$s_year_options = '<option value="0">--</option>';
						for ($i = $now['year'] - 10; $i <= $now['year']; $i++)
						{
							$selected = ($i == $year) ? ' selected="selected"' : '';
							$s_year_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
	                	
	                    $template->assign_vars( array(
	                    	'GAME_ID' 			=> $game_id  ,
		                    'BOSS_ID' 			=> $row2['id']  ,
		                    'BOSS_NAME' 		=> $row2['name']  ,
		                    'BOSS_NAME_SHORT' 	=> $row2['name_short']  ,
		                    'BOSS_IMAGENAME' 	=> $row2['imagename']  ,
	                    	'BOSS_IMAGE_COLOR' 	=> $phpbb_root_path . "images/bossprogress/". $game_id ."/bosses/" . $row2['imagename'] . ".gif",
	                    	'BOSS_IMAGE_BW' 	=> $phpbb_root_path . "images/bossprogress/". $game_id ."/bosses/" . $row2['imagename'] . "_b.gif",
	                    	'BOSS_TYPE' 		=> $row2['type']  ,
		                    'BOSS_WEBID' 		=> $row2['webid']  ,
	                    	'BOSS_ZONEID' 		=> $row2['zoneid']  ,
							'S_ZONELIST_OPTIONS'  		=> $s_zonelist_options, 
	                    
		                    'S_KILLDATE_DAY_OPTIONS'	=> $s_day_options,
							'S_KILLDATE_MONTH_OPTIONS'	=> $s_month_options,
							'S_KILLDATE_YEAR_OPTIONS'	=> $s_year_options,
	                    
		                    'BOSS_KILLED' 	=> ($row2['killed'] == 1) ? ' checked="checked"' : '',
		                    'BOSS_SHOW'   	=> ($row2['showboss'] == 1) ? ' checked="checked"' : '',
	                    
	                    	'BOSS_KILLDATE' => ( !empty($row2['killdate']) ) ? date($config['bbdkp_date_format'], $row2['killdate']) : '&nbsp;',   
		                    'BOSS_DD' => ($row2['killdate'] == 0) ? ' ' : date('d', $row2['killdate'])  ,
	                    	'BOSS_MM' => ($row2['killdate'] == 0) ? ' ' : date('m', $row2['killdate'])  ,
	                    	'BOSS_YY' => ($row2['killdate'] == 0) ? ' ' : date('Y', $row2['killdate'])  ,

	                    	'U_EDIT' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress&amp;edit=1&amp;id={$row2['id']}&amp;displaygame=$game_id")  ,
	                    	'U_DELETE' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress&amp;delete=1&amp;id={$row2['id']}&amp;displaygame=$game_id")  ,  
							'S_ADD'   	=> true,
	                    ));
	                }
	                $db->sql_freeresult($resultx);
					
				}
				elseif ($delete)
				{
					//
					//delete a boss
					//
					$id = request_var('id', ''); 
					if (confirm_box(true))
					{
						$sql = 'DELETE FROM ' . BOSSBASE . ' WHERE id =' . $id . " AND game = '" . $game_id . "'";  
						$db->sql_query($sql);
						
						$sql = 'DELETE FROM ' . BB_LANGUAGE . " WHERE language= '" . $config['bbdkp_lang'] . "' 
								AND game_id = '". $game_id ."' AND attribute = 'boss' AND attribute_id= " . $id;  
						$db->sql_query($sql);
						
						trigger_error($user->lang['RP_BOSSDEL'] . $link, E_USER_NOTICE);
					}
					else
					{
						$s_hidden_fields = build_hidden_fields(array(
							'delete'		=> true,
							'id'			=> $id,
							)
						);
						confirm_box(false, sprintf($user->lang['RP_BOSSDELETCONFIRM'], $id), $s_hidden_fields);
					}
					
				}
				
				elseif ($submit)
				{
					// save update bosslist
					
					set_config ('bbdkp_bp_hidenonkilled', ( isset($_POST['hidenewboss']) ) ? 1 : 0 );
					
					$bossids = request_var('bossid', array(0 => 0 ));
	                $newbossname = utf8_normalize_nfc(request_var('bossname', array( 0 => ''), true));
					$newbossnameshorts = utf8_normalize_nfc(request_var('bossnameshort', array( 0 => ''), true));
					$newbosswebids = request_var('bosswebid', array( 0 => ''));
					
					foreach ($bossids as $key) 
					{
						// incorrect killdate-- no update
						$data= array(
							'webid' => $newbosswebids[$key],
							'killed' => isset ( $_POST ['bosskilled'][$key] ) ? 1 : 0,		
							'showboss' => isset ( $_POST ['bossshow'][$key] ) ? 1 : 0,
						);
						
						// And doing an update  
						$sql = 'UPDATE ' . BOSSBASE . ' SET ' . $db->sql_build_array('UPDATE', $data) . ' WHERE id = '. $key . " AND game = '" . $game_id ."'";
						$db->sql_query($sql);
						
						// updating names											
						$names= array(
							'name' 		 => $newbossname[$key],
							'name_short' => $newbossnameshorts[$key],
						);
						
						$sql = 'UPDATE ' . BB_LANGUAGE . ' set ' . $db->sql_build_array('UPDATE', $names) . ' WHERE attribute_id = ' . $key . 
							" AND attribute='boss' AND game_id = '" . $game_id . "' AND language= '" . $config['bbdkp_lang'] ."'";
						$db->sql_query($sql);	

						// again if the boss is marked as not killed, unmark its zone as completed
						if( ! isset ($_POST ['bosskilled'][$key])  )
						{
							$sql = 'UPDATE ' . ZONEBASE . ' z , ' . BOSSBASE . " b 
									SET z.completed = 0 
									WHERE z.id=b.zoneid 
									AND b.game = z.game and b.game = '". $game_id ."'
									AND b.id = " . $key;	
							$db->sql_query($sql);	
						}
						
					}
					trigger_error( sprintf($user->lang['BP_BPSAVED'] ) . $link, E_USER_NOTICE);
					
					
				}
				else
				{
					// show boss list 
					$sql_array = array(
					    'SELECT'    => 	'z.sequence, z.id, l.name, z.imagename', 
					    'FROM'      => array(
					        ZONEBASE 	=> 'z',
					        BB_LANGUAGE 	=> 'l',
					    	),
						'WHERE'	=> " z.id = l.attribute_id 
									 AND l.attribute='zone' 
									 AND l.language= '" . $config['bbdkp_lang'] ."'
									 AND z.game = l.game_id 
									 AND z.game = '" . $game_id . "'",
						'ORDER_BY'	=> 'z.sequence, z.id desc ',
					    	
					    );
					
					$sql = $db->sql_build_query('SELECT', $sql_array);
					
                    $result = $db->sql_query($sql);
	                //$row = $db->sql_fetchrow($result); //commented because it made the first row disappear
	                while ( $row = $db->sql_fetchrow($result) )
	                {
	                	$zoneid = $row['id'];
	                    $template->assign_block_vars('zone', array(
		                    'ZONE_NAME' 			=> $row['name']  ,
	                    	'ZONE_IMAGENAME' 		=> $row['imagename']  ,
	                    ));
	                    
						$sql_array2 = array(
						    'SELECT'    => 	' b.id, l.name, l.name_short, b.imagename, 
						    b.webid, b.killed, b.killdate, b.counter, b.showboss, b.zoneid  ', 
						    'FROM'      => array(
						        BOSSBASE 	=> 'b',
					            BB_LANGUAGE 	=> 'l',
						    	),
						    'WHERE'		=> "b.game = '". $game_id . "' AND b.game = l.game_id 
						    				AND b.zoneid = '" . $zoneid . "' 
						    				AND b.id = l.attribute_id AND l.attribute='boss' 
						    				AND l.language= '" . $config['bbdkp_lang'] ."' ",
							'ORDER_BY'	=> 'b.zoneid, b.id ASC ',
						    );
    
						$sql = $db->sql_build_query('SELECT', $sql_array2);

                        $resultx = $db->sql_query($sql);
	                	$now = getdate();
		                while ( $row2 = $db->sql_fetchrow($resultx) )
		                {
							$s_day_options = '<option value="0"	>--</option>';
							$day = ($row2['killdate'] == 0) ? '' : date('d', $row2['killdate']); 
							for ($i = 1; $i < 32; $i++)
							{
								$selected = ($i == $day) ? ' selected="selected"' : '';
								$s_day_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
							}
					
							$month = ($row2['killdate'] == 0) ? '' : date('m', $row2['killdate']);
							$s_month_options = '<option value="0">--</option>';
							for ($i = 1; $i < 13; $i++)
							{
								$selected = ($i == $month) ? ' selected="selected"' : '';
								$s_month_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
							}
					
							$year = ($row2['killdate'] == 0) ? 0 : date('Y', $row2['killdate']);
							$s_year_options = '<option value="0">--</option>';
							for ($i = $now['year'] - 10; $i <= $now['year']; $i++)
							{
								$selected = ($i == $year) ? ' selected="selected"' : '';
								$s_year_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
							}
		                	
		                    $template->assign_block_vars('zone.boss', array(
			                    'BOSS_ID' 			=> $row2['id']  ,
			                    'BOSS_NAME' 		=> $row2['name']  ,
			                    'BOSS_NAME_SHORT' 	=> $row2['name_short']  ,
			                    'BOSS_IMAGENAME' 	=> $row2['imagename']  ,
		                    	'GAME_ID'			=> $game_id, 				
			                    'S_KILLDATE_DAY_OPTIONS'	=> $s_day_options,
								'S_KILLDATE_MONTH_OPTIONS'	=> $s_month_options,
								'S_KILLDATE_YEAR_OPTIONS'	=> $s_year_options,
		                        'GAME_ID'                   => $game_id,
			                    'BOSS_WEBID' 		=> $row2['webid']  ,
			                    'BOSS_KILLED' 	=> ($row2['killed'] == 1) ? ' checked="checked"' : '',
		                    	'BOSS_KILLDATE' => ( !empty($row2['killdate']) ) ? date($config['bbdkp_date_format'], $row2['killdate']) : '&nbsp;',   
			                    'BOSS_DD' => ($row2['killdate'] == 0) ? ' ' : date('d', $row2['killdate'])  ,
		                    	'BOSS_MM' => ($row2['killdate'] == 0) ? ' ' : date('m', $row2['killdate'])  ,
		                    	'BOSS_YY' => ($row2['killdate'] == 0) ? ' ' : date('Y', $row2['killdate'])  ,
			                    'BOSS_SHOW'   	=> ($row2['showboss'] == 1) ? ' checked="checked"' : '',
		                    	'U_EDIT' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress&amp;edit=1&amp;id={$row2['id']}&amp;displaygame=$game_id")  ,
		                    	'U_DELETE' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress&amp;delete=1&amp;id={$row2['id']}&amp;displaygame=$game_id")  ,  
		                    ));
		                }
		                $db->sql_freeresult($resultx);
	                }
	                $db->sql_freeresult($result);
	                $arrvals = array (
						'F_CONFIG' 			 => append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=bossprogress"),
						'BP_HIDENONKIBOSS' 	 => ($config['bbdkp_bp_hidenonkilled'] == 1) ? ' checked="checked"' : '',
					);
					
					$template->assign_vars($arrvals);
				
				
				}
                
				$this->page_title =  $user->lang['RP_BOSS'];
    			$this->tpl_name = 'dkp/acp_'. $mode;
				break;	
		
			case 'zoneprogress':
					
				// page layout
				$link = '<br /><a href="'.append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress&amp;displaygame=$game_id") . 
					'"><h3>'.$user->lang['RETURN_DKPINDEX'].'</h3></a>';
				$submitlist = (isset($_POST['bpsave'])) ? true : false;
				$edit = (isset($_GET['edit'])) ? true : false;
				$delete = (isset($_GET['delete'])) ? true : false;
				$showadd = (isset($_POST['bpadd'])) ? true : false;
				$submitzone = (isset($_POST['addnew'])) ? true : false;
				$move_up = (isset($_GET['move_up'])) ? true : false;
				$move_down = (isset($_GET['move_down'])) ? true : false;  

				// user pressed the arrows
				if ($move_down or $move_up)
				{
				    //$game_id = request_var ("game_id","");
					$sql = 'SELECT sequence FROM ' . ZONEBASE . ' where id =  ' . request_var('id', 0) . " AND game = '" . $game_id ."'"; 
					$result = $db->sql_query($sql);
					$current_sequence = (int) $db->sql_fetchfield('sequence', 0, $result);
					$db->sql_freeresult($result);
	
					if ($move_down)
					{
						$new_sequence = $current_sequence - 1; 
					}
					else 
					{
						$new_sequence = $current_sequence + 1;
					}
	
					// find current id with new sequence and move that one notch, if any
					$sql = 'UPDATE  ' . ZONEBASE . ' SET sequence = ' . $current_sequence . ' WHERE sequence = ' . $new_sequence . " AND game = '" . $game_id ."'";
					$db->sql_query($sql);
					
					// now increase old sequence
					$sql = 'UPDATE  ' . ZONEBASE . ' set sequence = ' . $new_sequence . ' where id = ' . request_var('id', 0)  . " AND game = '" . $game_id ."'"; 
					$db->sql_query($sql);			

					$cache->destroy('_zoneprogress');
					$cache->destroy('sql', ZONEBASE);
					
				}
				
				// user pressed the add button in the list
				if ($showadd)
				{
					// load template for adding 
					$now = getdate();
					$s_day_options = '<option value="0"	>--</option>';
					for ($i = 1; $i < 32; $i++)
					{
						$selected = ($i == $now['mday']) ? ' selected="selected"' : '';
						$s_day_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
			
					$s_month_options = '<option value="0">--</option>';
					for ($i = 1; $i < 13; $i++)
					{
						$selected = ($i == $now['mon']) ? ' selected="selected"' : '';
						$s_month_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
			
					$s_year_options = '<option value="0">--</option>';
					for ($i = $now['year'] - 10; $i <= $now['year']; $i++)
					{
						$selected = ($i == $now['year']) ? ' selected="selected"' : '';
						$s_year_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
					}
					unset($now);
					
					$s_zonelist_options = '';

					
					// list of zones
					$sql_array = array(
				    'SELECT'    => 	' z.id, l.name ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id 
									AND l.attribute='zone' 
									AND l.language= '" . $config['bbdkp_lang'] ."' 
									AND z.game= '" . $game_id . "'
									AND z.game = l.game_id ",
									
					'ORDER_BY'	=> 'sequence desc, id desc ',
				    );
				    
				    $sql = $db->sql_build_query('SELECT', $sql_array);					
                    $result = $db->sql_query($sql);
                    while ( $row = $db->sql_fetchrow($result) )
                    {
						$s_zonelist_options .= '<option value="' . $row['id'] . '"> ' . $row['name'] . '</option>';                    
                    }
					
					$template->assign_vars(array(
						'S_KILLDATE_DAY_OPTIONS'	=> $s_day_options,
						'S_KILLDATE_MONTH_OPTIONS'	=> $s_month_options,
						'S_KILLDATE_YEAR_OPTIONS'	=> $s_year_options,
						'S_ZONELIST_OPTIONS'		=> $s_zonelist_options,
                        'GAME_ID'                   => $game_id, 
						'S_ADD'   	=> true,
	                 )
	    			);
				}
				
				// user pressed the submit button in the add/edit zone screen 
				elseif ($submitzone)
				{
					// add or update the zone
					$zonename = utf8_normalize_nfc(request_var('zonename', '', true));
					$zonename_short = utf8_normalize_nfc(request_var('zonename_short', '', true));
					$zone_image = request_var('zone_image', '');
					$zone_completed= request_var('zone_completed', 0);
					$zone_killdate_day= request_var('zone_killdate_day', '');
					$zone_killdate_month= request_var('zone_killdate_month', '');
					$zone_killdate_year= request_var('zone_killdate_year', '');
					$kdate = mktime(0,0,0,$zone_killdate_month,$zone_killdate_day,$zone_killdate_year);
					$zone_webid = request_var('zone_webid', '');
					$zone_show = request_var('showzone', 0);
					$zone_showportal = request_var('showzoneportal', 0); 
					$zonesequence = request_var('zonesequence', 0);
					$game_id = request_var ("game_id","");
					$data = array( 
						'imagename'		=> (string) $zone_image,
						'game'			=> (string) $game_id,
						'tier'			=> ' ',						 
						'completed'		=> (int) $zone_completed,
						'completedate'	=> (int) $kdate,
						'webid'			=> (int) $zone_webid,
						'showzone'		=> (int) $zone_show	,
						'showzoneportal' => (int) $zone_showportal, 
						'sequence'		=> (int) $zonesequence	,	
						);

										
					// if this screen was the result of a $get, we will have an id 
					if($edit)
					{
						// update the zone
						$id = request_var('id', 0);
						$sql = 'UPDATE ' . ZONEBASE . ' set ' . $db->sql_build_array('UPDATE', $data) . ' WHERE id = ' . $id . " AND game = '" . $game_id ."'";
						$db->sql_query($sql);		
						
						$names = array( 
							'name'		=> (string) $zonename,
							'name_short'=> (string) $zonename_short,
						);
						
						$sql = 'UPDATE ' . BB_LANGUAGE . ' 
								SET ' . $db->sql_build_array('UPDATE', $names) . ' 
								WHERE attribute_id = ' . $id . " 
								AND attribute='zone'  
								AND game_id = '". $game_id ."' 
								AND language= '" . $config['bbdkp_lang'] ."'";
						$db->sql_query($sql);	
						
						// if the zone is marked complete, also mark all bosses as killed
						if($zone_completed == 1 )
						{
							$sql = 'UPDATE ' . BOSSBASE . ' set killed = 1  WHERE zoneid = ' . $id . " AND game = '" . $game_id  . "'";	
							$db->sql_query($sql);	
						}
						
						trigger_error( sprintf( $user->lang['RP_ZONEUPDATED'], $zonename) . $link, E_USER_NOTICE);
						
					}
					// or else it is a new zone
					else 
					{
						// get biggest id 
						$sql = ' SELECT max(id) as maxid from ' . ZONEBASE . " where game = '" . $game_id . "'";  
						$result = $db->sql_query($sql);
						$id = (int) $db->sql_fetchfield('maxid') + 1;
						$db->sql_freeresult($result);						
						$data['id'] = $id;  		
						
						$sql = 'INSERT INTO ' . ZONEBASE . ' ' . $db->sql_build_array('INSERT', $data) ;
						$db->sql_query($sql);					
						
						$names = array(
							'attribute_id'	=> $id,
							'language'		=> $config['bbdkp_lang'],
							'attribute'		=> 'zone', 
							'game_id'		=> $game_id, 
							'name'			=> (string) $zonename,
							'name_short'	=> (string) $zonename_short,	
						);
						
						$sql = 'INSERT INTO ' . BB_LANGUAGE . ' ' . $db->sql_build_array('INSERT', $names);
						$db->sql_query($sql);							
						
						trigger_error( sprintf( $user->lang['RP_ZONEADDED'], $zonename) . $link, E_USER_NOTICE);
						
					}
											
				}
				
				// user pressed the edit wheel 
				elseif ($edit)
				{
					$s_zonelist_options = '';
                    $id = request_var('id', 0);

                    // dropdown list
					$sql_array = array(
				    'SELECT'    => 	' z.id, l.name ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id AND l.attribute='zone' AND 
						l.language= '" . $config['bbdkp_lang'] ."' AND z.game = l.game_id AND z.game= '" . $game_id . "'",
					'ORDER_BY'	=> 'sequence desc, id desc ',
				    );
				    
				    $sql = $db->sql_build_query('SELECT', $sql_array);		
                   	$result = $db->sql_query($sql);
                    while ( $rowzones = $db->sql_fetchrow($result))
                    {
	                   	$selected = ($rowzones['id'] == $id) ? ' selected="selected"' : '';
						$s_zonelist_options .= '<option value="' . $rowzones['id'] . '"'.$selected.'> ' . $rowzones['name'] . '</option>';                    
                    }
                    $db->sql_freeresult($result);
	                    
                     // dropdown list
					$sql_array = array(
				    'SELECT'    => 	' z.id, z.sequence, l.name, l.name_short, z.imagename, z.completed, 
				    				  z.completedate, z.webid, z.showzone , z.showzoneportal ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id 
									AND l.attribute='zone' 
									AND l.language= '" . $config['bbdkp_lang'] ."' 
									AND z.game = l.game_id
									AND z.game= '" . $game_id . "' 
									AND z.id = " . $id, 
				    );
					$sql = $db->sql_build_query('SELECT', $sql_array);
					$result = $db->sql_query($sql);
	                while ( $row = $db->sql_fetchrow($result) )
	                {
                		// build presets for date pulldown
						$now = getdate();
						$s_day_options = '<option value="0"	>--</option>';
						$day = ($row['completedate'] == 0) ? $now['mday'] : date('d', $row['completedate']); 
						for ($i = 1; $i < 32; $i++)
						{
							$selected = ($i == $day) ? ' selected="selected"' : '';
							$s_day_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
				
						$s_month_options = '<option value="0">--</option>';
						$month = ($row['completedate'] == 0) ? $now['mon'] : date('m', $row['completedate']);
						for ($i = 1; $i < 13; $i++)
						{
							$selected = ($i == $month) ? ' selected="selected"' : '';
							$s_month_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
				
						$s_year_options = '<option value="0">--</option>';
						$year = ($row['completedate'] == 0) ? $now['year'] : date('Y', $row['completedate']); 
						for ($i = $now['year'] - 10; $i <= $now['year']; $i++)
						{
							$selected = ($i == $year) ? ' selected="selected"' : '';
							$s_year_options .= "<option value=" . $i . $selected . ">" . $i . "</option>";
						}
						unset($now);
				
	                    $template->assign_vars(array(
		                    'ZONE_ID' 			=> $row['id'],
	                    	'ZONE_SEQUENCE' 	=> $row['sequence'] ,
		                    'ZONE_NAME' 		=> $row['name'] ,
		                    'ZONE_NAME_SHORT' 	=> $row['name_short']  ,
		                    'ZONE_IMAGENAME' 	=> $row['imagename']  ,
	                    	'ZONE_IMAGE_COLOR' 	=> $phpbb_root_path . "images/bossprogress/".$game_id."/zones/normal/" . $row['imagename'] . ".jpg",
	                    	'ZONE_IMAGE_SEPIA' 	=> $phpbb_root_path . "images/bossprogress/".$game_id."/zones/photo/" . $row['imagename'] . ".jpg",
	                    	'ZONE_IMAGE_SW' 	=> $phpbb_root_path . "images/bossprogress/".$game_id."/zones/sw/" . $row['imagename'] . ".jpg",
	                    
		                    'ZONE_WEBID' 		=> $row['webid']  ,
		                    'ZONE_COMPLETED' 	=> ($row['completed'] == 1) ? ' checked="checked"' : '',
		                    'SHOW_ZONE'   		=> ($row['showzone'] == 1) ? ' checked="checked"' : '',
	                        'SHOW_ZONE_PORTAL'  => ($row['showzoneportal'] == 1) ? ' checked="checked"' : '',
	                    
							'S_KILLDATE_DAY_OPTIONS'	=> $s_day_options,
							'S_KILLDATE_MONTH_OPTIONS'	=> $s_month_options,
							'S_KILLDATE_YEAR_OPTIONS'	=> $s_year_options,
							'S_ZONELIST_OPTIONS'		=> $s_zonelist_options, 
							'S_ADD'   	=> true,
	                    	'L_XZONE_IMAGENAME_EXPLAIN'  => sprintf($user->lang['ZONE_IMAGENAME_EXPLAIN'],$game_id), 
	                    ));
	                }
	                $db->sql_freeresult($result);
					
				}
				
				//user pressed submit in the zone list
				elseif ($submitlist)
				{
					// get global config
				  	set_config ('bbdkp_bp_zonephoto',  request_var('headertype', 0), 0); 				  	
				  	set_config ('bbdkp_bp_zonestyle',  request_var('zonestyle', 0));
				  	set_config ('bbdkp_bp_zoneprogress', ( isset($_POST['zoneprogress']) ) ? 1 : 0);
				  	set_config ('bbdkp_bp_hidenewzone',  ( isset($_POST['hidenewzone']) ) ? 1 : 0);
				  	set_config ('bbdkp_bp_blockshowprogressbar',  request_var('blockprogressbar', 0));
					
				  	$sequence = request_var('zonesequence', array( 0 => ''));
					$newzonewebids = request_var('zonewebid', array( 0 => ''));
				  	$zoneids = request_var('zoneid', array( 0 => ''));
					
	                foreach ($zoneids as $key) 
					{
						$data= array(
							'sequence' => $sequence[$key],
							'completed' => isset ( $_POST ['zonecompleted'][$key] ) ? 1 : 0,		
							'showzone' => isset ( $_POST ['showzone'][$key] ) ? 1 : 0,
							'showzoneportal' => isset ( $_POST ['showzoneportal'][$key] ) ? 1 : 0,
						);
						// And doing an update query 
						$sql = 'UPDATE ' . ZONEBASE . ' SET ' . $db->sql_build_array('UPDATE', $data) . ' WHERE id = '. $key . " AND game = '" . $game_id  . "'";
						$db->sql_query($sql);
						
						// also, if the zone is marked complete, also mark all bosses as killed
						if(isset ( $_POST ['zonecompleted'][$key] ))
						{
							$sql = 'UPDATE ' . BOSSBASE . ' set killed = 1  WHERE zoneid = ' . $key . " AND game = '" . $game_id . "'";	
							$db->sql_query($sql);	
						}
						
					}
					trigger_error($user->lang['BP_BPSAVED'] . $link, E_USER_NOTICE);
					
				}
				
				// user pressed the red cross
				if ($delete)
				{
					//
					//delete a zone
					//
                    //echo $game_id;
					$id = request_var('id', 0); 
					if (confirm_box(true))
					{
						$game_id = request_var('game_id_h', '');
						$sql = 'DELETE FROM ' . ZONEBASE . ' WHERE id = ' . $id . " AND game = '" . $game_id . "'";	  
						$db->sql_query($sql);	
						$sql = 'DELETE FROM ' . BOSSBASE . ' WHERE zoneid=' . $id . " AND game = '" . $game_id . "'";	  
						$db->sql_query($sql);
						$sql = 'DELETE FROM ' . BB_LANGUAGE . " WHERE language= '" . $config['bbdkp_lang'] . "' AND attribute = 'zone' 
							AND attribute_id= " . $id . " AND game_id = '" . $game_id . "'";	  
						$db->sql_query($sql);
						
						trigger_error($user->lang['RP_ZONEDEL'] . $link, E_USER_NOTICE);
							
					}
					else
					{
						$s_hidden_fields = build_hidden_fields(array(
							'delete'		=> true,
							'id'		=> $id,
							'game_id_h'	=> $game_id,
							)
						);
						confirm_box(false, sprintf($user->lang['RP_ZONEDELETCONFIRM'], $id), $s_hidden_fields);
					}
				}
				
				// display the list of zones
				
				$bp_styles['0'] = $user->lang['BP_STYLE_BP'];
				$bp_styles['1'] = $user->lang['BP_STYLE_BPS'];
				$bp_styles['2'] = $user->lang['BP_STYLE_RP3R'];
				foreach ($bp_styles as $value => $option) 
				{
					$template->assign_block_vars('style_row', array (
							'VALUE' => $value,
							'SELECTED' => ($config['bbdkp_bp_zonestyle'] == $value) ? ' selected="selected"' : '',
							'OPTION' => $option
						)
					);
				}
				
				$arrvals = array (
					'F_CONFIG' 			 => append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress"),
					'BP_HIDENEWZONE'	 => ($config['bbdkp_bp_hidenewzone'] == 1) ? 'checked="checked"' : '',
					'BP_HIDENONKIBOSS' 	 => ($config['bbdkp_bp_hidenonkilled'] == 1) ? 'checked="checked"' : '',
					'BP_SHOWSB' 		 => ($config['bbdkp_bp_zoneprogress'] == 1) ? 'checked="checked"' : '',
					'HEADER_SEL_SEPIA'   => ($config['bbdkp_bp_zonephoto'] == 0 ) ? 'selected="selected"' : '',
					'HEADER_SEL_BLUE'    => ($config['bbdkp_bp_zonephoto'] == 1 ) ? 'selected="selected"' : '',
					'HEADER_SEL_NONE'    => ($config['bbdkp_bp_zonephoto'] == 2 ) ? 'selected="selected"' : '',
					'BP_BLOCKSHOWPROGRESSBAR' => ($config['bbdkp_bp_blockshowprogressbar'] == 1) ? ' checked="checked"' : '',
				);
				$template->assign_vars($arrvals);
				
				$sql_array = array(
				    'SELECT'    => 	' z.id, z.sequence, l.name, l.name_short, z.imagename, z.completed, z.completedate, z.webid, z.showzone, z.showzoneportal  ', 
				    'FROM'      => array(
							ZONEBASE 		=> 'z',
							BB_LANGUAGE 	=> 'l',
								),
					'WHERE'		=> " z.id = l.attribute_id AND l.attribute='zone' AND l.language= '" . $config['bbdkp_lang'] ."' AND z.game = l.game_id AND z.game = '" .$game_id . "'",
					'ORDER_BY'	=> 'sequence desc, id desc ',
				    );
				    
				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query($sql);
                while ( $row = $db->sql_fetchrow($result) )
                {
                    $template->assign_block_vars('gamezone', array(
	                    'ZONE_ID' 			=> $row['id'],
                    	'ZONE_SEQUENCE' 	=> $row['sequence'] ,
	                    'ZONE_NAME' 		=> $row['name'] ,
	                    'ZONE_NAME_SHORT' 	=> $row['name_short']  ,
	                    'ZONE_IMAGENAME' 	=> $row['imagename']  ,
	                    'ZONE_WEBID' 		=> $row['webid']  ,
	                    'ZONE_COMPLETED' 	=> ($row['completed'] == 1) ? ' checked="checked"' : '',
	                    'ZONE_DATE' 		=> ( !empty($row['completedate']) ) ? date($config['bbdkp_date_format'], $row['completedate']) : 'no date',  
	                    'ZONE_DD' 			=> ($row['completedate'] == 0) ? ' ' : date('d', $row['completedate'])  ,
                    	'ZONE_MM' 			=> ($row['completedate'] == 0) ? ' ' : date('m', $row['completedate'])  ,
                    	'ZONE_YY' 			=> ($row['completedate'] == 0) ? ' ' : date('y', $row['completedate'])  ,
                        'ZONE_URL'			=> sprintf($user->lang[strtoupper($game_id).'_ZONEURL'], $row['webid']),         
	                    'ZONE_SHOW'   		=> ($row['showzone'] == 1) ? ' checked="checked"' : '',
                    	'ZONE_SHOW_PORTAL'  => ($row['showzoneportal'] == 1) ? ' checked="checked"' : '',
                    	'U_EDIT' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress&amp;edit=1&amp;id={$row['id']}&amp;displaygame=$game_id")  ,
                    	'U_DELETE' 		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress&amp;delete=1&amp;id={$row['id']}&amp;displaygame=$game_id")  ,  
						'U_MOVE_UP'		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress&amp;move_up=1&amp;id={$row['id']}&amp;displaygame=$game_id"), 
						'U_MOVE_DOWN'	=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=dkp_bossprogress&amp;mode=zoneprogress&amp;move_down=1&amp;id={$row['id']}&amp;displaygame=$game_id"), 
                    
                    ));
                }
                $db->sql_freeresult($result);

				$this->page_title =  $user->lang['RP_ZONE'];
				$this->tpl_name = 'dkp/acp_zoneprogress';
				break;		
		}
	}
}
?>

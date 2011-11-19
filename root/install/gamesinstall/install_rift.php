<?php
/**
 * bossprogress rift install data
 * @package bbDkp-installer
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 */


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function install_rift()
{
    global $db, $table_prefix, $umil, $user;
    $sql = "select count(sequence) as installcheck from " . $table_prefix . "bbdkp_zonetable where game = 'rift'";
	$result = $db->sql_query($sql);
	$installed = ((int) $db->sql_fetchfield('installcheck') > 0) ? true: false;
	$db->sql_freeresult($result);
	if(!$installed)
	{	
		$sql_ary = array ();
		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'iron_tombs' , 'game' =>  'rift' ,  'tier' =>  '17-21' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0,  'showzoneportal' =>  0  );
		$sql_ary[] = array( 'id' => 2 , 'imagename' =>  'realm_of_the_fae' , 'game' =>  'rift' ,  'tier' =>  '17-21' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 , 'showzoneportal' =>  0  );
		$sql_ary[] = array( 'id' => 3 , 'imagename' =>  'darkening_deeps' , 'game' =>  'rift' ,  'tier' =>  '23-27' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0,  'showzoneportal' =>  0  );
		$sql_ary[] = array( 'id' => 4 , 'imagename' =>  'deepstrike_mines' , 'game' =>  'rift' ,  'tier' =>  '23-27' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 5 , 'imagename' =>  'foul_cascade' , 'game' =>  'rift' ,  'tier' =>  '29-32' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 6 , 'imagename' =>  'king‘s_breach' , 'game' =>  'rift' ,  'tier' =>  '34-35' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 7 , 'imagename' =>  'abyssal_precipice' , 'game' =>  'rift' ,  'tier' =>  '50' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 8 , 'imagename' =>  'charmers_caldera' , 'game' =>  'rift' ,  'tier' =>  '50' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 9 , 'imagename' =>  'runic_descent' , 'game' =>  'rift' ,  'tier' =>  '50' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 10 , 'imagename' =>  'the_fall_of_lantern_hook' , 'game' =>  'rift' ,  'tier' =>  '50' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 11 , 'imagename' =>  'battle_for_lord_scion' , 'game' =>  'rift' ,  'tier' =>  'PVP' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 12 , 'imagename' =>  'black_garden' , 'game' =>  'rift' ,  'tier' =>  'PVP' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 ) ;
		$sql_ary[] = array( 'id' => 13 , 'imagename' =>  'the_codex' , 'game' =>  'rift' ,  'tier' =>  'PVP' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 14 , 'imagename' =>  'whitefall_steppes' , 'game' =>  'rift' ,  'tier' =>  'PVP' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  0 ,  'showzoneportal' =>  0 );
		$sql_ary[] = array( 'id' => 15 , 'imagename' =>  'greenscale' , 'game' =>  'rift' ,  'tier' =>  'R50' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1,  'showzoneportal' =>  1  );
		$db->sql_multi_insert ( $table_prefix . 'bbdkp_zonetable', $sql_ary );
		unset ( $sql_ary );
		
		
		
		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'kalerandrenos' , 'game' =>  'rift' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '2002084108' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 2 ,  'imagename' =>  'majolic' , 'game' =>  'rift' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '968924475' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 3 ,  'imagename' =>  'calyx' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '809741395' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 4 ,  'imagename' =>  'icetalon' , 'game' =>  'rift' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '2027239406' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 5 ,  'imagename' =>  'renthar' , 'game' =>  'rift' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '1757868777' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 6 ,  'imagename' =>  'calyx_the_ancient' , 'game' =>  'rift' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '2125431321' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 7 ,  'imagename' =>  'smouldaron' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '1097370914' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 8 ,  'imagename' =>  'cyclorax' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '126924193' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 9 ,  'imagename' =>  'ryka_dharvos' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '897207434' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 10 ,  'imagename' =>  'caelia_the_stormtouched' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '1917114559' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 11 ,  'imagename' =>  'gronik' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '1252747861' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 12 ,  'imagename' =>  'jultharin' , 'game' =>  'rift' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '1407622753' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 13 ,  'imagename' =>  'alchemist_braxtepel' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '1372350311' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 14 ,  'imagename' =>  'michael_bringhurst' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '1407785384' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 15 ,  'imagename' =>  'tegenar_deepfang' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '1989580161' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 17 ,  'imagename' =>  'nuggo' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '1139181015' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 18 ,  'imagename' =>  'gerbik' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '315801553' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 19 ,  'imagename' =>  'swedge' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '964064054' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 20 ,  'imagename' =>  'glubmuk' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '218016436' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 21 ,  'imagename' =>  'scarn' , 'game' =>  'rift' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '68120758' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 22 ,  'imagename' =>  'overseer_markus' , 'game' =>  'rift' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '108363882' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 23 ,  'imagename' =>  'gregori_krezlav' , 'game' =>  'rift' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '100100828' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 24 ,  'imagename' =>  'gatekeeper_kaleida' , 'game' =>  'rift' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '60787434' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 25 ,  'imagename' =>  'countess_surin_skenobar' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '671757653' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 26 ,  'imagename' =>  'matron_verosa' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '382035895' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 27 ,  'imagename' =>  'krasimir_barionov' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '316685106' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 28 ,  'imagename' =>  'queen_vallnara' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '848063553' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 29 ,  'imagename' =>  'sparkwing' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '13488536' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 30 ,  'imagename' =>  'tephra_lord_maficros' , 'game' =>  'rift' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '1133053639' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 31 ,  'imagename' =>  'caor_ashstone' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '1677630169' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 32 ,  'imagename' =>  'larric' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '1233533612' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 33 ,  'imagename' =>  'derribec' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '1734966840' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 34 ,  'imagename' =>  'humbart' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '1626956298' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 35 ,  'imagename' =>  'ragnoth_the_despoiler' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '363721464' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 36 ,  'imagename' =>  'bonelord_fetlorn' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '800167632' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 37 ,  'imagename' =>  'broodmother_venoxa' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '920690930' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 38 ,  'imagename' =>  'totek_the_ancient' , 'game' =>  'rift' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '1115880862' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 39 ,  'imagename' =>  'hunter_suleng' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '358856325' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 40 ,  'imagename' =>  'ravalos' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '1784206076' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 41 ,  'imagename' =>  'flesheater_autoch' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '1940822011' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 42 ,  'imagename' =>  'soulflayer_mondrach' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '927848728' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 43 ,  'imagename' =>  'shadehorror_phantasm' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '1003077704' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 44 ,  'imagename' =>  'konstantin' , 'game' =>  'rift' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '1414840095' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 45 ,  'imagename' =>  'trickster_maelow' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '546559448' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 46 ,  'imagename' =>  'luggodhan' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '2057256642' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 47 ,  'imagename' =>  'battlemaster_atrophinius' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '1912649746' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 48 ,  'imagename' =>  'fae_lord_twyl' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '674900714' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 49 ,  'imagename' =>  'chillblains_winterfrost' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '309262572' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 50 ,  'imagename' =>  'grand_apiarist_orban' , 'game' =>  'rift' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '1409755847' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 51 ,  'imagename' =>  'rictus' , 'game' =>  'rift' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '114237770' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 52 ,  'imagename' =>  'wormwood' , 'game' =>  'rift' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '2108146742' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 53 ,  'imagename' =>  'warden_falidor' , 'game' =>  'rift' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '1994832155' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 54 ,  'imagename' =>  'atrophinius_the_fallen' , 'game' =>  'rift' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '1089941977' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 55 ,  'imagename' =>  'eliam_the_corrupted' , 'game' =>  'rift' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '291163960' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 56 ,  'imagename' =>  'rorf' , 'game' =>  'rift' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '1026178555' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 57 ,  'imagename' =>  'pyromaster_cortilnald' , 'game' =>  'rift' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '335343388' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 58 ,  'imagename' =>  'emberlord_ereetu' , 'game' =>  'rift' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '2066556144' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 59 ,  'imagename' =>  'flamebringer_druhl' , 'game' =>  'rift' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '1958579410' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 60 ,  'imagename' =>  'oludare_the_firehoof' , 'game' =>  'rift' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '380231025' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  0     );
		$sql_ary[] = array('id' => 61 ,  'imagename' =>  'duke_letareus' , 'game' =>  'rift' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '1341657289' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 62 ,  'imagename' =>  'infiltrator_johlen' , 'game' =>  'rift' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '556271046' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 63 ,  'imagename' =>  'oracle_aleria' , 'game' =>  'rift' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '51622857' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 64 ,  'imagename' =>  'prince_hylas' , 'game' =>  'rift' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '2068127755' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 65 ,  'imagename' =>  'lord_greenscale' , 'game' =>  'rift' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '1665052536' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );		
		$db->sql_multi_insert ( $table_prefix . 'bbdkp_bosstable', $sql_ary );
		unset ( $sql_ary );
		
		//language table
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '1', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Iron Tombs' ,  'name_short' =>  'Iron Tombs' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '2', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Realm of the Fae' ,  'name_short' =>  'Realm of the Fae' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '3', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Darkening Deeps' ,  'name_short' =>  'Darkening Deeps' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '4', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Deepstrike Mines' ,  'name_short' =>  'Deepstrike Mines' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '5', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Foul Cascade' ,  'name_short' =>  'Foul Cascade' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '6', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'King‘s Breach' ,  'name_short' =>  'King‘s Breach' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '7', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Abyssal Precipice' ,  'name_short' =>  'Abyssal Precipice' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '8', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Charmer‘s Caldera' ,  'name_short' =>  'Charmer‘s Caldera' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '9', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Runic Descent' ,  'name_short' =>  'Runic Descent' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '10', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Fall of Lantern Hook' ,  'name_short' =>  'The Fall of Lantern Hook' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '11', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Battle for Lord Scion' ,  'name_short' =>  'Battle for Lord Scion' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '12', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Black Garden' ,  'name_short' =>  'Black Garden' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '13', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Codex' ,  'name_short' =>  'The Codex' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '14', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Whitefall Steppes' ,  'name_short' =>  'Whitefall Steppes' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '15', 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Greenscale‘s Blight' ,  'name_short' =>  'Greenscale‘s Blight' );
		
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '1', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kaler Andrenos' ,  'name_short' =>  'Kaler Andrenos' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '2', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Majolic the Bloodwalker' ,  'name_short' =>  'Majolic the Bloodwalker' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '3', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Calyx the Ancient' ,  'name_short' =>  'Calyx the Ancient' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '4', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Icetalon' ,  'name_short' =>  'Icetalon' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '5', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Renthar' ,  'name_short' =>  'Renthar' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '6', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Calyx the Ancient' ,  'name_short' =>  'Calyx the Ancient' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '7', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Smouldaron' ,  'name_short' =>  'Smouldaron' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '8', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cyclorax' ,  'name_short' =>  'Cyclorax' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '9', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ryka Dharvos' ,  'name_short' =>  'Ryka Dharvos' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '10', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Caelia the Stormtouched' ,  'name_short' =>  'Caelia the Stormtouched' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '11', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gronik' ,  'name_short' =>  'Gronik' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '12', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Jultharin' ,  'name_short' =>  'Jultharin' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '13', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Alchemist Braxtepel' ,  'name_short' =>  'Alchemist Braxtepel' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '14', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Michael Bringhurst' ,  'name_short' =>  'Michael Bringhurst' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '15', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tegenar Deepfang' ,  'name_short' =>  'Tegenar Deepfang' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '16', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Council Geldo' ,  'name_short' =>  'Council Geldo' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '17', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nuggo' ,  'name_short' =>  'Nuggo' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '18', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gerbik' ,  'name_short' =>  'Gerbik' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '19', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Swedge' ,  'name_short' =>  'Swedge' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '20', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Glubmuk' ,  'name_short' =>  'Glubmuk' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '21', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Scarn' ,  'name_short' =>  'Scarn' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '22', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Overseer Markus' ,  'name_short' =>  'Overseer Markus' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '23', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gregori Krezlav' ,  'name_short' =>  'Bonehew the Thunderer' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '24', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gatekeeper Kaleida' ,  'name_short' =>  'Gatekeeper Kaleida' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '25', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Countess Surin Skenobar' ,  'name_short' =>  'Countess Surin Skenobar' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '26', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Matron Verosa' ,  'name_short' =>  'Matron Verosa' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '27', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Krasimir Barionov' ,  'name_short' =>  'Krasimir Barionov' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '28', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Queen Vallnara' ,  'name_short' =>  'Queen Vallnara' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '29', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sparkwing' ,  'name_short' =>  'Sparkwing' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '30', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tephra Lord Maficros' ,  'name_short' =>  'Tephra Lord Maficros' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '31', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Caor Ashstone' ,  'name_short' =>  'Caor Ashstone' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '32', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Larric' ,  'name_short' =>  'Larric' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '33', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Derribec' ,  'name_short' =>  'Derribec' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '34', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Humbart' ,  'name_short' =>  'Humbart' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '35', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ragnoth the Despoiler' ,  'name_short' =>  'Ragnoth the Despoiler' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '36', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bonelord Fetlorn' ,  'name_short' =>  'Bonelord Fetlorn' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '37', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Broodmother Venoxa' ,  'name_short' =>  'Broodmother Venoxa' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '38', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Totek the Ancient' ,  'name_short' =>  'Totek the Ancient' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '39', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hunter Suleng' ,  'name_short' =>  'Hunter Suleng' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '40', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ravalos' ,  'name_short' =>  'Ravalos' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '41', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Flesheater Autoch' ,  'name_short' =>  'Flesheater Autoch' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '42', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Soulflayer Mondrach' ,  'name_short' =>  'Soulflayer Mondrach' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '43', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shadehorror Phantasm' ,  'name_short' =>  'Shadehorror Phantasm' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '44', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Konstantin' ,  'name_short' =>  'Konstantin' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '45', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Trickster Maelow' ,  'name_short' =>  'Trickster Maelow' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '46', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Luggodhan' ,  'name_short' =>  'Luggodhan' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '47', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Battlemaster Atrophinius' ,  'name_short' =>  'Battlemaster Atrophinius' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '48', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fae Lord Twyl' ,  'name_short' =>  'Fae Lord Twyl' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '49', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chillblains Winterfrost' ,  'name_short' =>  'Chillblains Winterfrost' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '50', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grand Apiarist Orban' ,  'name_short' =>  'Grand Apiarist Orban' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '51', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rictus' ,  'name_short' =>  'Rictus' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '52', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wormwood' ,  'name_short' =>  'Wormwood' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '53', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Warden Falidor' ,  'name_short' =>  'Warden Falidor' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '54', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atrophinius the Fallen' ,  'name_short' =>  'Atrophinius the Fallen' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '55', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Eliam the Corrupted' ,  'name_short' =>  'Eliam the Corrupted' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '56', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rorf' ,  'name_short' =>  'Rorf' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '57', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Pyromaster Cortilnald' ,  'name_short' =>  'Pyromaster Cortilnald' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '58', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emberlord Ereetu' ,  'name_short' =>  'Emberlord Ereetu' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '59', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Flamebringer Druhl' ,  'name_short' =>  'Flamebringer Druhl' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '60', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Oludare the Firehoof' ,  'name_short' =>  'Oludare the Firehoof' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '61', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Duke Letareus' ,  'name_short' =>  'Duke Letareus' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '62', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Infiltrator Johlen' ,  'name_short' =>  'Infiltrator Johlen' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '63', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Oracle Aleria' ,  'name_short' =>  'Oracle Aleria' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '64', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Prince Hylas' ,  'name_short' =>  'Prince Hylas' );
		$sql_ary[] = array( 'game_id' => 'rift' , 'attribute_id' => '65', 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Greenscale' ,  'name_short' =>  'Lord Greenscale' );

		$db->sql_multi_insert ( $table_prefix . 'bbdkp_language', $sql_ary );
		unset ( $sql_ary );
		
	}
}

?>
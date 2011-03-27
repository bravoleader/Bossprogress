<?php
/**
 * bbdkp LOTRO install data
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

function install_lotro()
{
    global  $db, $table_prefix, $umil, $user;
    
	// zones
	$sql_ary = array ();
	$sql_ary[] = array( 'id' => 1 ,  'imagename' =>  'lotro_misc' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 2 ,  'imagename' =>  'annuminas' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 3 ,  'imagename' =>  'fornost' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 4 ,  'imagename' =>  'helegrod' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 5 ,  'imagename' =>  'rift' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 6 ,  'imagename' =>  'urugarth' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 7 ,  'imagename' =>  'barad_gularan' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 8 ,  'imagename' =>  'carn_dum' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 9 ,  'imagename' =>  'great_barrow' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 10 ,  'imagename' =>  'garth_agarwen' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 11 ,  'imagename' =>  'ettenmoors_creeps' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 12 ,  'imagename' =>  'ettenmoors_freeps' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_zonetable', $sql_ary );
	unset ( $sql_ary );
			
	//bosses
	$sql_ary[] = array('id' => 1 ,  'imagename' =>  'bogbereth' , 'game' =>  'lotro' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 2 ,  'imagename' =>  'ferndur' , 'game' =>  'lotro' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 3 ,  'imagename' =>  'glinghant' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 4 ,  'imagename' =>  'nengon' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 5 ,  'imagename' =>  'ost_elendil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 6 ,  'imagename' =>  'guloth' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 7 ,  'imagename' =>  'balhest' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 8 ,  'imagename' =>  'haudh_valandil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 9 ,  'imagename' =>  'shingrinder' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 10 ,  'imagename' =>  'dolvaethor' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 11 ,  'imagename' =>  'valandil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 12 ,  'imagename' =>  'brogadan' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 13 ,  'imagename' =>  'megoriath' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 14 ,  'imagename' =>  'rhavameldir' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 15 ,  'imagename' =>  'warchief_burzghash' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 16 ,  'imagename' =>  'zhurmat' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 17 ,  'imagename' =>  'riamul' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 18 ,  'imagename' =>  'zanthrug' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 19 ,  'imagename' =>  'krithmog' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 20 ,  'imagename' =>  'einiora' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 21 ,  'imagename' =>  'remmenaeg' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 22 ,  'imagename' =>  'coldbear' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 23 ,  'imagename' =>  'storvagun' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 24 ,  'imagename' =>  'ansach' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 25 ,  'imagename' =>  'breosal' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 26 ,  'imagename' =>  'grisgart' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 27 ,  'imagename' =>  'adhargul' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 28 ,  'imagename' =>  'zaudru' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 29 ,  'imagename' =>  'drugoth' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 30 ,  'imagename' =>  'thorog' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 31 ,  'imagename' =>  'zurm' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 32 ,  'imagename' =>  'barz' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 33 ,  'imagename' =>  'fruz' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 34 ,  'imagename' =>  'zogtark' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 35 ,  'imagename' =>  'narnulubat' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 36 ,  'imagename' =>  'shadow_eater' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 37 ,  'imagename' =>  'thrang' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 38 ,  'imagename' =>  'thaurlach' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 39 ,  'imagename' =>  'sorkrank' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 40 ,  'imagename' =>  'burzfil' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 41 ,  'imagename' =>  'dushkal' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 42 ,  'imagename' =>  'akrur' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 43 ,  'imagename' =>  'kughurz' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 44 ,  'imagename' =>  'lamkarn' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 45 ,  'imagename' =>  'athpukh' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 46 ,  'imagename' =>  'lhugrien' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 47 ,  'imagename' =>  'morthrang' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 48 ,  'imagename' =>  'gruglok' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 49 ,  'imagename' =>  'lagmas' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 50 ,  'imagename' =>  'forvengwath' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 51 ,  'imagename' =>  'wisdan' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 52 ,  'imagename' =>  'udunion' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 53 ,  'imagename' =>  'urro' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 54 ,  'imagename' =>  'barashal' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 55 ,  'imagename' =>  'helchgam' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 56 ,  'imagename' =>  'salvakh' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 57 ,  'imagename' =>  'azgoth' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 58 ,  'imagename' =>  'tarlug' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 59 ,  'imagename' =>  'mormoz' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 60 ,  'imagename' =>  'rodakhan' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 61 ,  'imagename' =>  'mura' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 62 ,  'imagename' =>  'gurthul' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 63 ,  'imagename' =>  'mordirith' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 64 ,  'imagename' =>  'gaerthel_gaerdring' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 65 ,  'imagename' =>  'thadur' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 66 ,  'imagename' =>  'sambrog' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 67 ,  'imagename' =>  'temair' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 68 ,  'imagename' =>  'grimbark' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 69 ,  'imagename' =>  'edan_esyld' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 70 ,  'imagename' =>  'ivar' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 71 ,  'imagename' =>  'vatar' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 72 ,  'imagename' =>  'naruhel' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 73 ,  'imagename' =>  'tharbil' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 74 ,  'imagename' =>  'burzgoth' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 75 ,  'imagename' =>  'gundzor' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 76 ,  'imagename' =>  'durgrat' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 77 ,  'imagename' =>  'trintru' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 78 ,  'imagename' =>  'barashish' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 79 ,  'imagename' =>  'bordagor' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 80 ,  'imagename' =>  'lainedhel' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 81 ,  'imagename' =>  'verdantine' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 82 ,  'imagename' =>  'makan' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 83 ,  'imagename' =>  'meldun' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 84 ,  'imagename' =>  'harvestgain' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_bosstable', $sql_ary );
	unset ( $sql_ary );

	//language
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Miscellaneous bosses' ,  'name_short' =>  'Miscellaneous bosses' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annuminas - Glinghant' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Fornost' ,  'name_short' =>  'Fornost' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Helegrod' ,  'name_short' =>  'Helegrod' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Rift of Nrz Ghshu' ,  'name_short' =>  'The Rift of Nrz Ghshu' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Urugarth' ,  'name_short' =>  'Urugarth' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Barad Gularan' ,  'name_short' =>  'Barad Gularan' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Carn Dum' ,  'name_short' =>  'Carn Dum' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Great Barrow' ,  'name_short' =>  'The Great Barrow' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Garth Agarwen' ,  'name_short' =>  'Garth Agarwen' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors creeps' ,  'name_short' =>  'Ettenmoors creeps' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors freeps' ,  'name_short' =>  'Ettenmoors freeps' );
	//bosses
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bogbereth' ,  'name_short' =>  'Bogbereth' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ferndur' ,  'name_short' =>  'Ferndur' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annu - Garden' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nengon' ,  'name_short' =>  'Nengon' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Ost Elendil' ,  'name_short' =>  'Annu - Palace' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Guloth' ,  'name_short' =>  'Guloth' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Balhest' ,  'name_short' =>  'Balhest' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Haudh Valandil' ,  'name_short' =>  'Annu - Tomb' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shingrinder' ,  'name_short' =>  'Shingrinder' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dolvaethor' ,  'name_short' =>  'Dolvaethor' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valandil of Arnor' ,  'name_short' =>  'Valandil' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Brogadan' ,  'name_short' =>  'Bragadan' );
	$sql_ary[] = array( 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Megoriath' ,  'name_short' =>  'Megoriath' );
	$sql_ary[] = array( 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rhavameldir' ,  'name_short' =>  'Rhavameldir' );
	$sql_ary[] = array( 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Warchief Burzgash' ,  'name_short' =>  'Burzgash' );
	$sql_ary[] = array( 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zhurmat' ,  'name_short' =>  'Zhurmat' );
	$sql_ary[] = array( 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Riamul' ,  'name_short' =>  'Riamul' );
	$sql_ary[] = array( 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zanthrug' ,  'name_short' =>  'Zanthrug' );
	$sql_ary[] = array( 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Krithmog' ,  'name_short' =>  'Krithmog' );
	$sql_ary[] = array( 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Einiora' ,  'name_short' =>  'Einiora' );
	$sql_ary[] = array( 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Remmenaeg' ,  'name_short' =>  'Remmenaeg' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Coldbear' ,  'name_short' =>  'Coldbear' );
	$sql_ary[] = array( 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Storvagun' ,  'name_short' =>  'Storvagun' );
	$sql_ary[] = array( 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ansach' ,  'name_short' =>  'Ansach' );
	$sql_ary[] = array( 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Breosal' ,  'name_short' =>  'Breosal' );
	$sql_ary[] = array( 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grisgart' ,  'name_short' =>  'Grisgart' );
	$sql_ary[] = array( 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Adhargul' ,  'name_short' =>  'Adhargul' );
	$sql_ary[] = array( 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zaudru' ,  'name_short' =>  'Zaudru' );
	$sql_ary[] = array( 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Drugoth The Death-Monger' ,  'name_short' =>  'Drugoth' );
	$sql_ary[] = array( 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thorog' ,  'name_short' =>  'Thorog' );
	$sql_ary[] = array( 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zurm' ,  'name_short' =>  'Zurm' );
	$sql_ary[] = array( 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Barz' ,  'name_short' =>  'Barz' );
	$sql_ary[] = array( 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fruz' ,  'name_short' =>  'Fruz' );
	$sql_ary[] = array( 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zogtark' ,  'name_short' =>  'Zogtark' );
	$sql_ary[] = array( 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Narnulubat' ,  'name_short' =>  'Narn˚lubat' );
	$sql_ary[] = array( 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shadow Eater' ,  'name_short' =>  'Eater' );
	$sql_ary[] = array( 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thrang' ,  'name_short' =>  'Thrang' );
	$sql_ary[] = array( 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thaurlach' ,  'name_short' =>  'Thaurlach' );
	$sql_ary[] = array( 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sorkrank' ,  'name_short' =>  'Sorkrank' );
	$sql_ary[] = array( 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Burzfil' ,  'name_short' =>  'Burzfil' );
	$sql_ary[] = array( 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dushkal' ,  'name_short' =>  'Dushkal' );
	$sql_ary[] = array( 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Akrur' ,  'name_short' =>  'Akrur' );
	$sql_ary[] = array( 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kughurz' ,  'name_short' =>  'Kughurz' );
	$sql_ary[] = array( 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lamkarn' ,  'name_short' =>  'Lamkarn' );
	$sql_ary[] = array( 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Athpukh' ,  'name_short' =>  'Athpukh' );
	$sql_ary[] = array( 'attribute_id' => 46, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lhugrien' ,  'name_short' =>  'Lhugrien' );
	$sql_ary[] = array( 'attribute_id' => 47, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Morthrang' ,  'name_short' =>  'Morthrang' );
	$sql_ary[] = array( 'attribute_id' => 48, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gruglok' ,  'name_short' =>  'Gruglok' );
	$sql_ary[] = array( 'attribute_id' => 49, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lagmas' ,  'name_short' =>  'Lagmas' );
	$sql_ary[] = array( 'attribute_id' => 50, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Forvengwath' ,  'name_short' =>  'Forvengwath' );
	$sql_ary[] = array( 'attribute_id' => 51, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Castellan Wisdan' ,  'name_short' =>  'Wisdan' );
	$sql_ary[] = array( 'attribute_id' => 52, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Udunion' ,  'name_short' =>  'Udunion' );
	$sql_ary[] = array( 'attribute_id' => 53, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Urro' ,  'name_short' =>  'Urro' );
	$sql_ary[] = array( 'attribute_id' => 54, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Barashal' ,  'name_short' =>  'Barashal' );
	$sql_ary[] = array( 'attribute_id' => 55, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Helchgam' ,  'name_short' =>  'Helchgam' );
	$sql_ary[] = array( 'attribute_id' => 56, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Salvakh' ,  'name_short' =>  'Salvakh' );
	$sql_ary[] = array( 'attribute_id' => 57, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azgoth' ,  'name_short' =>  'Azgoth' );
	$sql_ary[] = array( 'attribute_id' => 58, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tarlug' ,  'name_short' =>  'Tarlug' );
	$sql_ary[] = array( 'attribute_id' => 59, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mormoz' ,  'name_short' =>  'Mormoz' );
	$sql_ary[] = array( 'attribute_id' => 60, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rodakhan' ,  'name_short' =>  'Rodakhan' );
	$sql_ary[] = array( 'attribute_id' => 61, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mura' ,  'name_short' =>  'Mura' );
	$sql_ary[] = array( 'attribute_id' => 62, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gurthul' ,  'name_short' =>  'Gurthul' );
	$sql_ary[] = array( 'attribute_id' => 63, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mordirith' ,  'name_short' =>  'Mordirith' );
	$sql_ary[] = array( 'attribute_id' => 64, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gaerthel & Gaerdring' ,  'name_short' =>  'G & G' );
	$sql_ary[] = array( 'attribute_id' => 65, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thadur the Ravager' ,  'name_short' =>  'Thad˙r' );
	$sql_ary[] = array( 'attribute_id' => 66, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sambrog' ,  'name_short' =>  'Sambrog' );
	$sql_ary[] = array( 'attribute_id' => 67, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Temair the Devoted' ,  'name_short' =>  'Temair' );
	$sql_ary[] = array( 'attribute_id' => 68, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grimbark' ,  'name_short' =>  'Grimbark' );
	$sql_ary[] = array( 'attribute_id' => 69, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Edan & Esyld' ,  'name_short' =>  'E & E' );
	$sql_ary[] = array( 'attribute_id' => 70, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ivar the Bloodhand' ,  'name_short' =>  'Ivar' );
	$sql_ary[] = array( 'attribute_id' => 71, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vatar' ,  'name_short' =>  'Vatar' );
	$sql_ary[] = array( 'attribute_id' => 72, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Naruhel - The Red Maid' ,  'name_short' =>  'Naruhel' );
	$sql_ary[] = array( 'attribute_id' => 73, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Tharbil' ,  'name_short' =>  'Tharbil' );
	$sql_ary[] = array( 'attribute_id' => 74, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Burzgoth' ,  'name_short' =>  'Burzgoth' );
	$sql_ary[] = array( 'attribute_id' => 75, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Gundzor' ,  'name_short' =>  'Gundzor' );
	$sql_ary[] = array( 'attribute_id' => 76, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Durgrat' ,  'name_short' =>  'Durgrat' );
	$sql_ary[] = array( 'attribute_id' => 77, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Trintru' ,  'name_short' =>  'Trintru' );
	$sql_ary[] = array( 'attribute_id' => 78, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Barashish' ,  'name_short' =>  'Barashish' );
	$sql_ary[] = array( 'attribute_id' => 79, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Bordagor' ,  'name_short' =>  'Bordagor' );
	$sql_ary[] = array( 'attribute_id' => 80, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Lainedhel' ,  'name_short' =>  'Lainedhel' );
	$sql_ary[] = array( 'attribute_id' => 81, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Verdantine' ,  'name_short' =>  'Verdantine' );
	$sql_ary[] = array( 'attribute_id' => 82, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Makan' ,  'name_short' =>  'Makan' );
	$sql_ary[] = array( 'attribute_id' => 83, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Meldun' ,  'name_short' =>  'Meldun' );
	$sql_ary[] = array( 'attribute_id' => 84, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Harvestgain' ,  'name_short' =>  'Harvestgain' );
	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Miscellaneous bosses' ,  'name_short' =>  'Miscellaneous bosses' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annuminas - Glinghant' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Fornost' ,  'name_short' =>  'Fornost' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Helegrod' ,  'name_short' =>  'Helegrod' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Rift of Nrz Ghshu' ,  'name_short' =>  'The Rift of Nrz Ghshu' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Urugarth' ,  'name_short' =>  'Urugarth' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Barad Gularan' ,  'name_short' =>  'Barad Gularan' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Carn Dum' ,  'name_short' =>  'Carn Dum' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Great Barrow' ,  'name_short' =>  'The Great Barrow' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Garth Agarwen' ,  'name_short' =>  'Garth Agarwen' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors creeps' ,  'name_short' =>  'Ettenmoors creeps' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors freeps' ,  'name_short' =>  'Ettenmoors freeps' );
	
	//bosses	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bogbereth' ,  'name_short' =>  'Bogbereth' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ferndur' ,  'name_short' =>  'Ferndur' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annu - Garden' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nengon' ,  'name_short' =>  'Nengon' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Ost Elendil' ,  'name_short' =>  'Annu - Palace' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Guloth' ,  'name_short' =>  'Guloth' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Balhest' ,  'name_short' =>  'Balhest' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Haudh Valandil' ,  'name_short' =>  'Annu - Tomb' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Shingrinder' ,  'name_short' =>  'Shingrinder' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dolvaethor' ,  'name_short' =>  'Dolvaethor' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valandil of Arnor' ,  'name_short' =>  'Valandil' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Brogadan' ,  'name_short' =>  'Bragadan' );
	$sql_ary[] = array( 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Megoriath' ,  'name_short' =>  'Megoriath' );
	$sql_ary[] = array( 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rhavameldir' ,  'name_short' =>  'Rhavameldir' );
	$sql_ary[] = array( 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Warchief Burzgash' ,  'name_short' =>  'Burzgash' );
	$sql_ary[] = array( 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zhurmat' ,  'name_short' =>  'Zhurmat' );
	$sql_ary[] = array( 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Riamul' ,  'name_short' =>  'Riamul' );
	$sql_ary[] = array( 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zanthrug' ,  'name_short' =>  'Zanthrug' );
	$sql_ary[] = array( 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Krithmog' ,  'name_short' =>  'Krithmog' );
	$sql_ary[] = array( 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Einiora' ,  'name_short' =>  'Einiora' );
	$sql_ary[] = array( 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Remmenaeg' ,  'name_short' =>  'Remmenaeg' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Coldbear' ,  'name_short' =>  'Coldbear' );
	$sql_ary[] = array( 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Storvagun' ,  'name_short' =>  'Storvagun' );
	$sql_ary[] = array( 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ansach' ,  'name_short' =>  'Ansach' );
	$sql_ary[] = array( 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Breosal' ,  'name_short' =>  'Breosal' );
	$sql_ary[] = array( 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grisgart' ,  'name_short' =>  'Grisgart' );
	$sql_ary[] = array( 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Adhargul' ,  'name_short' =>  'Adhargul' );
	$sql_ary[] = array( 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zaudru' ,  'name_short' =>  'Zaudru' );
	$sql_ary[] = array( 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Drugoth The Death-Monger' ,  'name_short' =>  'Drugoth' );
	$sql_ary[] = array( 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thorog' ,  'name_short' =>  'Thorog' );
	$sql_ary[] = array( 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zurm' ,  'name_short' =>  'Zurm' );
	$sql_ary[] = array( 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Barz' ,  'name_short' =>  'Barz' );
	$sql_ary[] = array( 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Fruz' ,  'name_short' =>  'Fruz' );
	$sql_ary[] = array( 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zogtark' ,  'name_short' =>  'Zogtark' );
	$sql_ary[] = array( 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Narnulubat' ,  'name_short' =>  'Narn˚lubat' );
	$sql_ary[] = array( 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Shadow Eater' ,  'name_short' =>  'Eater' );
	$sql_ary[] = array( 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thrang' ,  'name_short' =>  'Thrang' );
	$sql_ary[] = array( 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thaurlach' ,  'name_short' =>  'Thaurlach' );
	$sql_ary[] = array( 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sorkrank' ,  'name_short' =>  'Sorkrank' );
	$sql_ary[] = array( 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Burzfil' ,  'name_short' =>  'Burzfil' );
	$sql_ary[] = array( 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dushkal' ,  'name_short' =>  'Dushkal' );
	$sql_ary[] = array( 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Akrur' ,  'name_short' =>  'Akrur' );
	$sql_ary[] = array( 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kughurz' ,  'name_short' =>  'Kughurz' );
	$sql_ary[] = array( 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lamkarn' ,  'name_short' =>  'Lamkarn' );
	$sql_ary[] = array( 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Athpukh' ,  'name_short' =>  'Athpukh' );
	$sql_ary[] = array( 'attribute_id' => 46, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lhugrien' ,  'name_short' =>  'Lhugrien' );
	$sql_ary[] = array( 'attribute_id' => 47, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Morthrang' ,  'name_short' =>  'Morthrang' );
	$sql_ary[] = array( 'attribute_id' => 48, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gruglok' ,  'name_short' =>  'Gruglok' );
	$sql_ary[] = array( 'attribute_id' => 49, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lagmas' ,  'name_short' =>  'Lagmas' );
	$sql_ary[] = array( 'attribute_id' => 50, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Forvengwath' ,  'name_short' =>  'Forvengwath' );
	$sql_ary[] = array( 'attribute_id' => 51, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Castellan Wisdan' ,  'name_short' =>  'Wisdan' );
	$sql_ary[] = array( 'attribute_id' => 52, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Udunion' ,  'name_short' =>  'Udunion' );
	$sql_ary[] = array( 'attribute_id' => 53, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Urro' ,  'name_short' =>  'Urro' );
	$sql_ary[] = array( 'attribute_id' => 54, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Barashal' ,  'name_short' =>  'Barashal' );
	$sql_ary[] = array( 'attribute_id' => 55, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Helchgam' ,  'name_short' =>  'Helchgam' );
	$sql_ary[] = array( 'attribute_id' => 56, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Salvakh' ,  'name_short' =>  'Salvakh' );
	$sql_ary[] = array( 'attribute_id' => 57, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azgoth' ,  'name_short' =>  'Azgoth' );
	$sql_ary[] = array( 'attribute_id' => 58, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tarlug' ,  'name_short' =>  'Tarlug' );
	$sql_ary[] = array( 'attribute_id' => 59, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mormoz' ,  'name_short' =>  'Mormoz' );
	$sql_ary[] = array( 'attribute_id' => 60, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rodakhan' ,  'name_short' =>  'Rodakhan' );
	$sql_ary[] = array( 'attribute_id' => 61, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mura' ,  'name_short' =>  'Mura' );
	$sql_ary[] = array( 'attribute_id' => 62, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gurthul' ,  'name_short' =>  'Gurthul' );
	$sql_ary[] = array( 'attribute_id' => 63, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mordirith' ,  'name_short' =>  'Mordirith' );
	$sql_ary[] = array( 'attribute_id' => 64, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gaerthel & Gaerdring' ,  'name_short' =>  'G & G' );
	$sql_ary[] = array( 'attribute_id' => 65, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thadur the Ravager' ,  'name_short' =>  'Thad˙r' );
	$sql_ary[] = array( 'attribute_id' => 66, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sambrog' ,  'name_short' =>  'Sambrog' );
	$sql_ary[] = array( 'attribute_id' => 67, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Temair the Devoted' ,  'name_short' =>  'Temair' );
	$sql_ary[] = array( 'attribute_id' => 68, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grimbark' ,  'name_short' =>  'Grimbark' );
	$sql_ary[] = array( 'attribute_id' => 69, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Edan & Esyld' ,  'name_short' =>  'E & E' );
	$sql_ary[] = array( 'attribute_id' => 70, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ivar the Bloodhand' ,  'name_short' =>  'Ivar' );
	$sql_ary[] = array( 'attribute_id' => 71, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vatar' ,  'name_short' =>  'Vatar' );
	$sql_ary[] = array( 'attribute_id' => 72, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Naruhel - The Red Maid' ,  'name_short' =>  'Naruhel' );
	$sql_ary[] = array( 'attribute_id' => 73, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Tharbil' ,  'name_short' =>  'Tharbil' );
	$sql_ary[] = array( 'attribute_id' => 74, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Burzgoth' ,  'name_short' =>  'Burzgoth' );
	$sql_ary[] = array( 'attribute_id' => 75, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Gundzor' ,  'name_short' =>  'Gundzor' );
	$sql_ary[] = array( 'attribute_id' => 76, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Durgrat' ,  'name_short' =>  'Durgrat' );
	$sql_ary[] = array( 'attribute_id' => 77, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Trintru' ,  'name_short' =>  'Trintru' );
	$sql_ary[] = array( 'attribute_id' => 78, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Barashish' ,  'name_short' =>  'Barashish' );
	$sql_ary[] = array( 'attribute_id' => 79, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Bordagor' ,  'name_short' =>  'Bordagor' );
	$sql_ary[] = array( 'attribute_id' => 80, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Lainedhel' ,  'name_short' =>  'Lainedhel' );
	$sql_ary[] = array( 'attribute_id' => 81, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Verdantine' ,  'name_short' =>  'Verdantine' );
	$sql_ary[] = array( 'attribute_id' => 82, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Makan' ,  'name_short' =>  'Makan' );
	$sql_ary[] = array( 'attribute_id' => 83, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Meldun' ,  'name_short' =>  'Meldun' );
	$sql_ary[] = array( 'attribute_id' => 84, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Harvestgain' ,  'name_short' =>  'Harvestgain' );

	$db->sql_multi_insert ( $table_prefix . 'bbdkp_language', $sql_ary );
	unset ( $sql_ary );
}

?>
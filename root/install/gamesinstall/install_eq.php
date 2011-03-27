<?php
/**
 * bbdkp everquest install data
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

function install_eq()
{
    global  $db, $table_prefix, $umil, $user;

	$sql_ary = array ();
	$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'dummyzone' , 'game' =>  'eq' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1);
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_zonetable', $sql_ary );
	unset ( $sql_ary );

	$sql_ary = array ();
	$sql_ary[] = array('id' => 1 ,  'imagename' =>  'dummyboss' , 'game' =>  'eq' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_bosstable', $sql_ary );
	unset ( $sql_ary );

	$sql_ary = array ();
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Dummy Zone' ,  'name_short' =>  'Dummy Zone' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dummy Boss' ,  'name_short' =>  'Dummy Boss' );
	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zone par défaut' ,  'name_short' =>  'Zone par défaut' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Boss par défaut' ,  'name_short' =>  'Boss par défaut' );
		
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_language', $sql_ary );
	unset ( $sql_ary );
		
	
}


    
?>
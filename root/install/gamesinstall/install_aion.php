<?php
/**
 * bbdkp wow install data
 * @package bbDkp-installer
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id: install_aion.php 661 2009-09-08 22:16:06Z Sajaki9 &Malfate
 * 
 */


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function install_aion()
{
    global $db, $table_prefix, $umil, $user;

	// zones
	$sql_ary = array ();
	$sql_ary[] = array( 'sequence' =>  1 , 'id' => 1 , 'imagename' =>  'dummyzone' , 'game' =>  'aion' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1);
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_zonetable', $sql_ary );
	unset ( $sql_ary );

	$sql_ary = array ();
	$sql_ary[] = array('id' => 1 ,  'imagename' =>  'dummyboss' , 'game' =>  'aion' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
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
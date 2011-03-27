<?php
/**
 * bbdkp wow install data
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

function install_warhammer()
{
    global  $db, $table_prefix, $umil, $user;

	$sql_ary = array ();
	$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'altdorf' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1);
	$sql_ary[] = array( 'id' => 2 , 'imagename' =>  'sacellum' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1);
	$sql_ary[] = array( 'id' => 3 , 'imagename' =>  'gunbad' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1);
	$sql_ary[] = array( 'id' => 4 , 'imagename' =>  'stair' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1);
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_zonetable', $sql_ary);
	unset ( $sql_ary );
	
	// id is explicitly given because foreign keys in language table depend on it
	$sql_ary[] = array('id' => 1 ,  'imagename' =>  'kokrit' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '19409' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 2 ,  'imagename' =>  'bulbous' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '3650' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 3 ,  'imagename' =>  'fangchitter' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '3651' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 4 ,  'imagename' =>  'vitchek' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '18762' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 5 ,  'imagename' =>  'goradian' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '33401' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 6 ,  'imagename' =>  'ghalmar' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '25721' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 7 ,  'imagename' =>  'guzhak' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '22044' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 8 ,  'imagename' =>  'vul' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33173' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 9 ,  'imagename' =>  'hoarfrost' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '10256' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 10 ,  'imagename' =>  'sebcraw' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '26812' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 11 ,  'imagename' =>  'thunder' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '93573' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 12 ,  'imagename' =>  'breeder' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33172' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 13 ,  'imagename' =>  'goremane' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33182' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 14 ,  'imagename' =>  'viraxil' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33181' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 15 ,  'imagename' =>  'griblik' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '36549' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 16 ,  'imagename' =>  'bilebane' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '36547' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 17 ,  'imagename' =>  'garrolath' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38234' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 18 ,  'imagename' =>  'foulm' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38623' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 19 ,  'imagename' =>  'kurga' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38624' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 20 ,  'imagename' =>  'glomp' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38829' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 21 ,  'imagename' =>  'solithex' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '37964' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 22 ,  'imagename' =>  'borzar' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '9227' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 23 ,  'imagename' =>  'gahlvoth' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '45224' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 24 ,  'imagename' =>  'azuk' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '47390' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 25 ,  'imagename' =>  'thar' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '45084' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 26 ,  'imagename' =>  'urlf' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '7622' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 27 ,  'imagename' =>  'garithex' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '7597' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 28 ,  'imagename' =>  'chorek' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '49164' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 29 ,  'imagename' =>  'slarith' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '48112' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1 , 'showzoneportal' =>  1    );
	$sql_ary[] = array('id' => 30 ,  'imagename' =>  'wrackspite' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '16078' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 31 ,  'imagename' =>  'clawfang' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46327' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 32 ,  'imagename' =>  'zekaraz' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46325' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 33 ,  'imagename' =>  'kaarn' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46330' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$sql_ary[] = array('id' => 34 ,  'imagename' =>  'skullord' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '64106' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1  , 'showzoneportal' =>  1   );
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_bosstable', $sql_ary );

	unset ( $sql_ary );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Altdorf Sewers' ,  'name_short' =>  'Altdorf Sewers' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Sacellum Dungeon' ,  'name_short' =>  'The Sacellum Dungeon' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Mount Gunbad' ,  'name_short' =>  'Mount Gunbad' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Bastion Stair' ,  'name_short' =>  'The Bastion Stair' );
	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kokrit Man-Eater' ,  'name_short' =>  'Kokrit' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bulbous One' ,  'name_short' =>  'Bulbous' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Prot and Vermer Fangchitter' ,  'name_short' =>  'Fangchitter' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Master Moulder Vitchek' ,  'name_short' =>  'Vitchek' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Goradian the Creator' ,  'name_short' =>  'Goradian' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ghalmar Ragehorn' ,  'name_short' =>  'Ghalmar' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Guzhak the Betrayer' ,  'name_short' =>  'Guzhak' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vul The Bloodchosen' ,  'name_short' =>  'Vul' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hoarfrost' ,  'name_short' =>  'Hoarfrost' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sebcraw the Discarded' ,  'name_short' =>  'Sebcraw' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Slorth and Lorth Thunderbelly' ,  'name_short' =>  'Thunderbelly' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Snaptail the Breeder' ,  'name_short' =>  'Snaptail' );
	$sql_ary[] = array( 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Goremane' ,  'name_short' =>  'Goremane' );
	$sql_ary[] = array( 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Viraxil the Broken' ,  'name_short' =>  'Viraxil' );
	$sql_ary[] = array( 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Griblik da Stinka' ,  'name_short' =>  'Griblik' );
	$sql_ary[] = array( 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bilebane the Rager' ,  'name_short' =>  'Bilebane' );
	$sql_ary[] = array( 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Garrolath the Poxbearer' ,  'name_short' =>  'Garrolath' );
	$sql_ary[] = array( 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Foul Mouf da ’ungry' ,  'name_short' =>  'Foul' );
	$sql_ary[] = array( 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kurga da Squig-Maker' ,  'name_short' =>  'Kurga' );
	$sql_ary[] = array( 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Glomp the Squig Masta' ,  'name_short' =>  'Glomp' );
	$sql_ary[] = array( 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Solithex' ,  'name_short' =>  'Solithex' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Borzar Rageborn' ,  'name_short' =>  'Rageborn' );
	$sql_ary[] = array( 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gahlvoth Darkrage' ,  'name_short' =>  'Gahlvoth' );
	$sql_ary[] = array( 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azuk’Thul' ,  'name_short' =>  'Azuk’Thul' );
	$sql_ary[] = array( 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thar’lgnan' ,  'name_short' =>  'Thar’lgnan' );
	$sql_ary[] = array( 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Urlf Daemonblessed' ,  'name_short' =>  'Urlf' );
	$sql_ary[] = array( 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Garithex the Mountain' ,  'name_short' =>  'Garithex' );
	$sql_ary[] = array( 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chorek the Unstoppable' ,  'name_short' =>  'Chorek' );
	$sql_ary[] = array( 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Slaurith' ,  'name_short' =>  'Slaurith' );
	$sql_ary[] = array( 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wrackspite' ,  'name_short' =>  'Wrackspite' );
	$sql_ary[] = array( 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Clawfang and Doomspike' ,  'name_short' =>  'Clawfang' );
	$sql_ary[] = array( 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zekaraz the Bloodcaller' ,  'name_short' =>  'Zekaraz' );
	$sql_ary[] = array( 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kaarn the Vanquisher' ,  'name_short' =>  'Kaarn' );
	$sql_ary[] = array( 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Skull Lord Var’Ithrok' ,  'name_short' =>  'Var’Ithrok' );
	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Altdorf Sewers' ,  'name_short' =>  'Altdorf Sewers' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Sacellum Dungeon' ,  'name_short' =>  'The Sacellum Dungeon' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Mount Gunbad' ,  'name_short' =>  'Mount Gunbad' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Bastion Stair' ,  'name_short' =>  'The Bastion Stair' );
	
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kokrit Man-Eater' ,  'name_short' =>  'Kokrit' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bulbous One' ,  'name_short' =>  'Bulbous' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prot and Vermer Fangchitter' ,  'name_short' =>  'Fangchitter' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Master Moulder Vitchek' ,  'name_short' =>  'Vitchek' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Goradian the Creator' ,  'name_short' =>  'Goradian' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ghalmar Ragehorn' ,  'name_short' =>  'Ghalmar' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Guzhak the Betrayer' ,  'name_short' =>  'Guzhak' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vul The Bloodchosen' ,  'name_short' =>  'Vul' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hoarfrost' ,  'name_short' =>  'Hoarfrost' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sebcraw the Discarded' ,  'name_short' =>  'Sebcraw' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Slorth and Lorth Thunderbelly' ,  'name_short' =>  'Thunderbelly' );
	$sql_ary[] = array( 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Snaptail the Breeder' ,  'name_short' =>  'Snaptail' );
	$sql_ary[] = array( 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Goremane' ,  'name_short' =>  'Goremane' );
	$sql_ary[] = array( 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Viraxil the Broken' ,  'name_short' =>  'Viraxil' );
	$sql_ary[] = array( 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Griblik da Stinka' ,  'name_short' =>  'Griblik' );
	$sql_ary[] = array( 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bilebane the Rager' ,  'name_short' =>  'Bilebane' );
	$sql_ary[] = array( 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garrolath the Poxbearer' ,  'name_short' =>  'Garrolath' );
	$sql_ary[] = array( 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Foul Mouf da ’ungry' ,  'name_short' =>  'Foul' );
	$sql_ary[] = array( 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kurga da Squig-Maker' ,  'name_short' =>  'Kurga' );
	$sql_ary[] = array( 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Glomp the Squig Masta' ,  'name_short' =>  'Glomp' );
	$sql_ary[] = array( 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Solithex' ,  'name_short' =>  'Solithex' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Borzar Rageborn' ,  'name_short' =>  'Rageborn' );
	$sql_ary[] = array( 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gahlvoth Darkrage' ,  'name_short' =>  'Gahlvoth' );
	$sql_ary[] = array( 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azuk’Thul' ,  'name_short' =>  'Azuk’Thul' );
	$sql_ary[] = array( 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thar’lgnan' ,  'name_short' =>  'Thar’lgnan' );
	$sql_ary[] = array( 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Urlf Daemonblessed' ,  'name_short' =>  'Urlf' );
	$sql_ary[] = array( 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garithex the Mountain' ,  'name_short' =>  'Garithex' );
	$sql_ary[] = array( 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chorek the Unstoppable' ,  'name_short' =>  'Chorek' );
	$sql_ary[] = array( 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lord Slaurith' ,  'name_short' =>  'Slaurith' );
	$sql_ary[] = array( 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Wrackspite' ,  'name_short' =>  'Wrackspite' );
	$sql_ary[] = array( 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Clawfang and Doomspike' ,  'name_short' =>  'Clawfang' );
	$sql_ary[] = array( 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zekaraz the Bloodcaller' ,  'name_short' =>  'Zekaraz' );
	$sql_ary[] = array( 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kaarn the Vanquisher' ,  'name_short' =>  'Kaarn' );
	$sql_ary[] = array( 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Skull Lord Var’Ithrok' ,  'name_short' =>  'Var’Ithrok' );
	
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_language', $sql_ary );
	unset ( $sql_ary );
		
}




?>
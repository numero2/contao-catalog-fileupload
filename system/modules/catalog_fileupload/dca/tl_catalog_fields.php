<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  numero2 - Agentur für Internetdienstleistungen <www.numero2.de>
 * @author     Benny Born <benny.born@numero2.de>
 * @package    catalog
 * @license    LGPL
 * @filesource
 */


/**
 * Catalog options list
 */

$GLOBALS['TL_DCA']['tl_catalog_fields']['fields']['type']['options'][] = 'fileupload';


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['fileupload'] = '{title_legend},name,description,colName,type,fileupload_directory;{display_legend},parentCheckbox,titleField,insertBreak,width50;{filter_legend:hide},sortingField,filteredField,searchableField;{advanced_legend:hide},mandatory;{feedit_legend},editGroups';


/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_catalog_fields']['fields']['fileupload_directory'] = array (
	'label' 	=> &$GLOBALS['TL_LANG']['tl_catalog_fields']['fileupload_directory']
,	'exclude'	=> true
,	'inputType'	=> 'fileTree'
,	'eval'		=> array('fieldType'=>'radio', 'tl_class'=>'clr')
);

?>
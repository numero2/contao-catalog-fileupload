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


class CatalogFileUploadField extends Backend {


	public function saveFile($varValue, DataContainer $dc) {

		$type = 'fileupload';
		
		$objFields = $this->Database->prepare("SELECT fileupload_directory FROM tl_catalog_fields WHERE type=? AND colName=?")->limit(1)->execute($type,$dc->inputName);

		$strUploadFolder = NULL;
		$strUploadFolder = $objFields->fileupload_directory;

		$oldValue = $_POST[$dc->inputName];
		$file = $_FILES[$dc->inputName];

		// check if upload was successfull
		if( !empty($file) && !$file['error'] ) {

			// store the file if the upload folder exists
			if( strlen($strUploadFolder) && is_dir(TL_ROOT . '/' . $strUploadFolder) ) {

				// generate a unique file name
				$newFileName = "";
				$newFileName = md5($file['name'].time()).'.'.substr(strrchr($file['name'], '.'), 1);

				// upload file
				$this->import('Files');
				
				$this->Files->move_uploaded_file($file['tmp_name'], $strUploadFolder . '/' . $newFileName);
				$this->Files->chmod($strUploadFolder . '/' . $file['name'], 0644);

				return $strUploadFolder . '/' . $newFileName;
			}
		}

		return $oldValue;
	}
}

?>
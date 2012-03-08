<?php
/**
 * This file is part of the Nella Framework.
 *
 * Copyright (c) 2006, 2011 Patrik Votoček (http://patrik.votocek.cz)
 *
 * This source file is subject to the GNU Lesser General Public License. For more information please see http://nella-project.org
 */

namespace Nella\NetteAddons\Media\Model;

/**
 * Image dao
 *
 * @author	Patrik Votoček
 */
class ImageDao extends \Nette\Object implements IImageDao
{
	/**
	 * @param string
	 * @return \Nella\NetteAddons\Media\Image|NULL
	 */
	public function findOneByFullSlug($slug)
	{
		if (($pos = strrpos($slug, '_')) === FALSE) {
			return NULL;
		}

		$path = substr_replace($slug, '.', $pos, 1);

		try {
			return new Image($path);
		} catch (\Nette\InvalidArgumentException $e) {
			return NULL;
		}
	}
}
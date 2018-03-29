<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Response
 *
 * @author Yura
 */
namespace Manko\ContactUs\Model;

class Response extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'manko_contact_us';

	protected $_cacheTag = 'manko_contact_us';

	protected $_eventPrefix = 'manko_contact_us';

	protected function _construct()
	{
		$this->_init('Manko\ContactUs\Model\ResourceModel\Response');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
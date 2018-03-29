<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Collection
 *
 * @author Yura
 */
namespace Manko\ContactUs\Model\ResourceModel\Response;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'response_id';
	protected $_eventPrefix = 'manko_contactus_response_collection';
	protected $_eventObject = 'response_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Manko\ContactUs\Model\Response', 'Manko\ContactUs\Model\ResourceModel\Response');
	}

}

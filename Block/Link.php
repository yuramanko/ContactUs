<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Link
 *
 * @author Yura
 */

namespace Manko\ContactUs\Block;

class Link extends \Magento\Framework\View\Element\Html\Link
{
/**
* Render block HTML.
*
* @return string
*/
protected function _toHtml()
    {
     if (false != $this->getTemplate()) {
     return parent::_toHtml();
     }
     return '<li><a ' . $this->getLinkAttributes() . ' >' . $this->escapeHtml($this->getLabel()) . '</a></li>';
    }
}

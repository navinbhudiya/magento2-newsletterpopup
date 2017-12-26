<?php 
namespace Navin\Newsletterpopup\Block;
class Newsletterpopup extends  \Magento\Newsletter\Block\Subscribe
{
	
    protected $httpContext;	

	/**
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Framework\App\Http\Context $httpContext
     */
	public function __construct(
		\Magento\Catalog\Block\Product\Context $context,
		\Magento\Framework\App\Http\Context $httpContext,
		array $data = []
	) {
		$this->httpContext = $httpContext;
		parent::__construct(
			$context,
			$data
		);
		$this->_isScopePrivate = true;
	}

	/**
     * Get Form Action URL
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('newsletter/subscriber/new', ['_secure' => true]);
    }
	
	/**
     * _prepareLayout
     * @return _prepareLayout
     */
	public function _prepareLayout()
	{ 
		return parent::_prepareLayout();
	}
	
	/**
     * Get Configuration
     * @param string $value 
     * @return string
     */
	public function getConfig($value=''){

	   $config =  $this->_scopeConfig->getValue('newsletterpopup/popup_group/'.$value, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	   return $config; 
	 
	}
	/*
	Get Media URL
	@return string
	*/
	public function getMediaUrl() {
		return  $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
	}
}
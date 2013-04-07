<?php

class Magehacksf_Kindred_Helper_Data extends Mage_Core_Helper_Abstract
{

	const XML_PATH_ENABLE = 'kindred/general/enable';
	const XML_PATH_MONGOURL = 'kindred/general/mongourl';
	const XML_PATH_MONGOAPIKEY = 'kindred/general/mongoapikey';
	const XML_PATH_MONGODBHOST = 'kindred/general/mongodbhost';
//	const XML_PATH_MONGODBUSERNAME = 'kindred/general/mongodbusername';
//	const XML_PATH_MONGODBPASSWORD = 'kindred/general/mongodbpassword';

	public function getIsEnabled()
	{
		return Mage::getStoreConfig(self::XML_PATH_ENABLE);
	}

	public function getMongoUrl()
	{
		return Mage::getStoreConfig(self::XML_PATH_MONGOURL);
	}

	public function getMongoApiKey()
	{
		return Mage::getStoreConfig(self::XML_PATH_MONGOAPIKEY);
	}

	public function getMongoDbHost()
	{
//		return Mage::getStoreConfig(self::XML_PATH_MONGODBHOST);
		return 'ds033217.mongolab.com';

	}

	public function getMongoDatabase()
	{
		return 'kindred';
	}

	public function getMongoDbConnectionUrl()
	{
//		return 'mongodb://'.$this->getMongoUsername().':'.$this->getMongoPassword().'@'.$this->getMongoDbHost()':33217/kindred/'; //.$this->getMongoDatabase()
		return 'mongodb://test:test@ds033217.mongolab.com:33217/';
	}


}

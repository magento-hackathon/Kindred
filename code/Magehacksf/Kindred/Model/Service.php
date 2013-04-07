<?php
/**
 * Service dot php
 *
 * This will house all of our mongo db service methods
 */
class Magehacksf_Kindred_Model_Service extends Mage_Core_Model_Abstract
{
	/**
	 * @return Magehacksf_Kindred_Helper_Data
	 */
	public function getHelper()
	{
		return Mage::helper('kindred');
	}

	public function getDatabase()
	{
		$mongo = new Mongo($this->getHelper()->getMongoDbConnectionUrl());
		$mongo->connect();

		return $mongo->selectDB('kindred');
	}

	public function writeSku($sku = 'test')
	{

		$db = $this->getDatabase();

		$test = $db->createCollection($sku);
	}

	// some sort of function that takes a product, then iterates through its attributes, and then creates some sort of db info and writes it out to mongo

	/**
	 * @param $product Mage_Catalog_Model_Product
	 */
	public function calculateWeights($p)
	{
//		$attributes = $product->getAttributes(); something like this
		// each attribute would need a separate interface for calculating weights
		// and then some sort of way to weigh attributes over other attributes
		// and then it calculates a final number

		// elsewise for now
		/** @var $attribute Mage_Catalog_Model_Resource_Attribute */
//		$attribute = Mage::getModel('catalog/product_attribute');

		// also some sort of initial filter that might pull out stuff aka category filter?
		// also eventually some sort of process that says hey we need to reindex EVERYTHING (aka we just added a new product or something)

		$products = $product->getCollection()->addAttributeToSelect('color');

		$skuData = array();

		foreach ($products as $product)
		{
			$value = $product->getColor();
			$weight = $this->getAttributeWeight(); // calculate weight of color

			$skuData[] = array(
				'distance'=>$weight,
				'data'=>
				array(
					'price'=> $product->getPrice(),
					'color'=> $product->getColor(),
					'subsku' => $product->getSku(),
					// basically anything
				)
			);

		}

		$db = $this->getDatabase();

		$db->dropCollection($p->getSku()); // drop then create for now
		$collection = $db->createCollection($p->getSku());

		foreach ($skuData as $data)
		{
			$collection->insert($data);
		}
	}

	public function getAttributeWeight($attr1 = '', $attr2 = '')
	{
		return rand(1,100);
	}
}
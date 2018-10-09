<?php
// 	Copyright (c) 2010 Alan Storm
// 	
// 	Permission is hereby granted, free of charge, to any person obtaining a copy
// 	of this software and associated documentation files (the "Software"), to deal
// 	in the Software without restriction, including without limitation the rights
// 	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// 	copies of the Software, and to permit persons to whom the Software is
// 	furnished to do so, subject to the following conditions:
// 	
// 	The above copyright notice and this permission notice shall be included in
// 	all copies or substantial portions of the Software.
// 	
// 	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// 	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// 	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// 	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// 	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// 	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// 	THE SOFTWARE.


	/**
	* One Line Description
	*
	* Multi Line Description
	* @author Alan Storm 
	*/
	class Alanstormdotcom_Configlint_Helper_Lints_Xmlstructure extends Alanstormdotcom_Configlint_Helper_Lints_Abstract
	{			
		protected function setWhichConfig()
		{
			return 'config.xml';
		}	

		/**
		* Tests that all the expected top level xml nodes are in place
		*
		* Doesn't impose that only nodes xyz be in place, it just makes sure
		* the known nodes ARE there
		*/		
		public function lintTestTopLevel($config)
		{
			$expected_top 	= array('modules','global','frontend','adminhtml','install','default','stores','admin','websites','crontab');
			$xml = simplexml_load_string($config->asXML()); // $config - Це теж по ходу головний файл конфігів мадженти і в уьому мали б бути ноди з масиву $expected_top. Тому тут вроді помилки не має
			$found_top 		= array();
			foreach($xml as $item)
			{
				$found_top[] = $item->getName();
			}

			//if one of the expected modules is missing, fail
			foreach($expected_top as $node)
			{
				if(!in_array($node, $found_top))
				{
					$this->fail('Could not find [&lt;' . $node . '/&gt;] at the top level. (in ' . 
					__METHOD__ . ' near line ' .
					__LINE__ . 
					')');
				}
			}
		}	

		/**
		* Classes in configs should be one of four types,
		* Models, Controllers, Blocks, Helpers
		*/
		public function lintClassType($config)
		{
			$allowed = array('controller','model','block','helper'); // Якщо сюди добавити ключ 'models', перестане ерорити
			$nodes = $config->xPath('//class');
			$errors = array();
			foreach($nodes as $node)
			{
				$str_node = (string) $node;
				if(strpos($str_node, '/') === false && strpos($str_node, '_') !== false)
				{
					$parts = preg_split('{_}',$str_node,4);					
					if(array_key_exists(2, $parts) && !in_array(strToLower($parts[2]), $allowed)) // Підпаде під цю помилку. На проекті у конфігах є нода <class> з значенням ItalianLocale_Info_Models. Models не підпадає під масив $allowed. В ідеалі мабуть треба було б змінити $allowed на Model
					{			
						$errors[] = "Invaid Type [$parts[2]] detected in class [$str_node]";
					}
				}
			}
			if(count($errors) >0)
			{
				$this->fail(implode("\n", $errors));
			}
			
		}
		
		/**
		* Tests that all classes are cased properly.  
		*		
		* This helps avoid __autoload problems when working 
		* locally on a case insensatie system
		*/		
		public function lintClassCase($config)
		{
			$nodes = $config->xPath('//class');			
			$errors = array();
			foreach($nodes as $node) // сюди може прийти значення ноди <class> catalogrule/observer. І це буде ерорити. Так як має бути такий вигляд catalogrule_observer щоб не ерорило. Але я не знаю чи це тільки для цього метода чи взагалі для мадженти
			{
				$str_node = (string) $node;
				if(strpos($str_node, '/') !== false)
				{
					if($str_node != strToLower($str_node))
					{
						$errors[] = 'URI ['.$str_node.'] must be all lowercase;'; 
					}
				}
				else if(strpos($str_node, '_') !== false)
				{
					$parts = preg_split('{_}',$str_node,4);
					foreach($parts as $part)
					{
						if(ucwords($part) != $part)
						{
							$errors[] = "Class [$str_node] does not have proper casing. Each_Word_Must_Be_Leading_Cased.";
						}
					}
				}
				else
				{
					$errors[] = 'Class ['.$str_node.'] doesn\'t loook like a class'; 
				}
			}
			
			if(count($errors) > 0)
			{
				$this->fail(implode("\n", $errors));
			}
		}
	}
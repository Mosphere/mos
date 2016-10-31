<?php 
namespace core;

/**
* 模板解析类
*/
class Parser
{
	private $content;
	function __construct($file)
	{
		$this->content = file_get_contents($file);
		if (!$this->content) {
			exit('Template file read failed');
		}
	}

	private function parVar()
	{
		$patter = '/\{\$([\w]+)(\[\'([\w]*)\'\])*\}/';
		//$patter='/\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}/';
		$patter = '/\{\$([\w]+)(\[\'([\w]*)\'\])*\}/';
		$repVar = preg_match($patter,$this->content);
		if ($repVar) {
			$this->content = preg_replace($patter,"<?php echo \$this->vars['$1']; ?>",$this->content);
		}
	}

	public function compile($parser_file){
		//$this->parVar();
		file_put_contents($parser_file,$this->content);
	}
}

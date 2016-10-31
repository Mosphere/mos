<?php 
namespace core;

use core\Config;
use core\Parser;
/**
* 视图类
*/
class View
{
	public $vars = [];

	function __construct($vars =[])
	{
		if (!is_dir(Config::get('cache_path')) || !is_dir(Config::get('compile_path')) || !is_dir(Config::get('view_path'))) {
			exit('The directory does not exist');
		}
		$this->vars = $vars;
	}

	public function display($pathFile)
	{
		extract($this->vars);
		$tpl_file = Config::get('view_path').$pathFile.Config::get('view_suffix');
		if (!file_exists($tpl_file)) {
			exit('Template file does not exist');
		}
		$arr = explode(DS,$pathFile);
		$file = $arr[1];
		if(!is_dir(Config::get('compile_path').md5($arr[0]))){
			mkdir(Config::get('compile_path').md5($arr[0]),0777);
		}
		$parser_file = Config::get('compile_path').md5($arr[0]).DS.$file.'.php';
		if(!is_dir(Config::get('cache_path').md5($arr[0]))){
			mkdir(Config::get('cache_path').md5($arr[0]),0777);
		}
		$cache_file = Config::get("cache_path").md5($arr[0]).DS.Config::get("cache_prefix").$file.'.html';
		if (Config::get('auto_cache')) {
			if (file_exists($cache_file) && file_exists($parser_file)) {
				if (filemtime($cache_file) >= filemtime($parser_file) && filemtime($parser_file) >= filemtime($tpl_file)) {
					return include $cache_file;
				}
			}
		}
		//将编译后的视图文件内容写入编译文件中并以html命名
		if (!file_exists($parser_file) || filemtime($parser_file) < filemtime($tpl_file)) {
			$parser = new Parser($tpl_file);
			$parser->compile($parser_file);
		}
		//将输出缓冲区的内容写入到缓存文件中
		include $parser_file;
		if (Config::get('auto_cache')) {
			$str = ob_get_contents();
			//echo $str;exit;
			file_put_contents($cache_file,ob_get_contents());
			ob_end_clean();
			return include $cache_file;
		}
	}
}
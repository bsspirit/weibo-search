<?php 
class FileService{

	public static function upload($temp,$dir,$file){
		FileService::mkdir($dir);
		move_uploaded_file($temp,$dir.$file);
	}

	public static function write($file,$data,$w='w'){
		$f = fopen($file, $w);
		fwrite($f, $data);
		fclose($f);
	}

	public static function writeCSV($file,$data=array(),$w='aw'){
		$f = fopen($file, $w);
		fputcsv($f, $data);
		fclose($f);
	}

	public static function mkdir($dir){
		if(!file_exists($dir)){
			mkdir($dir, 0755);
		}
	}

	public static function mkdirNow($dir,$time=null){
		if(empty($time)) $time=DateService::nowInt();
		$tmpDir = $dir.'/'.$time;

		if(!file_exists($tmpDir)){
			mkdir($tmpDir, 0755);
		}
		return $tmpDir.'/';
	}

	public static function ls($dir){
		if (file_exists($dir)){
			$args = func_get_args();
			$pref=count($args)>=2?$args[1]:'';

			$dh = opendir($dir);
			while($files = readdir($dh)){
				if (($files!=".")&&($files!="..")){
					if (is_dir($dir.$files)){
						$curdir = getcwd();
						chdir($dir.$files);
						$file = array_merge($file, FileService::ls("", "$pref$files/"));
						chdir($curdir);
					}
					else $file[]=$pref.$files;
				}
			}
			closedir($dh);
		}		
		return $file;
	}
	
	public static function dirZip($dir,$outDir=null,$outName="data.zip"){
		$zip = new ZipArchive();
		if(empty($outDir)) $outDir=$dir; 
		$filename = $outDir.$outName;
		//echo $filename.'<br/>';
	
		if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
			exit("cannot open <$filename>\n");
		}
	
		$files = FileService::ls($dir);
		foreach($files as $f){
			//print_r('==>'.$dir.$f.'<br/>');
			$zip->addFile($dir.$f,$f);
		}
		
		$zip->addFile("metadata/readme.txt",'readme.txt');
		//$zip->addFromString("readme.txt", "#Author:@Conan_Z\n#Email:bsspirit@gmail.com\n#http://www.fens.me\n\n");
		$zip->close();
		return $filename;
	}
	
// 	public static function fileZip($file){
// 		$zip = new ZipArchive();
	
// 		$filename = $loc."data_".time().".zip";
// 		if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
// 		exit("cannot open <$filename>\n");
// 		}
	
// 		$zip->addFile($file,$file);
// 		$files = FileService::ls($loc);
	
// 		#$zip->addFromString("readme.txt", "#1 This is a test string added as testfilephp.txt.\n");
// 		$zip->close();
// 	}

}
?>
<?php
require 'vendor/autoload.php';

    // Initiate scrapper
   /* $scrap_client = new \Zrashwani\NewsScrapper\Client();    
    print_r($scrap_client->getLinkData('http://www.farsnews.com/newstext.php?nn=13951022000387'));
	*/
	/*$dom = phpQuery::newDocument(
  mb_convert_encoding(
    file_get_contents('page.html'), 'HTML-ENTITIES', "UTF-8"
  )
);*/

//$dom = phpQuery::newDocument("<div id='a'>asd</div>");
//echo pq('#a')->text();
//echo $dom->text();

$detect = LanguageDetector\Detect::initByPath('language.php');

$lang = $detect->detect("Agricultura (-ae, f.), sensu latissimo, 
est summa omnium artium et scientiarum et technologiarum quae de 
terris colendis et animalibus creandis curant, ut poma, frumenta, 
charas, carnes, textilia, et aliae res e terra bene producantur. 
Specialius, agronomia est ars et scientia quae terris colendis student, 
agricultio autem animalibus creandis.");

var_dump($lang);

die();
use Graby\Graby;

//$article = 'http://www.farsnews.com/newstext.php?nn=13951022000387';
$article = 'http://www.entekhab.ir/fa/news/316191';

$graby = new Graby();
$result = $graby->fetchContent($article);

print_r($result);
$text = $result['html'];

$text = phpQuery::newDocument($text);
$text = $text->text();

$summaryTool = new \DivineOmega\PHPSummary\SummaryTool('', $text);

$summary = $summaryTool->getSummary();
echo '<br>-----------------------------<br>';
echo $summary;
echo '<br>-----------------------------<br>';
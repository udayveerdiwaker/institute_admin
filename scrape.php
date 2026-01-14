<?php
include('config.php');
function convert_url($url){
    $url = substr($url,0,4)=='http'? $url: 'http://'.$url;
    $d = parse_url($url);
    $tmp = explode('.',$d['host']);
    $n = count($tmp);
    if ($n>=2){
        if ($n==4 || ($n==3 && strlen($tmp[($n-2)])<=3)){
            $d['domain'] = $tmp[($n-3)].".".$tmp[($n-2)].".".$tmp[($n-1)];
            $d['domainX'] = $tmp[($n-3)];
        } else {
            $d['domain'] = $tmp[($n-2)].".".$tmp[($n-1)];
            $d['domainX'] = $tmp[($n-2)];	
        }
    }
	$sub=str_replace('/',' › ',$d['path']);
	$querys="";
	if(!empty($d['query'])){
		$querys='?'.$d['query'];
	}
	//return $d['scheme'].'://'.$d['host'].'<span>'.$sub.$querys.'</span>';
	return $d['scheme'].'://'.$d['host'];
    //return $d;
}
//ini_set('display_errors',0);
//ini_set('erroe_reporting',0);
   function get_data($url,$useTor) {
       $value=getClientIP();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
   CURLOPT_HTTPHEADER => array(
        'X-Forwarded-For: '.$value,
        'X-source-site: onionland.io'
       )
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
   }
   //9719272444

	function get_result_from_onionland($keyword,$page=1){
		$useTor = 0; // 1 - use TOR | 0 - do not use TOR
		//$url="https://onionlandsearchengine.net/search?page=".$page."&q=".$keyword; 
		//$url="https://feed.torry.io/api/v1/query/onion/search/?page=".$page."&query=".$keyword;
		//$url="http://18.144.95.141:8000/search/?page=".$page."&q=".$keyword;
		$url="http://onion.tordex.to/search/?page=".$page."&q=".$keyword;
		$html_str = get_data($url,$useTor);
		
		$resultss=json_decode($html_str,true);
		//include_once('simplehtmldom/simple_html_dom.php');
		
		$result=$resultss['search_results'];

		//$html = str_get_html($html_str);
		$a=0;
	 

 
 
    $blocked = ['cp','child porn cp','child porn','child pornography'];
$keyword_striped=urldecode($keyword);
    foreach ($blocked as $b) {
        if (stripos($keyword_striped, $b) !== false) {
			//echo $b;
		//	exit();
            $result=array();
            
        }
    }

		if(count($result)>0){
			foreach($result as $found) {
				$data=array();
				$a++;    

				$data['href']= $found['url'];
				$data['title']= $found['title'];
				$data['description']= $found['content'];
				/* $title= $found->find('.title a',0);
				$data['title']=trim($title->plaintext);
				$linknew=$found->find('.link',0);
				
				
				if (strpos(trim($linknew->plaintext), 'Ad') === 0) {
					continue;
				}
				$cleanLink=str_replace('Ad','',trim($linknew->plaintext));
				$data['href']= trim($cleanLink);
				$data['description']= trim($found->find('.desc',0)->plaintext); */
				
				$all_data[]=$data;
			}
		}else{
			$all_data=array();
		}
		/* $html->clear();
		unset($html); */
		//print_r($all_data); die;
		return $all_data;  
	}

  if(isset($_REQUEST['q']) && $_REQUEST['q']!=''){

	$page=(isset($_REQUEST['page']) and !empty($_REQUEST['page']) and is_numeric($_REQUEST['page']))?$_REQUEST['page']:0;
	 $onionland_data=get_result_from_onionland(urlencode($_REQUEST['q']),$page);

	 if(count($onionland_data)>0){?>


<?php
			  $i=1; foreach($onionland_data as $result) {$prefixUrl=""; ?>


<div class="row">
    <div class="col-sm-12">
        <div class="result-block">
            <div class="title">
                <a data-category="text-result" target="_blank" data-action="position" data-label="1/1"
                    href="<?=$prefixUrl.($result['href']) ?>" class="onionRecord" rel="nofollow">
                    <?=substr($result['title'],0,65 ); ?>
                </a>
            </div>
            <div class="link">
                <?=$prefixUrl.($result['href']) ?>
            </div>

            <?php // substr($result['description'],0,180 ); ?>
            <div class="desc"><?= substr($result['description'],0,180); ?></div>
        </div>
    </div>
</div>

<?php
			   $i++; }
			  ?>

<?php }else{
		 
		 if($page==1){
			  echo '<div>No Result Found</div>';
		 }else{
			 echo '<div>Not Have More Results</div>';
		 }
	 }
   }
   
?>
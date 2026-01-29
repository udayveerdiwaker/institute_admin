<?php
//include('config.php');

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
	return $d['scheme'].'://'.$d['host'];
    
}

   function get_data($url,$useTor) {
   $username="allmachines";
	$password="Oxy18031983";

	$proxy = 'pr.oxylabs.io:7777';
	$query = curl_init($url);
	curl_setopt($query, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($query, CURLOPT_PROXY, "http://$proxy");
	curl_setopt($query, CURLOPT_PROXYUSERPWD, "customer-$username:$password");
	$output = curl_exec($query);
	curl_close($query);
	if ($output){
		return $output;
	}
   }
   
    function get_Client_IP() {
        $ip = $_SERVER['REMOTE_ADDR']; // Always set by server
        
        // Check for shared internet/ISP IP
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } 
        // Check for IPs passing through proxies
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // HTTP_X_FORWARDED_FOR can be a comma-separated list
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($ipList[0]); // First IP in the list is original client
        }
        
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : $_SERVER['REMOTE_ADDR'];
    }
  
	
	
	
	function get_data_post($keyword,$page=1) {
        $value=get_Client_IP();
        $url="https://feed.torry.io/api/v1/query/search/";
        $para['page']=$page;
        $para['page_size']=21;
		$para['q']=$keyword;
        $para['category']='category_images';

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		 CURLOPT_POSTFIELDS =>json_encode($para),
		  CURLOPT_HTTPHEADER => array(
            'X-Forwarded-For: '.$value,
            'X-source-site: onionland.io',
			'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
        $results=json_decode($response,true);

		curl_close($curl);
		return $results['results'];
    }




  if(isset($_REQUEST['q']) && $_REQUEST['q']!=''){ 

        $page=(isset($_REQUEST['page']) and !empty($_REQUEST['page']) and is_numeric($_REQUEST['page']))?$_REQUEST['page']:0;
        $onionland_data=get_data_post(urlencode($_REQUEST['q']),$page);
        ?>
           
          
        <?php $i=1;
           if(!empty($onionland_data)){        
                foreach ($onionland_data as $result) {$prefixUrl=""; 
        ?>		  
            <div class="flex-item">
                <a class="image-anchor" href="<?=$result['url']; ?>" target="a_blank">
                    <!--<img src="<?=$result['img_src']; ?>"  style="width: 250px;"/>-->
                    <img src="<?=$result['thumbnail_src']; ?>"  style="width: 250px;"/>
                </a>
                
            </div>
        <?php $i++; } ?>
        
        <?php 
            } else {
                if($page==1){
                    echo '<div>No Result Found</div>';
                }else{
                    echo '<div>Not Have More Results</div>';
                }
            }
    }
	 
   
?>
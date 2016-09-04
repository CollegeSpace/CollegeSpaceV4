<?php

  require_once("relative_time.php");
  $url="http://updates.collegespace.in/wp-json/posts?filter[posts_per_page]=6";

  $context = stream_context_create([
        "http" => [
          "method" => "GET",
          ]
        ]);

  $json=file_get_contents($url,false,$context);

  if($json)
  {
    $result=json_decode($json);
    //var_dump($result);

    for($x=0;$x<6;$x++)
    {
      $data=$result[$x];
      //var_dump($data);
      // $doc = new DOMDocument();
      //$doc->loadHTML($data->content);
      $data->content = preg_replace("/<img[^>]+\>/i", "", $data->content);
      $data->content = preg_replace("/<table[^>]*>.*?<\/table>/s", "", $data->content);
      $data->content=strip_tags($data->content);
      $data->content=trim($data->content);
      $data->content=substr($data->content,0,150);
      if(strlen($data->content)==0)
        $data->content="No description available.";
      $rel_time=time2str($data->date);
      echo"<article class=\"post post_mod-a clearfix wow \" data-wow-duration=\"1s\">
                    <div class=\"entry-main\">
                      <div class=\"entry-meta\"> <span class=\"entry-autor\"> <span>By </span> <a class=\"post-link\" href=\"javascript:void(0);\">CollegeSpace,NSIT</a> </span>
                      <br><span class=\"entry-date\"><a href=\"javascript:void(0);\">{$rel_time}</a></span> </div>
                      <h3 class=\"entry-title ui-title-inner decor decor_mod-b\"><a href={$data->link}>{$data->title}</a></h3>
                      <div class=\"entry-content\">
                        <p>{$data->content} <a href={$data->link}>Read More.</a></p>
                        <p></p>
                      </div>
                    </div>
          </article>";
    }
  }
  else
    printf("Error in processing request.");
?>
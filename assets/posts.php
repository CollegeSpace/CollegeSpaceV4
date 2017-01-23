 <?php

  require_once("relative_time.php");
  $url="http://nsitpedia.collegespace.in/wp-json/posts?filter[posts_per_page]=3";

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

    for($x=0;$x<3;$x++)
    {
      $data=$result[$x];
      $data->content = preg_replace("/<img[^>]+\>/i", "", $data->content);
      $data->content = preg_replace("/<table[^>]*>.*?<\/table>/s", "", $data->content);
      $data->content=strip_tags($data->content);
      $data->content=trim($data->content);
      $data->content=substr($data->content,0,250);
      if(strlen($data->content)==0)
        $data->content="No description available.";
      $rel_time=time2str($data->date);

      if($data->featured_image==NULL||$data->featured_image->guid==NULL)
      {
        $image="assets/img/logo_256x256.png";  //if image not present in the post
      }
      else
      {
        $image=$data->featured_image->guid;
      }

      $html="
          <article class=\"post post_mod-b clearfix wow \" data-wow-duration=\"1s\">
            <div class=\"entry-media\">
            <div class=\"entry-thumbnail\"> <a href= %s ><img class=\"img-responsive\" src= %s alt=\"NsitPedia\"/></a> </div>
            </div>
            <div class=\"entry-main\">
            <div class=\"entry-meta decor decor_mod-a\"> <span class=\"entry-autor\"> <span>By </span> <a class=\"post-link\" href= %s >%s,NsitPedia</a> </span>
            <br><span class=\"entry-links entry-time_mod-a\"><i class=\"icon stroke icon-Agenda\"></i> %s </span>
            </div>
            <h3 class=\"entry-title ui-title-inner\"><a href= %s > %s </a></h3>
            <div class=\"entry-content\">
              <p>%s...</p>
            </div>
            <div class=\"entry-footer\"><a href= %s class=\"post-btn btn btn-primary btn-effect\">READ MORE</a></div>
            </div>
          </article>
          <!-- end post -->";

      $content=sprintf($html,$data->link,$image,$data->meta->links->author,$data->author->name,$rel_time,$data->link,$data->title,$data->content,$data->link);
      $json_data[]= array("content" => $content);
    }
  echo json_encode($json_data);
  }
  else
    echo json_encode(array("error"=> "Error in processing request."));
?>

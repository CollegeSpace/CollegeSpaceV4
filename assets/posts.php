 <?php

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
            //var_dump($data);
            // $doc = new DOMDocument();
            //$doc->loadHTML($data->content);
            // $img_src;
            // $img_tag;$img;
            // if(preg_match("/<img[^>]+\>/i",$data->content,$img_tag))
            // {
            //   preg_match('/\<img.+src\=(?:\"|\')(.+?)(?:\"|\')(?:.+?)\>/',$img_tag[0],$img);
            //   $img_src=$img[1];
            // }
             // var_dump($img_src);
            $data->content = preg_replace("/<img[^>]+\>/i", "", $data->content); 
            $data->content = preg_replace("/<table[^>]*>.*?<\/table>/s", "", $data->content); 
            $data->content=strip_tags($data->content);
            $data->content=trim($data->content);
            $data->content=substr($data->content,0,250);
            if(strlen($data->content)==0)
              $data->content="No description available.";
            $data->date = preg_replace("/T/i", " ", $data->date); 
            echo"
                <article class=\"post post_mod-b clearfix wow \" data-wow-duration=\"1s\">
                  <div class=\"entry-media\">
                  <div class=\"entry-thumbnail\"> <a href=\"javascript:void(0);\" ><img class=\"img-responsive\" src={$data->featured_image->guid} alt=\"NsitPedia\"/></a> </div>
                  </div>
                  <div class=\"entry-main\">
                  <div class=\"entry-meta decor decor_mod-a\"> <span class=\"entry-autor\"> <span>By </span> <a class=\"post-link\" href={$data->meta->links->author}>{$data->author->name},NsitPedia</a> </span> 
                  <br><span class=\"entry-links entry-time_mod-a\"><i class=\"icon stroke icon-Agenda\"></i>{$data->date}</span> 
                  </div>
                  <h3 class=\"entry-title ui-title-inner\"><a href={$data->link}>{$data->title}</a></h3>
                  <div class=\"entry-content\">
                    <p>{$data->content}...</p>
                  </div>
                  <div class=\"entry-footer\"><a href={$data->link} class=\"post-btn btn btn-primary btn-effect\">READ MORE</a></div>
                  </div>
                </article>
                <!-- end post -->";
          }
          }
          else
            printf("Error in processing request.");

        ?>   
<?php include("assets/functions.php") ?>
<?php
//var_dump($xml->item->content[0]);
//header('Content-Type: text/plain');

//echo $a[0];
//echo "</br>";

function GetScore($content, $query, $scoreAddition = 10)
{
  $query = strtolower($query);
  $content = strtolower($content);
  $words = explode(" ", $query);
  $score = 0;
  foreach ($words as $word)
  {
    if (strpos($content, $word) !== false) {
      $score += $scoreAddition;
    }
  }
  return $score;
}

function getXMLData()
{
  if(isset($_GET["branch"]))
    $branch = $_GET["branch"];
  else
    $branch = "ice"; //most students in ice, so most probable.

  if($branch == "coe")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_228_news_list.xml';
  else if($branch == "it")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_231_news_list.xml';
  else if($branch == "ece")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_229_news_list.xml';
  else if($branch == "ice")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_230_news_list.xml';
  else if($branch == "mpae")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_232_news_list.xml';
  else if($branch == "bt")
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_233_news_list.xml';
  else
  {
    $xmllink = 'http://test.collegespace.in/pad-notes/flashmo_230_news_list.xml';
    $branch = "ice";
  }

  $doc = new DOMDocument();
  $doc->load($xmllink);
  return $doc;
}


function getNotesList($doc, $semNum)
{
  $dump = $doc->textContent;
  $sem1 = explode("Semester ".$semNum." </span>", $dump);
  $semDump = $sem1[1];
  $paraDump = explode("<p align = 'justify'>", $semDump);
  $aDump = explode("</p>", $paraDump[1])[0];
  $alist = explode('</a>', $aDump);
  //print_r($alist);
  $list = array();
  foreach ($alist as $a) {
    $a = trim($a);
    if(strlen($a) >  0)
    {
      $ahref = $a."</a>";
      $link = explode("'", $ahref)[1];
      $name = explode("<",explode(">", $ahref)[1])[0];
      $list[$name] = $link;
      //$axml = new SimpleXMLElement($ahref);
    }
  }
  return $list;
}

if(isset($_GET['query']))
{
  if(strlen($_GET['query'])>0)
  {
    $flag = 1;
    $query = $_GET['query'];
    $doc = getXMLData();

    if(isset($_GET['sem']))
      $sem = $_GET['sem'];
    else
      $sem = 1;

    $NotesList = getNotesList($doc, $sem);
    $searchResult = array();
    foreach($NotesList as $name => $link)
      if(GetScore($name, $query) > 9)
        $searchResult[$name] = $link;

    if(count($searchResult) == 0)
    {
      $flag = 2;
    }
  }
  else
  {
    header('Location: ./?error');
  }
}
else
{
  header('Location: ./?error');
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head><?php PrintHeadMetadata("CollegeSpace | Search Page"); ?></head>
<body>
<!-- Loader -->
<!--<div id="page-preloader"><span class="spinner"></span></div>-->
<!-- Loader end -->
<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200">
<!-- UI Author : Chaitanya Dwivedi -->
  <div id="wrapper">
    <!-- HEADER -->
    <?php include ("assets/header.php"); ?>
    <!-- end header -->
    <div id="spacing">
</div>
    <div class="main-content">
      <div id="search-results">
        <div class="list-group" id="search-item">
            <?php
            if($flag != 0)
            {
              if($flag == 1)
              {
                foreach($searchResult as $name => $link)
                {
            ?>
            <a href="<?php echo $link; ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?php echo $name; ?></h4>
          </a>
          <?php
          }
          }
          else
          {
            ?>
            <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">No results.</h4>
            <p class="list-group-item-text"><h6>No results were found for your query, please check the spelling and try again.</h6></p>
          </a>
          <?php
          }
        }
        else
        {
          ?>
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">No query.</h4>
            <p class="list-group-item-text"><h6>Type in a query to search for it.</h6></p>
          </a>
          <?php
        }
?>
</div>
      </div>
    </div>
  </div>
  <!-- end wrapper -->
</div>
<!-- end layout-theme -->
<?php include ("assets/footer.php");?>
<script type="text/javascript">
    var query = "<?php echo $query; ?>";
    document.getElementById("search").value = query;
</script>
</body>
</html>
<?php

$rss = simplexml_load_file("feed.rss");

$items = $rss->xpath('//channel/item');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $pubDate = $_POST['pubDate'];
    
    if (count($items) == 5) {
        unset($rss->channel->item[0]);
    }
    
    
    $item = $rss->channel->addChild("item");
    $item->addChild("title", $title);
    $item->addChild("description", $description);
    $item->addChild("author", $author);
    $item->addChild("link", $link);
    $item->addChild("pubDate", date("Y-m-d"));
    
    
    $rss->saveXML("feed.rss");
    $items = $rss->xpath('//channel/item');
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RSS feed</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Lab 5</h1>
            <form method="POST" action="index.php">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" />
                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="text" class="form-control" id="link" name="link" />
                </div>
                <div class="form-group">
                    <label for="author">author</label>
                    <input type="text" class="form-control" id="author" name="author" />
                </div>
                <div class="form-group">
                    <label for="pubDate">pubDate</label>
                    <input type="text" class="form-control" id="pubDate" name="pubDate" />
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Submit" />
            </form>
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>Link</td>
                    <td>Author</td>
                    <td>Pub Date</td>
                    <td>Description</td>
                </tr>
                <?php foreach($items as $article) {?>
                <tr>
                    <td><?=$article->title?></td>
                    <td><a href="<?=$article->link?>" target="_blank"><?=$article->link?></a></td>
                    <td><?=$article->author?></td>
                    <td><?=$article->pubDate?></td>
                    <td><?=$article->description?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
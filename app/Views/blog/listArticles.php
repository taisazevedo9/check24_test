<?php
foreach($this->data['articles'] as $article){
    extract($article);
    echo "<hr>";
    echo "id:".$article['id']."<br>";
    echo "titulo:".$article['title']."<br>";
    echo "content:".$article['content']."<br>";
    echo "<hr>";
}

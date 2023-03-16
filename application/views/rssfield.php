<!DOCTYPE html>
<html>
  <head>
    <title>Blog List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>/* Set default font family and size */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
}

/* Style the header section */
header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

header h1 {
  margin: 0;
  font-size: 36px;
}

header nav {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

header nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

header nav li {
  display: inline-block;
  margin: 0 10px;
}

header nav a {
  color: #fff;
  text-decoration: none;
  font-size: 20px;
}

/* Style the blog list container */
.blog-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin: 30px;
}

/* Style individual blog posts */
article {
  background-color: #f5f5f5;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin: 20px;
  max-width: 400px;
  padding: 20px;
  text-align: justify;
}

article h2 {
  margin-top: 0;
}

article time {
  font-style: italic;
  font-size: 14px;
}

article img {
  display: block;
  margin: 10px auto;
  max-width: 100%;
}

article p {
  margin-bottom: 20px;
  line-height: 1.5;
}

article a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
}

article a:hover {
  text-decoration: underline;
}

/* Style the footer section */
footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

footer p {
  margin: 0;
}
</style>
  </head>
  <body>
    <header>
      <h1>Blog List</h1>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
    <div class="blog-list">
      <?php foreach($data as $news):?>
      <article>
        <h2><?=$news['title']?></h2>
        <p>Published on <time datetime="2023-03-15"><?=$news['pubDate']?></time> by <?=$news['category']?></p>
        <img src="<?=$news['media_url']?>" alt="Post Thumbnail">
        <p><?=$news['description']?></p>
        <a href="<?=$news['link']?>">Read more</a>
      </article>
      <?php endforeach;?>
      <!-- Add more blog posts as needed -->
    </div>
    <footer>
      <p>Copyright © 2023 Blog List</p>
    </footer>
  </body>
</html>

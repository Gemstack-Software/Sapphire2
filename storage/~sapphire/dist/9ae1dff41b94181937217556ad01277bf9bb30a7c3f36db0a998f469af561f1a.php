<div>
 <div class="top-region">
 <?php echo $component->Component('src.components.Elements.Header', []); ?>
 <a href="/app">App</a>
 </div>
 <hr>
 <div class="posts-region">
 <h4>Posts</h4>
 <br>
 <div> 
 <?php foreach( $component->Store("posts") as $post): ?>
 <div class="post">
 <img src="<?php echo $post['image']; ?>" alt="">
 <h2><?php echo $post["title"]; ?></h2>
 <p>
 <?php echo $post["content"]; ?>
 </p>
 </div>
 <?php endforeach; ?>
 </div>
 </div>
</div>
<style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'); * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; } body { background: #0e3652; color: #fff; } [unique="<?php echo $component->GetUnique(); ?>"] [class$="region"] { padding: 20px; }</style>
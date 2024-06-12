<container>
 <div>
 <h1 class="title">News!</h1>
 <?php foreach( $component->Store("news") as $newsItem): ?>
 <?php echo $newsItem; ?>
 <?php endforeach; ?>
 </div>
</container><style>@import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap'); * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Unbounded', sans-serif; } body { background: #0e3652; color: #eee; height: 100vh; padding: 32px; } [unique="<?php echo $component->GetUnique(); ?>"] .title { font-size: 56px; }</style>
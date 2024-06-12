<container>
 <div>
 <h1 class="title">Hello, world!</h1>
 <button acid4="ddf55f1bf1e2edf05232e268211f9bcd" 
 asc-scope="<?php echo $component->GetUnique(); ?>" 
 @click=".Increment">
 +
 </button>
 </div>
</container><style>@import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap'); * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Unbounded', sans-serif; } body { background: #0e3652; color: #eee; height: 100vh; padding: 32px; } [unique="<?php echo $component->GetUnique(); ?>"] .title { font-size: <?php echo $component->Store("style:fontSize"); ?>%; } [unique="<?php echo $component->GetUnique(); ?>"] button { padding: 8px 24px; margin-top: 64px; border: 0; outline: 0; background: #0002; color: #eee; font-size: 32px; cursor: pointer; }</style>
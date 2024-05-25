<div class="app-root">
 <div class="app-topbar">
 <h1>Welcome into the Sapphire's World!</h1>
 <a href="/about" role="button">More about Sapphire</a>
 </div>
 <hr />
 <div class="app-body">
 <label for="">Please tell us, what is your name?</label>
 <input acid4="ddf55f1bf1e2edf05232e268211f9bcd"
 class="input"
 type="text"
 value="<?php echo $component->Store("Name") ?>"
 asc-scope="<?php echo $component->GetUnique(); ?>"
 @input=".ChangeValue">
 </div>
 <hr />
 <div class="app-result">
 <?php foreach( [0,0,0,0,0] as $item): ?>
 <div class="app-result__item">
 <strong><?php echo $component->Store("Name") ?></strong> is <?php echo $component->Component('src.components.Gender', ['name'=>$component->Store("Name")]); ?>
 </div>
 <?php endforeach; ?> 
 </div>
</div>
<style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'); * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; } [unique="<?php echo $component->GetUnique(); ?>"] .app-root { background: #1f2020; color: #eee; height: 100vh; } [unique="<?php echo $component->GetUnique(); ?>"] .app-topbar, [unique="<?php echo $component->GetUnique(); ?>"] .app-body, [unique="<?php echo $component->GetUnique(); ?>"] .app-result { padding: 20px; } [unique="<?php echo $component->GetUnique(); ?>"] input { background: #0002; color: #fff; border-radius: 4px; border: 0; outline: 0; padding: 12px 16px; } [unique="<?php echo $component->GetUnique(); ?>"] .app-result__item { margin-bottom: 8px; }</style>
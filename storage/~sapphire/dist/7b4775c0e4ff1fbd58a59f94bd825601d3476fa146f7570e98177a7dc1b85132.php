<span>
 <?php echo $component->Store("Gender") ?> 
 <button acid4="ddf55f1bf1e2edf05232e268211f9bcd" asc-scope="<?php echo $component->GetUnique(); ?>" @click=".ReportMistake">
 <?php if( !$component->Store("Fixed")): ?> Any mistake? 
 <?php else: ?> Fixed!
 <?php endif; ?>
 </button>
</span>
<style>[unique="<?php echo $component->GetUnique(); ?>"] button { background: <?php if( $component->Store("Fixed")): ?> rgb(116, 255, 106) <?php else: ?> rgb(255, 66, 66) <?php endif; ?>; color: #fff; border: 0; outline: 0; border-radius: 8px; padding: 8px 12px; cursor: pointer; }</style>
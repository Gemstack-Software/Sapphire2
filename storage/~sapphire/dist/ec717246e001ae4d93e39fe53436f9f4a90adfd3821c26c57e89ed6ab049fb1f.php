:component button {
 background: <?php if( $component->Store("Fixed")): ?> rgb(116, 255, 106) <?php else: ?> rgb(255, 66, 66) <?php endif; ?>;
 color: #fff;
 border: 0;
 outline: 0;
 border-radius: 8px;
 padding: 8px 12px;
 cursor: pointer;
}
	<footer class="main-footer">
    	<div class="form-group">
        	<div class="text-center">
			<strong>&COPY; 
			<?php
				// echo date('Y'); 
				echo anchor('http://projectengeneer.wixsite.com/dentistware', '    Dentistware.', 'target="_blank"');
				echo (ENVIRONMENT !== 'production') ? 'Generado en <strong>{elapsed_time}</strong> CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : ''
			?>
			</strong>
            </div>
            <div class="text-center">
            <?php 
            	$anchor = array(
            			'target' => '_blank',
            			'style' => 'color: #3B5998; margin-left: 4px;',
            	);
            	echo anchor('#', '<li class="fa fa-facebook-square fa-2x"></li>', $anchor);
            	echo nbs(2);
            	echo anchor('#', '<li class="fa fa-twitter-square fa-2x"></li>', 'target="_blank"');            	            
            ?>
            </div>
        </div>
    </footer>
    </div>
	<?php 
		echo plugin_js();
		echo plugin_js('bootstrap');
		echo plugin_js('fastclick');
		echo plugin_js('app');
		echo plugin_js('pace');
		
		echo $before_closing_body;		
	?>
</body>
</html>
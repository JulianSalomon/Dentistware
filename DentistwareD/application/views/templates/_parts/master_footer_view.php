	<footer class="main-footer">
    	<div class="form-group">
        	<div class="text-center">
			<strong>&COPY; 
			<?php
				echo date('Y'); 
				echo anchor(base_url(), '    Dentistware.', 'target="_blank"');
			?>
			</strong>
            </div>
            <div class="text-center">
            <?php 
            	$anchor = array(
            			'target' => '_blank',
            			'style' => 'color: #3B5998; margin-left: 4px;',
            	);
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
        echo plugin_js('datepicker');
        echo plugin_js('datatable');
        echo plugin_js('datatable-bootstrap');
        echo plugin_js('sweetalert');
        echo $before_closing_body;
	?>
</body>
</html>
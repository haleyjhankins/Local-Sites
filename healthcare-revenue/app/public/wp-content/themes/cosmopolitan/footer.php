 
        <!-- BEGIN FOOTER -->
        <div class="clearnospacing"></div>
        <footer class="footer">
            <section class="container_12">
            <div class="footer_shadow_box"></div>		
                <?php
                    $al_options = isset($_POST['options']) ? $_POST['options'] : get_option('al_general_settings');
                    $footer_widget_count = isset($al_options['al_footer_widgets_count']) ? $al_options['al_footer_widgets_count']:4;
                    for($i = 1; $i<= $footer_widget_count; $i++){
                        echo  '<div class="grid_3 nomargin addpadding fbw">';
                            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget ".$i) ) :endif;
                        echo '</div>';
                    }			
                ?>
                <div class="clearnospacing"></div>     
            </section>   
        </footer>
        <div class="bottombar">
            <a href="#top" class="toTop" id="top-link"></a>
            <div class="container_12">
                <section class="grid_copyright">
                    <div class="copyright"><?php echo $al_options['al_copyright']?></div>
                </section>
                <section class="grid_8">
                   <div class="alignright"><?php  echo do_shortcode($al_options['al_footerinfo']);?></div>
                </section>        
            </div>
            <div class="clearnospacing"></div>	
        </div> 
<!-- END FOOTER -->

	</div>
</div>   
<?php wp_footer()?>
<?php //include ('optionspanel.php') ?>
</body>
</html>
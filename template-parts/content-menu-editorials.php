<ul class="list-unstyled d-flex mb-0">

    <?php
        $link_pattern = get_field( 'link_padrao_portal', 'option' );
        $menu_post_link = $link_pattern . get_field( 'link_da_editorias', 'option');
        $request_posts = wp_remote_get( $menu_post_link );

        if(!is_wp_error( $request_posts )) :
            $body = wp_remote_retrieve_body( $request_posts );
            $data = json_decode( $body );
            $status = false;

            if(!is_wp_error( $data )) :
                foreach( $data as $rest_post ) :
    ?>
	                <li 
                    class="d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->portal_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->portal_link_menu_editorias; ?>"
                        title="Home">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->portal_icone_menu_editorias; ?>"
                            alt="Home">
                        </a>
                    </li>
	
                    <li 
                    class="l-top__menu__item d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->institucional_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->institucional_link_menu_editorias; ?>"
                        title="Inspetoria">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->institucional_icone_menu_editorias; ?>"
                            alt="Inspetoria">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->paroquia_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->paroquia_link_menu_editorias; ?>"
                        title="Paróquia">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->paroquia_icone_menu_editorias; ?>"
                            alt="Paróquia">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->ensino_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->ensino_link_menu_editorias; ?>"
                        title="Ensino">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->ensino_icone_menu_editorias; ?>"
                            alt="Ensino">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item  d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->pastoral_juvenil_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->pastoral_juvenil_link_menu_editorias; ?>"
                        title="Pastoral Juvenil">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->pastoral_juvenil_icone_menu_editorias; ?>"
                            alt="Pastoral Juvenil">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->animacao_vocacional_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->animacao_vocacional_link_menu_editorias; ?>"
                        title="Animação Vocacional">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->animacao_vocacional_icone_menu_editorias; ?>"
                            alt="Animação Vocacional">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->obras_sociais_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->obras_sociais_link_menu_editorias; ?>"
                        title="Obras Sociais">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->obras_sociais_icone_menu_editorias; ?>"
                            alt="Obras Sociais">
                        </a>
                    </li>

                    <li 
                    class="l-top__menu__item active d-flex justify-content-center align-items-center px-2"
                    style="background-color: <?php echo $rest_post->grafica_cor_de_fundo_menu_editorias; ?>">
                        <a 
                        class="text-decoration-none"
                        href="<?php echo $rest_post->grafica_link_menu_editorias; ?>"
                        title="Gráfica">
                            <img
                            class="img-fluid"
                            src="<?php echo $rest_post->grafica_icone_menu_editorias; ?>"
                            alt="Gráfica">
                        </a>
                    </li>
    <?php       endforeach;
            endif; 
        endif; 
    ?>
</ul>
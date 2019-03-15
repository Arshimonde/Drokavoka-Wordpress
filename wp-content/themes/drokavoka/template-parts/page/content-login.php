<div class="bg_color_2">
    <div class="container margin_60_35">
        <div id="login">
            <h1><?php the_title()?></h1>
            <div class="box_form">
                <form  id="login-form">
                    <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a>
                    <a href="#0" class="social_bt google">Login with Google</a>
                    <a href="#0" class="social_bt linkedin">Login with Linkedin</a>
                    <div class="divider"><span>Or</span></div> -->
                    <div class="form-group">
                        <input type="email" class="form-control" name="email"
                            placeholder="<?=_e("Votre adresse email")?>"
                        >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password"
                            placeholder="<?=_e("Votre mot de passe")?>"
                        >
                    </div>
                    <a href="<?=esc_url( wp_lostpassword_url() ); ?>">
                        <small><?=_e("mot de passe oublié?")?></small>
                    </a>
                    <div class="form-group text-center add_top_20">
                        <input id="login-submit" class="btn_1 medium" type="submit" 
                            value="<?=_e("S'identifier")?>"
                        >
                    </div>
                </form>
            </div>
            <p class="text-center link_bright">
               <?=_e(" Vous n'avez pas encore de compte? ")?>
                <a href="#0">
                    <strong><?=_e("Inscrire maintenant!")?></strong>
                </a>
            </p>
        </div>
        <!-- /login -->
    </div>
</div>
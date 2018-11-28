<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="hero navbar-brand is-centered">
        <a href="http://<?php echo APP_HOST; ?>" class="navbar-item">
          <img src="http://<?php echo APP_HOST; ?>/public/imgs/logo-cog.png"  height="128" alt="Ícone de ativação de alto contraste">
          <p class = "is-size-4" style="padding-bottom:2px; padding-left:6px;">
             <label data-tag="logo"> </label>
          </p>
        </a>
    </div>

    <div class="navbar-end">
        <div class='navbar-item has-dropdown is-hoverable'>
            <a class='navbar-link has-text-grey-light'>
                <p data-tag="idiomas"></p> 
            </a>
            <div class='navbar-dropdown is-right'>
                <a class='navbar-item'  href="http://<?php echo APP_HOST; ?>/home/ptbr">
                    <p class='content has-text-grey-light'>
                        <p data-tag="portugues"></p>
                    </p>
                </a>
                <a class='navbar-item'  href="http://<?php echo APP_HOST; ?>/home/en">
                    <p class='content has-text-grey-light'>
                        <p data-tag="ingles"></p>
                    </p>
                </a>
                </form>
            </div>
        </div>

        <div class='navbar-item has-dropdown is-hoverable <?php  if (!$_SESSION['logado']) echo "is-hidden"; ?>'>
            <a class='navbar-link has-text-grey-light'>
                <p data-tag="bemvindo"> </p>  <?php echo "&nbsp" . $_SESSION['usuario']?>
            </a>
            <div class='navbar-dropdown is-right'>
                <a class='navbar-item has-icon-left' href="http://<?php echo APP_HOST; ?>/Login/deslogar">
                    <span class='icon is-small is-left'>
                        <i class='fas fa-sign-out-alt'></i>
                    </span>
                    <p class='content has-text-grey-light'>
                        <p data-tag="deslogar"></p>
                    </p>
                </a>
            </div>
            
        </div>
        <div class='navbar-item'>
    <a href="http://<?php echo APP_HOST; ?>/home/altoContraste">
        <img src="http://<?php echo APP_HOST; ?>/public/imgs/alto-contraste-cinza.png"  height="128" alt="Logotipo do aplicativo">
    </a>
    </div>
    </div>
</nav>
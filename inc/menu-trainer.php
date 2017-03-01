<!-- The justified navigation menu is meant for single line per list item.
Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
    <nav>
        <ul class="nav nav-justified">
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'treinador.php') echo 'class="active"' ?>>
                <a href="../user/treinador.php">Início</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'acompanhamento.php') echo 'class="active"' ?>>
                <a href="../user/acompanhamento.php">Acompanhamento</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'gerencia-advertencia.php') echo 'class="active"' ?>>
                <a href="../user/gerencia-advertencia.php">Gerenciar Advertências</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'eventos.php') echo 'class="active"' ?>>
                <a href="../user/eventos.php">Eventos</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'buscar.php') echo 'class="active"' ?>>
                <a href="buscar.php">Buscar</a>
            </li>            
        </ul>
    </nav>
</div>
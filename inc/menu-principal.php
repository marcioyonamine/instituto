<!-- The justified navigation menu is meant for single line per list item.
Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
    <nav>
        <ul class="nav nav-justified">
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"' ?>>
                <a href="index.php">Home</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'objetivo.php') echo 'class="active"' ?>>
                <a href="objetivo.php">Objetivos</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'desafio.php') echo 'class="active"' ?>>
                <a href="desafio.php">Desafios</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'pontuacao.php') echo 'class="active"' ?>>
                <a href="pontuacao.php">Pontuação</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'relatorios.php') echo 'class="active"' ?>>
                <a href="relatorios.php">Relatórios</a>
            </li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'agenda.php') echo 'class="active"' ?>>
                <a href="agenda.php">Agenda</a>
            </li>
            <li>
                <a href="http://ialtaperformance.com/courses/alta-performance/lessons/definicao/">Módulo Online</a>
            </li>
            
        </ul>
    </nav>
</div>
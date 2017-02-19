      <!-- Site footer -->
      <footer class="footer text-center">
        <p>&copy; <?php echo date('Y') ?> Instituto de Alta Performance</p>
<?php
$level = get_currentuserinfo();
if($level->user_level == 10){
	vGlobais();
}
?>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright&copy; Local Foot <?php echo date('Y')?></p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo url_for('/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo url_for('/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

</body>

</html>


<?php
    db_disconnect($db);
?>
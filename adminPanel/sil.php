<?php include_once "header.php" ?>
<?php
ob_start();
if(!isset($_SESSION["adi"])){
    header("Location:../giris.php");
}
else {
?>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-user"></i>Kullanıcılar</a></li>
                    <li><a href="Ekleme.php"><i class=" glyphicon glyphicon-floppy-save"></i> İçerik Ekle</a></li>
                    <li  class="current"><a href="Sil.php"><i class="glyphicon glyphicon-floppy-remove"></i> İçerik Sil</a></li>
                    <li ><a href="Guncelle.php"><i class="glyphicon glyphicon-refresh"></i>Güncelle</a></li>
                    <li ><a href="yorumlar.php"><i class="glyphicon glyphicon-comment"></i>Yorumlar</a></li>
                    <li><a href="../index.php"><i class="glyphicon glyphicon-log-out"></i> Anasayfaya Dön</a></li>

                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

		  	<div class="row">
          <div class="col-md-6">
            <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-title">İçerik Bilgileri</div>

              <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
              </div>
            </div>
              <div class="panel-body">
                <?php
                if (isset($_GET['id'])) {
                  $sorgu = $db->exec("DELETE FROM main WHERE main.id=".$_GET['id']." " );
                }
                 ?>
                <form action="" method="get">
                  <table class="table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>İçerik Başlığı</th>
                            <th>Seç</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php
                             $sorgu = $db->query("SELECT id,yazi_baslik FROM main ORDER BY id" , PDO::FETCH_ASSOC);
                             if($sorgu -> rowCount()){
                               foreach ($sorgu as $row) {
                             ?>
                          <tr class="success">

                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['yazi_baslik'] ?></td>
                            <td><input type="checkbox" value="<?php echo $row['id'] ?>" name="id" /></td>

                          </tr>
                          <?php
                        } ?>
                        </tbody>
                      </table>
                      <div>
                        <button type="submit" class="btn btn-primary" style="" >Sil</button>
                    </div>
                  </form>
                    <?php
                }
                    ?>
              </div>
            </div>
          </div>

  			</div>



		  </div>
		</div>
    </div>
    <?php } ?>



      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>

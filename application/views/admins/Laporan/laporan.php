<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admins/_templates/meta');
$this->load->view('admins/_templates/header');
$this->load->view('admins/_templates/main_sidebar');
 ?>

<!-- isi -->

<div class="content-wrapper">
	<section class="content-header">
		<h1>Laporan Inspeksi
			<small>inspeksi</small>
		</h1>	
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Data</li>
      </ol>

<!-- Main content -->
   <?php $no=1;
        foreach ($data_laporan as $r):
        ?>
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">
            <i> Lembar Pengecekan Pompa</i>
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <img class="img-responsive" src="<?php echo base_url('upload/logo/')?>Logo_img.png" alt="Logo">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong> PT. Duta Sugar International </strong>
          <address>
            <i>Dynamic, Success, Integrrity</i><br><br>
            <strong>ENGINEERING, MAINTENANCE, & <br>
            UTILITY DEPARTMENT MAINTENANCE SECTION</strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b> <?php echo 'Area : '. $r['Area'] ?> </b><br>
          <br>
          <b><?php echo 'Nama Mesin : </b>'. $r['Nama_Mesin'] ?><br> <!-- Isi dr database -->
          <b><?php echo 'Nomor Mesin : </b>'. $r['No_Mesin'] ?><br>
          <b><?php echo 'Tanggal Inspeksi : </b>'. $r['Tgl_inspeksi'] ?></b>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Deskripsi</th>
              <th>Standar Check</th>
              <th colspan="4">Hasil Pengecekan</th>
              <th class="text-center">Keterangan</th>
            </tr>
            <tr>
              <td rowspan="4"><?php echo $no++ ?></td>
              <td rowspan="4">- Drive End</td>
              <td rowspan="3">OV &le; 4.5 mm/sec &amp; BV &le; 4 gE</td>
              <td colspan="2" align="center"><?php echo 'OV';?></td>
              <td colspan="2" align="center">BV</td>
              <td></td>
            </tr>
            <tr>
              <td align="center"><?php echo 'H';?></td>
              <td align="center"><?php echo 'V';?></td>
              <td align="center"><?php echo 'H';?></td>
              <td align="center"><?php echo 'V';?></td>
              <td align="center">   <?php 
                        if ($r['Drive_end_BV_H'] && $r['Drive_end_BV_V'] < 4 ) {
                            echo '<p class="text-green">BV : <b>Normal</b></p>';
                        } elseif ($r['Drive_end_BV_H'] && $r['Drive_end_BV_V'] < 15) {
                            echo '<p class="text-yellow">BV : <b> Warning</p></b>';
                        } else{
                          echo '<p class="text-red">BV : <b>Danger</p></b>';
                        }
                  ?></td>
            </tr>
            <tr>
              <td align="center"><?php  echo $r['Drive_end_OV_H']?></td>
              <td align="center"><?php  echo $r['Drive_end_OV_V']?></td>
              <td align="center"><?php  echo $r['Drive_end_BV_H']?></td>
              <td align="center"><?php  echo $r['Drive_end_BV_V']?></td>
              <td align="center">
                  <?php 
                        if ($r['Drive_end_OV_H'] && $r['Drive_end_OV_V'] < 4.5 ) {
                            echo '<p class="text-green">OV : <b> Normal</b></p>';
                        } elseif ($r['Drive_end_OV_H'] && $r['Drive_end_OV_V'] < 15) {
                            echo '<p class="text-yellow">OV : <b> Warning</b></p>';
                        } else{
                          echo '<p class="text-red">OV : <b>Danger</b></p>';
                        }
                  ?>
              </td>
            </tr>
            <tr>
              <td>Temperature &le; 80 &#8451;</td>
              <td colspan="4" align="center"><?php  echo $r['Temperatur_Drive'].' &#8451;'?></td>
              <td align="center"><?php if ($r['Temperatur_Drive'] <80) {
                      echo '<p class="text-green"><b> Normal</b></p>';
              }else{
                echo '<p class="text-yellow"><b> Warning</p></b>';
              }?></td>
            </tr>
            <tr>
              <td></td>
              <td>- Non Drive End</td>
              <td rowspan="3">OV &le; 4.5 mm/sec &amp; BV &le; 4 gE</td>
              <td colspan="2" align="center">OV</td>
              <td colspan="2" align="center">BV</td>
              <td></td>
            </tr>
            <tr>
              <td align="center"></td>
              <td align="center"></td>
              <td align="center">H</td>
              <td align="center">V</td>
              <td align="center">H</td>
              <td align="center">V</td>
              <td align="center"><?php 
                        if ($r['Non_Drive_end_BV_H'] && $r['Non_Drive_end_BV_V'] < 4 ) {
                            echo '<p class="text-green">BV : <b>Normal</b></p>';
                        } elseif ($r['Non_Drive_end_BV_H'] && $r['Non_Drive_end_BV_V'] < 9) {
                            echo '<p class="text-yellow">BV : <b> Warning</p></b>';
                        } else{
                          echo '<p class="text-red">BV : <b>Danger</p></b>';
                        }
                  ?></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td align="center"><?php  echo $r['Non_Drive_end_OV_H']?></td>
              <td align="center"><?php  echo $r['Non_Drive_end_OV_V']?></td>
              <td align="center"><?php  echo $r['Non_Drive_end_BV_H']?></td>
              <td align="center"><?php  echo $r['Non_Drive_end_BV_V']?></td>
              <td align="center"><?php 
                        if ($r['Non_Drive_end_OV_H'] && $r['Non_Drive_end_OV_V'] < 4.5 ) {
                            echo '<p class="text-green">OV : <b> Normal</b></p>';
                        } elseif ($r['Non_Drive_end_OV_H'] && $r['Non_Drive_end_OV_V'] < 9) {
                            echo '<p class="text-yellow">OV : <b> Warning</b></p>';
                        } else{
                          echo '<p class="text-red">OV : <b>Danger</b></p>';
                        }
                  ?></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>Temperatur &le; 80 &#8451;</td>
              <td colspan="4" align="center"><?php  echo $r['Temperatur_Non_Drive'].' &#8451;'?></td>
              <td align="center"><?php if ($r['Temperatur_Non_Drive'] <80) {
                      echo '<p class="text-green"><b> Normal</b></p>';
              }else{
                echo '<p class="text-yellow"><b> Warning</p></b>';
              }?></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Oil Seal</td>
              <td>No Leakage</td>
              <td colspan="4"><?php ?></td>
              <td></td>
            </tr>
          
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <?php echo 'Nilai Pengukuran pada kolom hasil pengecekan sesuai dengan kondisi aktual'; ?>  
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-3">
          <p><?php echo'Prepared by : '.$r['Tgl_inspeksi'];?></p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th><?php  echo $r['nama_lengkap']?></th>
              </tr>
              <tr>
                <td>checker</td> 
              </tr>
            </table>
          </div>
        </div>
        <div class="col-xs-3">
          <p><?php echo 'Checked by : '.date("d/m/Y"); ?></p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th><?php echo $this->session->userdata('ses_Nama'); ?></th>
              </tr>
              <tr>
                <td>planner</td>
              </tr>
            </table>
          </div>          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/laporan/laporan_print/'.$r['id_mesin']); ?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <a href="<?php echo base_url('api/Laporan/'.$r['oil_seil']); ?>" id="popupImages" class="btn btn-primary pull-right" style="margin-right: 5px"><i class="fa fa-image"></i> Lihat Kondisi Oli</a>
         <!--  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
<?php endforeach; ?>

<!-- Batas Conten  -->
</section>
</div>
              <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <img src="" class="responsive-img" style='width:100%'/>
                    </div>
                  </div>
              </div>
             
<?php 
    $this->load->view('admins/_templates/footer'); 
    $this->load->view('admins/_templates/main_footer'); 
?>

<script>
  $(document).ready(function () {
    $('#popupImages').click(function (e) { 
      e.preventDefault();
      $('.modal img').attr('src', $(this).attr('href'));
      $('.modal').modal('show');
    });
  });
</script>
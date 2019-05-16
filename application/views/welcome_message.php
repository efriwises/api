<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Ongkos Kirim</h2>
                    <form>
                        <div class="form-group">
                            <label for="sel1">Provinsi</label>
                            <select class="form-control" name="provinsi">
                                <option value="-">--Pilih Provinsi--</option>
                                <?php
                                foreach ($provinsi as $prov) {
                                    ?>
                                    <option value="<?php echo $prov['province_id'] ?>"
                                            data-prov="<?php echo $prov['province'] ?>"
                                            ><?php echo $prov['province'] ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Kota</label>
                            <select class="form-control" name="kota">
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Ongkos Kirim</label>
                            <select class="form-control" name="ongkir">
                                <option>1</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Detail Ongkir</h2>
                    <div class="form-group">
                        <label for="usr">Nama Provisi:</label>
                        <input type="text" class="form-control" name="nama_provinsi">
                    </div>
                    <div class="form-group">
                        <label for="usr">Nama Kota:</label>
                        <input type="text" class="form-control" name="nama_kota">
                    </div>
                    <div class="form-group">
                        <label for="usr">Kurir:</label>
                        <input type="text" class="form-control" name="kurir">
                    </div>
                    <div class="form-group">
                        <label for="usr">Estimasi Waktu:</label>
                        <input type="text" class="form-control" name="etd">
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<script>
    //fungsi jika ada perubahan pada form provinsi
    $('[name="provinsi"]').change(function () {

        //**menampilkan kota berdasarkan provinsi yg dipilih
        var url = "<?php echo site_url('Ongkir/kota'); ?>/" + $(this).val();
        $('[name="kota"]').load(url);


        //menampilkan nama provinsi
        var cntrol = $(this);
        var Prov = cntrol.find(':selected').data('prov');
        $('[name="nama_provinsi"]').val(Prov);
        return false;
    });


//    fungsi jika ada perubahan pada form kota
    $('[name="kota"]').change(function () {

        //**menampilkan ongkos kirim berdasarkan kota yg dipilih
        var url = "<?php echo site_url('Ongkir/ongkos'); ?>/" + $(this).val();
        $('[name="ongkir"]').load(url);



        //menampilkan nama kota yg dipilih
        var cntrol = $(this);
        var City = cntrol.find(':selected').data('city');
        $('[name="nama_kota"]').val(City);
        return false;
    });
    
    
//    fungsi jika ada perubahan pada form ongkir    
    $('[name="ongkir"]').change(function () {
        var cntrol = $(this);
        
        //menampilkan detail estimasi waktu pengiriman
        var Etd = cntrol.find(':selected').data('etd');
        $('[name="etd"]').val(Etd);
        
        
        //menampilkan detail kurir
        var Kurir = cntrol.find(':selected').data('service');
        $('[name="kurir"]').val(Kurir);
        
        return false;
        
    })
</script>

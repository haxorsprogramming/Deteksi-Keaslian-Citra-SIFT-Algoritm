<div class="container" id="divPengujianDecode">

<div class="row">
    <div class="card-body">
        <div class="summary">
            <div class="summary-info">
                <h4>Pengujian Citra</h4>
                <small>Citra 1</small><br/>
                <img src="../ladun/foto_uji/uji_asli_1.jpg" style="width:30%;" id="txtPreviewUpload">
                <br/>
                <small>Citra 2</small><br/>
                <img src="../ladun/foto_uji/editan_1.jpg" style="width:30%;" id="txtPreviewUpload2">
                <div class="container">
                <hr />
                    <h6>Total Keypoint : 19</h6>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Keypoint</th><th>Trheshold</th><th>C1 (Ip)</th><th>C1 (Recall)</th><th>C2 (Ip)</th><th>C2(Recall)</th><th>Akurasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                for ($x = 1; $x < 20; $x++) {
                                    $treshold = rand(10,100);
                                    $c1_ip = rand(0, 9);
                                    $c1_recall = rand(0, 9);
                                    $c2_ip = rand(0, 9);
                                    $c2_recall = rand(0, 9);
                                    $akurasi = rand(20, 100);
                            ?>
                            <tr>
                                <td><?=$x; ?></td><td><?=$treshold; ?></td><td><?=$c1_ip; ?></td><td><?=$c1_recall; ?></td><td><?=$c2_ip; ?></td><td><?=$c2_recall; ?></td><td><?=$akurasi; ?> %</td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="container">
                <hr/>
                <h5>Tabel result matching</h5>

                <table>
                    <thead>
                    <tr>
                        <th>Citra</th><th>Result</th>
                    </tr>
                    </thead>
                    <tbody>
                                
                    </tbody>
                </table>
                </div>
                <form enctype="multipart/form-data" id="frmUpload" style="display: none;">
                    <div class="text-muted" style="margin-top:20px;">Hasil analisa citra</div>
                    <input type="file" id="txtVideo" name="txtVideo" onchange="detectVideo()">
                    <div style="margin-top:20px;">
                        <a href="#!" id="btnMulaiAnalisa" class="btn btn-primary btn-lg" @click="analisaVideoAtc">Mulai analisa citra</a>
                    </div>
                    <div id="divStatusUji" style="display:none;">
                        Sedang decode video
                    </div>
                </form>

                <div id="divLoading" style="text-align:center;display:none;">
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_jryyrscd.json" mode="bounce" background="transparent" speed="1" style="width: 300px; height: 300px;margin:auto;" loop autoplay>
                    </lottie-player>
                    <h5 id="txtCapLoading"></h5>
                </div>

                <div id="divHasilDecodeVideo" style="margin-top:20px;display:none;">
                    <hr />
                    <h6>Hasil Decode Pesan</h6>
                    <hr />
                    <h3 id="divHasilDecode">-</h3>
                </div>

            </div>
        </div>
    </div>

</div>


</div>
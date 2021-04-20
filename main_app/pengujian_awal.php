<div id="divPengujianAwal">

    <div class="row" style="margin-top: 15px;">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card-body">
                <div class="summary">
                    <div class="summary-info">
                        <img src="../ladun/dasbor/img/set_img.png" id="imgPertama" style="width: 300px;"><br/><br/>
                        <small>Pilih gambar 1</small>
                    <input type="file" onchange="getImg_1()" class="form-control" id="txtGetImg1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card-body">
                <div class="summary">
                    <div class="summary-info">
                        <img src="../ladun/dasbor/img/set_img.png" id="imgKedua" style="width: 300px;"><br/><br/>
                        <small>Pilih gambar 2</small>
                        <input type="file" onchange="getImg_2()" class="form-control" id="txtGetImg2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 15px; text-align:center;">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <a href="#!" class="btn btn-primary btn-lg" @click="prosesAnalisa()"><i class="far fa-file-image"></i> Mulai analisa gambar</a>
        </div>
    </div>

    <div class="row" style="margin-top: 15px;">

    <h4>Hasil analisa gambar</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th><th>Keypoint</th><th>Aksi</th>
            </tr>
        </thead>
    </table>
    </div>

</div>

<script>

var rToStartAnalisa = "proses_analisa.php";

var appPengujian = new Vue({
    el : '#divPengujianAwal',
    data : {

    },
    methods : {
        prosesAnalisa : function()
        {
            console.log("mulai analisa gambar");
            let img1 = document.querySelector('#imgPertama').getAttribute("src");
            let img2 = document.querySelector('#imgKedua').getAttribute("src");
            let ds = { 'img1' : img1, 'img2' : img2 }
            $.post(rToStartAnalisa, ds, function(data){
                // let obj = JSON.parse(data);
                console.log(data);
            });
        }
    }
});

function getImg_1()
{
    var fileGambar1 = new FileReader();
    var inImg1 = document.querySelector('#txtGetImg1');
    var sampulImg1 = document.querySelector('#imgPertama');
    fileGambar1.readAsDataURL(inImg1.files[0]);

    fileGambar1.onload = function(e){
        let hasil = e.target.result;
        sampulImg1.src = hasil;
    }
}

function getImg_2()
{
    var fileGambar2 = new FileReader();
    var inImg2 = document.querySelector('#txtGetImg2');
    var sampulImg2 = document.querySelector('#imgKedua');
    fileGambar2.readAsDataURL(inImg2.files[0]);

    fileGambar2.onload = function(e){
        let hasil = e.target.result;
        sampulImg2.src = hasil;
    }
}

</script>
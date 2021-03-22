// Route 
var rToLogin = server + "proses_login.php";

// Vue object 
var vueLogin = new Vue({
  el : '#login-app',
  data : {

  },
  methods : {
    loginAtc : function()
    {
      let username = document.querySelector('#txtUsername').value;
      let password = document.querySelector('#txtPassword').value;
      let ds = {'username':username, 'password':password}
      if(username === '' || password === ''){
        pesanUmumApp('warning', 'Isi field!!!', 'Harap isi semua field!!!');
      }else{
        $.post(rToLogin, ds, function(data){
          let obj = JSON.parse(data);
          let status_login = obj.status;
          if(status_login === 'sukses'){
            window.location.assign('main_app/dashboard.php');
          }else{
            pesanUmumApp('warning', 'Gagal login', 'Periksa username & password!!!');
          }
        });
      }
    }
  }
});

// Inisialisasi 
document.querySelector('#txtUsername').focus();

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
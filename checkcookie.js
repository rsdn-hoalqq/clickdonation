function getDateCurent(){
  var d = new Date();
  var day = d.getDate();
  var month = d.getMonth() + 1;
  var year = d.getFullYear();
  var curentTime =  year+'-'+month+'-'+day;
  return curentTime;
}

function checkDateTime(curentTime){
  curentTime = String(curentTime);
  newDates = getDateCurent();
  newDate = String(newDates);
  if(curentTime === newDate){
      return true;
  }
  return false;
}
// 
function checkCookie(cname,valC){
  var valname=getCookie(cname);
  if (valname == ""){
     setCookie(cname, valC, 30);
  }
}
function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  return "";
}

function destroyCookie(){
  document.cookie = 'curentTime' + "=" + '' + ";" + 10 + ";path=/";
  document.cookie = 'localIp' + "=" + '' + ";" + 10 + ";path=/";
  document.cookie = 'publicIp' + "=" + '' + ";" + 10 + ";path=/";    
  location.reload();    
}

function addMoney(){
  var curentTime  = getCookie('curentTime');        
  var localIp     = getCookie('localIp_user');
  var publicIp    = getCookie('publicIp_user'); 
  
  if(curentTime == '' || checkDateTime(curentTime) === false){
    curentTime = getDateCurent();
    setCookie('curentTime',curentTime,30);
  }
  if(localIp){
    setCookie('localIp',localIp,30);
  }
  if(publicIp){
    setCookie('publicIp',publicIp,30);
  }

  checkCookie = String(curentTime);
  var formData = new FormData();
  formData.append('local_ip', localIp);
  formData.append('public_ip', publicIp);
  formData.append('cookies_info', checkCookie);
  $.ajax({
    url: 'clicks/api.php',
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
      data = JSON.parse(data);
      alert(data['message']);
      location.reload(); 
    }
  });

}
(function() {
    initCheckCookie();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var publicIp = JSON.parse(xhttp.responseText).ip;
            checkCookie('publicIp_user',publicIp);
            // document.getElementById("connection").innerHTML += '<b>Public IP:</b> ' + publicIp + '<br>';
        }
    };
    xhttp.open("GET", "https://api.ipify.org?format=json", true);
    xhttp.send();
    var xhttp3 = new XMLHttpRequest();
    xhttp3.onreadystatechange = function() {
        if (xhttp3.readyState == 4 && xhttp3.status == 200) {
            // document.getElementById("isp").innerHTML += '<b>Service Provider:</b> ' + JSON.parse(xhttp3.responseText).isp + '<br>';
        }
    };
    xhttp3.open("GET", "http://ip-api.com/json", true);
    xhttp3.send();

    if(document.referrer && document.referrer!==''){
            // document.getElementById("referrer").innerHTML = '<b>Previous Page:</b>  '+document.referrer+'<br>';
    }

    //get the IP addresses associated with an account
    function getIPs(callback) {
        var ip_dups = {};

        //compatibility for firefox and chrome
        var RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
        var useWebKit = !!window.webkitRTCPeerConnection;

        //bypass naive webrtc blocking using an iframe
        if (!RTCPeerConnection) {
            //NOTE: you need to have an iframe in the page right above the script tag
            //
            //<iframe id="iframe" sandbox="allow-same-origin" style="display: none"></iframe>
            //<script>...getIPs called in here...
            //
            var win = iframe.contentWindow;
            RTCPeerConnection = win.RTCPeerConnection || win.mozRTCPeerConnection || win.webkitRTCPeerConnection;
            useWebKit = !!win.webkitRTCPeerConnection;
        }

        //minimal requirements for data connection
        var mediaConstraints = {
            optional: [{
                RtpDataChannels: true
            }]
        };

        var servers = {
            iceServers: [{
                urls: "stun:stun.services.mozilla.com"
            }]
        };

        //construct a new RTCPeerConnection
        var pc = new RTCPeerConnection(servers, mediaConstraints);

        var sentResult = false;

        function handleCandidate(candidate) {
            //match just the IP address
            var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
            var ip_addr = ip_regex.exec(candidate)[1];

            //remove duplicates
            if (!sentResult && ip_dups[ip_addr] === undefined) {
                sentResult = true;
                callback(ip_addr);
            }

            ip_dups[ip_addr] = true;
        }

        //listen for candidate events
        pc.onicecandidate = function(ice) {

            //skip non-candidate events
            if (ice.candidate)
                handleCandidate(ice.candidate.candidate);
        };

        //create a bogus data channel
        pc.createDataChannel("");

        //create an offer sdp
        pc.createOffer(function(result) {

            //trigger the stun server request
            pc.setLocalDescription(result, function() {}, function() {});

        }, function() {});

        //wait for a while to let everything done
        setTimeout(function() {
            //read candidate info from local description
            var lines = pc.localDescription.sdp.split('\n');

            lines.forEach(function(line) {
                if (line.indexOf('a=candidate:') === 0)
                    handleCandidate(line);
            });
        }, 1000);
    }

    //Test: Print the IP addresses into the console
    getIPs(function(ip) {
        // document.getElementById("connection").innerHTML += '<b>Local IP:</b> ' + ip + '<br>';
        checkCookie('localIp_user',ip);
        window.ip = ip;
    }); 

    function initCheckCookie(){
        var curentTime  = getCookie('curentTime');        
        var localIp     = getCookie('localIp');
        var publicIp    = getCookie('publicIp'); 
        if(curentTime != '' && checkDateTime(curentTime) && publicIp){
            disableTagA();
        }else{
            checkExistIp(getCookie('localIp_user'),getCookie('publicIp_user'));
        }       
    }

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
    // call funtion check cookie
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

    function checkExistIp(localIp,publicIp){
        curentTime = getDateCurent();        
        checkCookie = String(curentTime);
        var formData = new FormData();
        formData.append('local_ip', localIp);
        formData.append('public_ip', publicIp);
        formData.append('cookies_info', checkCookie);
        $.ajax({
            url: 'clicks/api_exist_ip.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                data = JSON.parse(data);    
                console.log(data);      
                if(data['code'] != 200){                    
                    disableTagA();
                }
            }
        });
    }  

    function disableTagA(){
        document.getElementById('disabled-tag-a').style.pointerEvents = 'none';
        document.getElementById('disabled-tag-a').style.cursor = 'default';
    }
}())

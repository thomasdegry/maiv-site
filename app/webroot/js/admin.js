(function(){

/* globals qrcode:true */
var QRScanner = (function () {

    var QRScanner = function () {
        _.bindAll(this);

        this.el = {
            webcam: $("#webcam"),
            startButton: $("#startCam"),
            list: $("#scan-log ul")
        };

        if(this.el.webcam.length === 0) {
            return false;
        }

        this.camHtml = '<object  id="iembedflash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="320" height="240"> '+
            '<param name="movie" value="files/camcanvas.swf" />'+
            '<param name="quality" value="high" />'+
            '<param name="allowScriptAccess" value="always" />'+
            '<embed  allowScriptAccess="always"  id="embedflash" src="files/camcanvas.swf" quality="high" width="320" height="240" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" mayscript="true"  />'+
        '</object>';
        this.vidhtml = '<video id="v" autoplay></video>';
        this.stype = 0;
        this.gUM = false;
        this.webkit = false;
        this.moz = false;
        this.v = null;
        this.imageData = null;
        this.gCanvas = null;
        this.gCtx = null;
        this.interval;
        this.dots = 0;

        var that = this;
        this.el.startButton.click(function(e) {
            that.el.startButton.text('Allow the webcam');
            e.preventDefault();
            that.launch();
            that.launchCam();
        });
    };

    QRScanner.prototype.launch = function() {
        console.log('hallo ik ga de cam starten');
        if(this.isCanvasSupported()){
            this.initCanvas(561,421);
            qrcode.callback = this.read;
        } else {
            alert('Please update your browser so you can scan codes');
        }
    };

    QRScanner.prototype.launchCam = function() {
        if(this.stype===1) {
            setTimeout(this.captureToCanvas, 500);
            return;
        }
            
        var n=navigator;

        if (navigator.getUserMedia) {
            console.log('legacy');
            document.getElementById("outdiv").innerHTML = this.vidhtml;
            this.v=document.getElementById("v");
            n.getUserMedia({video: true, audio: false}, this.success, this.error);
        } else if (navigator.webkitGetUserMedia) {
            console.log('>>webkit');
            document.getElementById("outdiv").innerHTML = this.vidhtml;
            this.v=document.getElementById("v");
            this.webkit=true;
            n.webkitGetUserMedia({video: true, audio: false}, this.success, this.error);
        } else if (navigator.mozGetUserMedia) {
            console.log('moz');
            document.getElementById("outdiv").innerHTML = this.vidhtml;
            this.v=document.getElementById("v");
            this.moz=true;
            n.mozGetUserMedia({video: true, audio: false}, this.success, this.error);
        } else {
            console.log('what the flying fuck');
            document.getElementById("outdiv").innerHTML = this.camhtml;
        }

        this.stype=1;
        console.log(this.stype);
        setTimeout(this.captureToCanvas, 500);
    };

    QRScanner.prototype.captureToCanvas = function() {
        if(this.stype!==1) {
            console.log('quits');
            return;
        }
        if(this.gUM) {
            try{
                this.gCtx.drawImage(this.v,0,0);
                try{
                    qrcode.decode();
                }
                catch(e){
                    console.log(e);
                    setTimeout(this.captureToCanvas, 500);
                }
            }
            catch(e) {
                    console.log(e);
                    setTimeout(this.captureToCanvas, 500);
            }
        } else {
            var flash = document.getElementById("embedflash");

            if (flash) {
                try{
                    flash.ccCapture();
                }
                catch(e) {
                    console.log(e);
                    setTimeout(this.captureToCanvas, 1000);
                }
            }
        }
    };

    QRScanner.prototype.success = function(stream) {
        this.el.startButton.addClass('fadeAway');
        this.el.list.removeClass('hide');
        this.el.startButton.delay(300).stop().animate({
            'height': '0px'
        }, 220, function() {
            console.log('done');
        });

        setInterval(this.animateDots, 600);

        if(this.webkit) {
            this.v.src = window.webkitURL.createObjectURL(stream);
            console.log(this.v);
        } else if(this.moz) {
                this.v.mozSrcObject = stream;
                this.v.play();
        } else {
            this.v.src = stream;
        }
        
        this.gUM = true;
        setTimeout(this.captureToCanvas, 500);
    };

    QRScanner.prototype.error = function(error) {
        this.gUM = false;
        return;
    };

    QRScanner.prototype.initCanvas = function(width, height) {
        console.log('init canvas');
        this.gCanvas = document.getElementById("qr-canvas");
        var w = width;
        var h = height;
        this.gCanvas.style.width = w + "px";
        this.gCanvas.style.height = h + "px";
        this.gCanvas.width = w;
        this.gCanvas.height = h;
        this.gCtx = this.gCanvas.getContext("2d");
        this.gCtx.clearRect(0, 0, w, h);
        this.imageData = this.gCtx.getImageData( 0,0,320,240);
    };

    QRScanner.prototype.animateDots = function() {
        if(dots < 3) {
            $('#dots').append('.');
            dots++;
        } else {
            $('#dots').html('');
            dots = 0;
        }
    };

    QRScanner.prototype.read = function(a) {
        console.log(a);
        var sharedCode = a,
            codeInformation = sharedCode.split('-'),
            burgerID = codeInformation[0],
            userID = codeInformation[1],
            that = this;

        $.getJSON('http://ksjkuurne.be/FOOD/api/creations/pay/' + userID + '/' + burgerID, function(data) {
            console.log('in success handler');
            var date = new Date();
            var node;
            if(data.used === true) {
                console.log('used is true');
                node = '<li class="error">Invalid QR code for ' + data.user.name + 
                            ' <span class="timeago" data-date="' + date.toISOString() + '">' + date.toISOString() + '</span></li>';
            } else {
                console.log('used is false');
                node = '<li>Payment for ' + data.user.name + 
                            ' was successful <span class="timeago" data-date="' + date.toISOString() + '">' + date.toISOString() + '</span></li>';
            }

            if($("#scan-log ul li").length > 7) {
                $("#scan-log ul li:last-child").addClass('go-away');
            }

            $("#scan-log ul li:first-child").after(node);

            setTimeout(function() {
                console.log('time out functie');
                $("#scan-log ul li:nth-child(2)").addClass('inserted');
                $("body").timeago({selector: 'span.timeago', attr: 'data-date'});
            },10);

            setTimeout(that.captureToCanvas, 1500);
        });

    };

    QRScanner.prototype.isCanvasSupported = function() {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    };

    return QRScanner;

})();

/* globals QRScanner */

$(window).load(function () {

    var qrScanner = new QRScanner();

});

})();
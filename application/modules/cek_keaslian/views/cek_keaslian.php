<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

<script type="text/javascript">
var WebCodeCamJS = function(element) {
    'use strict';
    this.Version = {
        name: 'WebCodeCamJS',
        version: '2.7.0',
        author: 'Tóth András',
    };
     var mediaDevices = window.navigator.mediaDevices;
  //= NavigatorUserMedia.MediaDevices;


    mediaDevices.getUserMedia = function(c) {
        return new Promise(function(y, n) {
            (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia).call(navigator, c, y, n);
        });
    }
    HTMLVideoElement.prototype.streamSrc = ('srcObject' in HTMLVideoElement.prototype) ? function(stream) {
        this.srcObject = !!stream ? stream : null;
    } : function(stream) {
        if (!!stream) {
            this.src = (window.URL || window.webkitURL).createObjectURL(stream);
        } else {
            this.removeAttribute('src');
        }
    };
    var videoSelect, lastImageSrc, con, beepSound, w, h, lastCode;
    var display = Q(element),
        DecodeWorker = null,
        video = html('<video muted autoplay playsinline></video>'),
        sucessLocalDecode = false,
        localImage = false,
        flipMode = [1, 3, 6, 8],
        isStreaming = false,
        delayBool = false,
        initialized = false,
        localStream = null,
        options = {
            decodeQRCodeRate: 5,
            decodeBarCodeRate: 3,
            successTimeout: 500,
            codeRepetition: true,
            tryVertical: true,
            frameRate: 15,
            width: 320,
            height: 240,
            constraints: {
                video: {
                    mandatory: {
                        maxWidth: 1280,
                        maxHeight: 720
                    },
                    optional: [{
                        sourceId: true
                    }]
                },
                audio: false,
            },
            flipVertical: false,
            flipHorizontal: false,
            zoom: 0,
            beep: '../audio/beep.mp3',
            decoderWorker: '../js/DecoderWorker.js',
            brightness: 0,
            autoBrightnessValue: 0,
            grayScale: 0,
            contrast: 0,
            threshold: 0,
            sharpness: [],
            resultFunction: function(res) {
                console.log(res.format + ": " + res.code);
            },
            cameraSuccess: function(stream) {
                console.log('cameraSuccess');
            },
            canPlayFunction: function() {
                console.log('canPlayFunction');
            },
            getDevicesError: function(error) {
                console.log(error);
            },
            getUserMediaError: function(error) {
                console.log(error);
            },
            cameraError: function(error) {
                console.log(error);
            }
        };

    function init() {
        var constraints = changeConstraints();
        try {
            mediaDevices.getUserMedia(constraints).then(cameraSuccess).catch(function(error) {
                options.cameraError(error);
                return false;
            });
        } catch (error) {
            options.getUserMediaError(error);
            return false;
        }
        return true;
    }

    function play() {
        if (!localImage) {
            if (!localStream) {
                init();
            }
            const p = video.play();
            if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
                p.catch(e => null);
            }
            delay();
        }
    }

    function stop() {
        delayBool = true;
        const p = video.pause();
        if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
            p.catch(e => null);
        }
        video.streamSrc(null);
        con.clearRect(0, 0, w, h);
        if (localStream) {
            for (var i = 0; i < localStream.getTracks().length; i++) {
                localStream.getTracks()[i].stop();
            }
        }
        localStream = null;
    }

    function pause() {
        delayBool = true;
        const p = video.pause();
        if (p && (typeof Promise !== 'undefined') && (p instanceof Promise)) {
            p.catch(e => null);
        }
    }

    function delay() {
        delayBool = true;
        if (!localImage) {
            setTimeout(function() {
                delayBool = false;
                if (options.decodeBarCodeRate) {
                    tryParseBarCode();
                }
                if (options.decodeQRCodeRate) {
                    tryParseQRCode();
                }
            }, options.successTimeout);
        }
    }

    function beep() {
        if (options.beep) {
            beepSound.play();
        }
    }

    function cameraSuccess(stream) {
        localStream = stream;
        video.streamSrc(stream);
        options.cameraSuccess(stream);
    }

    function cameraError(error) {
        options.cameraError(error);
    }

    function setEventListeners() {
        video.addEventListener('canplay', function(e) {
            if (!isStreaming) {
                if (video.videoWidth > 0) {
                    h = video.videoHeight / (video.videoWidth / w);
                }
                display.setAttribute('width', w);
                display.setAttribute('height', h);
                isStreaming = true;
                if (options.decodeQRCodeRate || options.decodeBarCodeRate) {
                    delay();
                }
            }
        }, false);
        video.addEventListener('play', function() {
            setInterval(function() {
                if (!video.paused && !video.ended) {
                    var z = options.zoom;
                    if (z === 0) {
                        z = optimalZoom();
                    }
                    con.drawImage(video, (w * z - w) / -2, (h * z - h) / -2, w * z, h * z);
                    var imageData = con.getImageData(0, 0, w, h);
                    if (options.grayScale) {
                        imageData = grayScale(imageData);
                    }
                    if (options.brightness !== 0 || options.autoBrightnessValue) {
                        imageData = brightness(imageData, options.brightness);
                    }
                    if (options.contrast !== 0) {
                        imageData = contrast(imageData, options.contrast);
                    }
                    if (options.threshold !== 0) {
                        imageData = threshold(imageData, options.threshold);
                    }
                    if (options.sharpness.length !== 0) {
                        imageData = convolute(imageData, options.sharpness);
                    }
                    con.putImageData(imageData, 0, 0);
                }
            }, 1E3 / options.frameRate);
        }, false);
    }

    function setCallBack() {
        DecodeWorker.onmessage = function(e) {
            if (localImage || (!delayBool && !video.paused)) {
                if (e.data.success === true && e.data.success != 'localization') {
                    sucessLocalDecode = true;
                    delayBool = true;
                    delay();
                    setTimeout(function() {
                        if (options.codeRepetition || lastCode != e.data.result[0].Value) {
                            beep();
                            lastCode = e.data.result[0].Value;
                            options.resultFunction({
                                format: e.data.result[0].Format,
                                code: e.data.result[0].Value,
                                imgData: lastImageSrc
                            });
                        }
                    }, 0);
                }
                if ((!sucessLocalDecode || !localImage) && e.data.success != 'localization') {
                    if (!localImage) {
                        setTimeout(tryParseBarCode, 1E3 / options.decodeBarCodeRate);
                    }
                }
            }
        };
        qrcode.callback = function(a) {
            if (localImage || (!delayBool && !video.paused)) {
                sucessLocalDecode = true;
                delayBool = true;
                delay();
                setTimeout(function() {
                    if (options.codeRepetition || lastCode != a) {
                        beep();
                        lastCode = a;
                        options.resultFunction({
                            format: 'QR Code',
                            code: a,
                            imgData: lastImageSrc
                        });
                    }
                }, 0);
            }
        };
    }

    function tryParseBarCode() {
        display.style.transform = 'scale(' + (options.flipHorizontal ? '-1' : '1') + ', ' + (options.flipVertical ? '-1' : '1') + ')';
        if (options.tryVertical && !localImage) {
            flipMode.push(flipMode[0]);
            flipMode.splice(0, 1);
        } else {
            flipMode = [1, 3, 6, 8];
        }
        lastImageSrc = display.toDataURL();
        DecodeWorker.postMessage({
            scan: con.getImageData(0, 0, w, h).data,
            scanWidth: w,
            scanHeight: h,
            multiple: false,
            decodeFormats: ["Code128", "Code93", "Code39", "EAN-13", "2Of5", "Inter2Of5", "Codabar"],
            rotation: flipMode[0]
        });
    }

    function tryParseQRCode() {
        display.style.transform = 'scale(' + (options.flipHorizontal ? '-1' : '1') + ', ' + (options.flipVertical ? '-1' : '1') + ')';
        try {
            lastImageSrc = display.toDataURL();
            qrcode.decode();
        } catch (e) {
            if (!localImage && !delayBool) {
                setTimeout(tryParseQRCode, 1E3 / options.decodeQRCodeRate);
            }
        }
    }

    function optimalZoom() {
        return video.videoHeight / h;
    }

    function getImageLightness() {
        var pixels = con.getImageData(0, 0, w, h),
            d = pixels.data,
            colorSum = 0,
            r, g, b, avg;
        for (var x = 0, len = d.length; x < len; x += 4) {
            r = d[x];
            g = d[x + 1];
            b = d[x + 2];
            avg = Math.floor((r + g + b) / 3);
            colorSum += avg;
        }
        return Math.floor(colorSum / (w * h));
    }

    function brightness(pixels, adjustment) {
        adjustment = adjustment === 0 && options.autoBrightnessValue ? Number(options.autoBrightnessValue) - getImageLightness() : adjustment;
        var d = pixels.data;
        for (var i = 0; i < d.length; i += 4) {
            d[i] += adjustment;
            d[i + 1] += adjustment;
            d[i + 2] += adjustment;
        }
        return pixels;
    }

    function grayScale(pixels) {
        var d = pixels.data;
        for (var i = 0; i < d.length; i += 4) {
            var r = d[i],
                g = d[i + 1],
                b = d[i + 2],
                v = 0.2126 * r + 0.7152 * g + 0.0722 * b;
            d[i] = d[i + 1] = d[i + 2] = v;
        }
        return pixels;
    }

    function contrast(pixels, cont) {
        var data = pixels.data;
        var factor = (259 * (cont + 255)) / (255 * (259 - cont));
        for (var i = 0; i < data.length; i += 4) {
            data[i] = factor * (data[i] - 128) + 128;
            data[i + 1] = factor * (data[i + 1] - 128) + 128;
            data[i + 2] = factor * (data[i + 2] - 128) + 128;
        }
        return pixels;
    }

    function threshold(pixels, thres) {
        var average, d = pixels.data;
        for (var i = 0, len = w * h * 4; i < len; i += 4) {
            average = d[i] + d[i + 1] + d[i + 2];
            if (average < thres) {
                d[i] = d[i + 1] = d[i + 2] = 0;
            } else {
                d[i] = d[i + 1] = d[i + 2] = 255;
            }
            d[i + 3] = 255;
        }
        return pixels;
    }

    function convolute(pixels, weights, opaque) {
        var sw = pixels.width,
            sh = pixels.height,
            w = sw,
            h = sh,
            side = Math.round(Math.sqrt(weights.length)),
            halfSide = Math.floor(side / 2),
            src = pixels.data,
            tmpCanvas = document.createElement('canvas'),
            tmpCtx = tmpCanvas.getContext('2d'),
            output = tmpCtx.createImageData(w, h),
            dst = output.data,
            alphaFac = opaque ? 1 : 0;
        for (var y = 0; y < h; y++) {
            for (var x = 0; x < w; x++) {
                var sy = y,
                    sx = x,
                    r = 0,
                    g = 0,
                    b = 0,
                    a = 0,
                    dstOff = (y * w + x) * 4;
                for (var cy = 0; cy < side; cy++) {
                    for (var cx = 0; cx < side; cx++) {
                        var scy = sy + cy - halfSide,
                            scx = sx + cx - halfSide;
                        if (scy >= 0 && scy < sh && scx >= 0 && scx < sw) {
                            var srcOff = (scy * sw + scx) * 4,
                                wt = weights[cy * side + cx];
                            r += src[srcOff] * wt;
                            g += src[srcOff + 1] * wt;
                            b += src[srcOff + 2] * wt;
                            a += src[srcOff + 3] * wt;
                        }
                    }
                }
                dst[dstOff] = r;
                dst[dstOff + 1] = g;
                dst[dstOff + 2] = b;
                dst[dstOff + 3] = a + alphaFac * (255 - a);
            }
        }
        return output;
    }

    function buildSelectMenu(selectorVideo, ind) {
        videoSelect = Q(selectorVideo);
        videoSelect.innerHTML = '';
        try {
            if (mediaDevices && mediaDevices.enumerateDevices) {
                mediaDevices.enumerateDevices().then(function(devices) {
                    devices.forEach(function(device) {
                        gotSources(device);
                    });
                    if (typeof ind === 'string') {
                        Array.prototype.find.call(videoSelect.children, function(a, i) {
                            if (a['innerText' in HTMLElement.prototype ? 'innerText' : 'textContent'].toLowerCase().match(new RegExp(ind, 'g'))) {
                                videoSelect.selectedIndex = i;
                            }
                        });
                    } else {
                        videoSelect.selectedIndex = videoSelect.children.length <= ind ? 0 : ind;
                    }
                }).catch(function(error) {
                    options.getDevicesError(error);
                });
            } else if (mediaDevices && !mediaDevices.enumerateDevices) {
                html('<option value="true">On</option>', videoSelect);
                options.getDevicesError(new NotSupportError('enumerateDevices Or getSources is Not supported'));
            } else {
                throw new NotSupportError('getUserMedia is Not supported');
            }
        } catch (error) {
            options.getDevicesError(error);
        }
    }

    function gotSources(device) {
        if (device.kind === 'video' || device.kind === 'videoinput') {
            var face = (!device.facing || device.facing === '') ? 'unknown' : device.facing;
            var text = device.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
            html('<option value="' + (device.id || device.deviceId) + '">' + text + '</option>', videoSelect);
        }
    }

    function changeConstraints() {
        var constraints = JSON.parse(JSON.stringify(options.constraints));
        if (videoSelect && videoSelect.length !== 0) {
            switch (videoSelect[videoSelect.selectedIndex].value.toString()) {
                case 'true':
                    if (navigator.userAgent.search("Edge") == -1 && navigator.userAgent.search("Chrome") != -1) {
                        constraints.video.optional = [{
                            sourceId: true
                        }];
                    } else {
                        constraints.video.deviceId = undefined;
                    }
                    break;
                case 'false':
                    constraints.video = false;
                    break;
                default:
                    if (navigator.userAgent.search("Edge") == -1 && navigator.userAgent.search("Chrome") != -1) {
                        constraints.video.optional = [{
                            sourceId: videoSelect[videoSelect.selectedIndex].value
                        }];
                    } else if (navigator.userAgent.search("Firefox") != -1) {
                        constraints.video.deviceId = {
                            exact: videoSelect[videoSelect.selectedIndex].value
                        };
                    } else {
                         constraints.video.deviceId = videoSelect[videoSelect.selectedIndex].value;
                    }
                    break;
            }
        }
        constraints.audio = false;
        return constraints;
    }

    function Q(el) {
        if (typeof el === 'string') {
            var els = document.querySelectorAll(el);
            return typeof els === 'undefined' ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }

    function decodeLocalImage(url) {
        stop();
        localImage = true;
        sucessLocalDecode = false;
        var img = new Image();
        img.onload = function() {
            con.fillStyle = '#fff';
            con.fillRect(0, 0, w, h);
            con.drawImage(this, 5, 5, w - 10, h - 10);
            tryParseQRCode();
            tryParseBarCode();
        };
        if (url) {
            download("temp", url);
            decodeLocalImage();
        } else {
            if (FileReaderHelper) {
                new FileReaderHelper().Init('jpg|png|jpeg|gif', 'dataURL', function(e) {
                    img.src = e.data;
                }, true);
            } else {
                alert("fileReader class not found!");
            }
        }
    }

    function download(filename, url) {
        var a = window.document.createElement('a'),
            bd = document.querySelector('body');
        bd.appendChild(a);
        a.setAttribute('href', url);
        a.setAttribute('download', filename);
        a.click();
        bd.removeChild(a);
    }

    function mergeRecursive(target, source) {
        if (typeof target !== 'object') {
            target = {};
        }
        for (var property in source) {
            if (source.hasOwnProperty(property)) {
                var sourceProperty = source[property];
                if (typeof sourceProperty === 'object') {
                    target[property] = mergeRecursive(target[property], sourceProperty);
                    continue;
                }
                target[property] = sourceProperty;
            }
        }
        for (var a = 2, l = arguments.length; a < l; a++) {
            mergeRecursive(target, arguments[a]);
        }
        return target;
    }

    function html(innerhtml, appendTo) {
        var item = document.createElement('div');
        if (innerhtml) {
            item.innerHTML = innerhtml;
        }
        if (appendTo) {
            appendTo.appendChild(item.children[0]);
            return item;
        }
        return item.children[0];
    }

    function NotSupportError(message) {
        this.name = 'NotSupportError';
        this.message = (message || '');
    }
    NotSupportError.prototype = Error.prototype;
    return {
        init: function(opt) {
            if (initialized) {
                return this;
            }
            if (!display || display.tagName.toLowerCase() !== 'canvas') {
                console.log('Element type must be canvas!');
                alert('Element type must be canvas!');
                return false;
            }
            con = display.getContext('2d');
            if (opt) {
                options = mergeRecursive(options, opt);
                if (options.beep) {
                    beepSound = new Audio(options.beep);
                }
            }
            display.width = w = options.width;
            display.height = h = options.height;
            qrcode.sourceCanvas = display;
            initialized = true;
            setEventListeners();
            DecodeWorker = new Worker(options.decoderWorker);
            if (options.decodeQRCodeRate || options.decodeBarCodeRate) {
                setCallBack();
            }
            return this;
        },
        play: function() {
            localImage = false;
            setTimeout(play, 100);
            return this;
        },
        stop: function() {
            stop();
            return this;
        },
        pause: function() {
            pause();
            return this;
        },
        buildSelectMenu: function(selector, ind) {
            buildSelectMenu(selector, ind ? ind : 0);
            return this;
        },
        getOptimalZoom: function() {
            return optimalZoom();
        },
        getLastImageSrc: function() {
            return display.toDataURL();
        },
        decodeLocalImage: function(url) {
            decodeLocalImage(url);
        },
        isInitialized: function() {
            return initialized;
        },
        getWorker: function () {
            return DecodeWorker;
        },
        options: options
    };
};

</script>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama_user ?></span>
            <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/gambar/logo.jpg">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800"><?php echo $judul ?></h1> -->
        <!-- <a href="http://localho st/phpmyadmin/db_export.php?db=invertory_barang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Backup Database</a> -->
    </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>
        <div class="card-body">

<div class="container" align="center">

  <hr>
  <canvas></canvas>
  <hr>
  <select></select>
  <hr>
  <ul></ul>

</div>
          <script type="text/javascript" src="<?php echo base_url('assets/') ?>js/qrcodelib.js"></script>
          <!-- <script type="text/javascript" src="<?php echo base_url('assets/') ?>js/webcodecamjs.js"></script> -->
          <script type="text/javascript">
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
              var arg = {
                  resultFunction: function(result) {
                 var hasil = result.code;
                 window.location.href= '<?php echo base_url('t_pasien/cek_keaslian/'); ?>'+hasil;
                    // alert(hasil);
                  }
              };
              var decoder = new WebCodeCamJS("canvas").buildSelectMenu('select', 'environment|back').init(arg).play();
              /*  Without visible select menu
                  var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
              */
              document.querySelector('select').addEventListener('change', function(){
                decoder.stop().play();
              });
          </script>


        </div>
      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy;Benny Danang Kurniawan 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
    </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>




<script type="text/javascript">

tampil_data();
//================================================== MENAMPILKAN DATA ==============================================================
function tampil_data(){

         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('m_dokter/data'); ?>',
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 for(i=0; i<data.length; i++){

                   no ++;
                     html += '<tr>'+
                             '<td>'+no+'</td>'+
                             '<td ondblclick="detail('+data[i].id_dokter+')">'+data[i].nama_dokter+'</td>'+
                             '<td style="text-align:right;">'+
                                   '<a href="#form" data-toggle="modal" class="btn btn-warning" onclick="submit('+data[i].id_dokter+');"><i class="far fa-edit"></i></a>'+' '+
                                   '<a href="#" class="btn btn-danger btn-xs" onclick="hapus('+data[i].id_dokter+');" ><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                                 '</td>'+
                             '</tr>';
                 }
                 $('#tampil_data').html(html);
             }

         });
       }
//================================================== AKHIR MENAMPILKAN DATA ==============================================================

//================================================== DETAIL DATA ==================================================================
      function detail(id) {
        console.log(id);
        $.ajax({
          type : 'POST',
          data : 'id='+id,
          url : '<?php echo base_url('m_dokter/ambilid'); ?>',
          success:function(hasil){
            //convert JSON parse

          obj = JSON.parse(hasil);
          console.log(hasil);
            $("#nama").html(obj[0]['nama_dokter']);

             $("#form_detail").modal('show');
          }

        });

      }
//================================================== AKHIR DETAIL DATA ==============================================================
      function submit(x) {
        if (x=='tambah') {
          $('#btn-tambah').show();
          $('#btn-ubah').hide();
            } else {
          $('#btn-tambah').hide();
          $('#btn-ubah').show();

          $.ajax({
            type : 'POST',
            data : 'id='+x,
            url : '<?php echo base_url('m_dokter/ambilid'); ?>',
            success:function(hasil){
              //convert JSON parse

            obj = JSON.parse(hasil);
              $("input[name='id']").val(obj[0]['id_dokter']);
              $("input[name='nama_dokter']").val(obj[0]['nama_dokter']);
              // $("input[name='username']").val(obj[0]['username']);
              // $("input[name='password']").val(obj[0]['password']);
              // $("input[name='repassword']").val(obj[0]['password']);
              // $("#level").val(obj[0]['level']).change();
              // $('#pesan').html('Ketik Ulang Password Anda!');
            }

          });
        }

      }

//================================================== MENAMPILKAN DATA ================================================================

function cek_password() {
          var password =$("input[name='password']").val();
          var repassword =$("input[name='repassword']").val();

          if(repassword == password){
               $('#pesan').html('<label id="pesan" style="color:green" ><b>Password Cocok! </b></label>')
          }else {
              $('#pesan').html('<label id="pesan" style="color:red" >Password Tidak Sama! </label>')
          }
    }
//===================================================================================================================================


function tambah_data() {
  var nama_dokter =$("input[name='nama_dokter']").val();


      $.ajax({
      type:'POST',
      data: 'nama_dokter='+nama_dokter,
      url: '<?php echo base_url('m_dokter/proses_tambah') ?>',
      dataType:'json',
      success:function(hasil){

          if (hasil.pesan == '') {
          $('#form').modal('hide');
          tampil_data();
          //kosongkan om
          $("input[name='nama_dokter']").val('');
          // $("input[name='username']").val('');
          // $("input[name='password']").val('');
          // $("input[name='repassword']").val('');
          } else {
          $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
          }

      }
      });
}


//===========================================================Ubah Data======================================================================

function ubah_data() {
  var nama_dokter =$("input[name='nama_dokter']").val();

  var id =$("input[name='id']").val();
  $.ajax({
  type:'POST',
  data: 'id='+id+'&nama_dokter='+nama_dokter,
  url: '<?php echo base_url('m_dokter/proses_ubah') ?>',
  dataType:'json',
  success:function(hasil){
 console.log(hasil);
      if (hasil.pesan == '') {
      $('#form').modal('hide');
      tampil_data();
      //kosongkan om
      $("input[name='id']").val('');
      $("input[name='nama_dokter']").val('');

      } else {
      $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
      }

  }
  });

}
//=========================================================Akhir Ubah===================================================================

function hapus(id) {
 var tanya =confirm('Apakah anda akan menghapus data ini ?');
 if (tanya) {
   $.ajax({
     type : 'POST',
     data : 'id='+id,
     url : '<?php echo base_url('m_dokter/hapus'); ?>',
     success:function(hasil){
       //convert JSON parse
  tampil_data();
     }
   });
 }
}
</script>

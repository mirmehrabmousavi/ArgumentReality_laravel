<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.4/dist/mindar-image.prod.js"></script>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.4/dist/mindar-image-aframe.prod.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark">

<div class="container-fluid">
    <div class="col-md-12">
        <a href="http://google.com" class="btn btn-primary float-right p-2 m-3 position-absolute" style="z-index: 10;">google.com</a>

        <a-scene style="z-index: -2" htmlembed mindar-image="imageTargetSrc: /image-tracking/nft/targets.mind; maxTrack: 2" color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
            <!--<a-assets>
                <a-asset-item id="raccoonModel" src="image-tracking/nft/trex/scene.gltf"></a-asset-item>
            </a-assets>-->

            <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>

            <a-entity mindar-image-target="targetIndex: 0">
                <a-gltf-model rotation="0 0 0 " position="0 -0.25 0" scale="0.05 0.05 0.05" src="{{$product->file}}{{--/image-tracking/nft/trex/scene.gltf--}}" animation-mixer>
            </a-entity>
        </a-scene>
    </div>
</div>

</body>
</html>

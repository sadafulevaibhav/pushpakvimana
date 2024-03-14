<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<html>
  <head>
    <title>SpinWheel Drop in Module</title>
  </head>
  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>

    <div id="spinwheel-identity-connect"></div>

    <script src="https://cdn.spinwheel.io/dropin/v1/dim-initialize.js"></script>

    <script type="text/javascript">
      const config = {
        containerId: 'spinwheel-identity-connect',
        env: 'sandbox',
        onSuccess: (metadata) => {
          console.log('onSuccess', metadata);
        },
        onLoad: (metadata) => {
          console.log('onLoad', metadata);
        },
        onEvent: (metadata) => {
          console.log('onEvent', metadata);
        },
        dropinConfig: {
          module: 'identity-connect',
          token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjbGllbnRJZCI6IjMxZjVjNWVmLTNjNmItNDQxNC05ZDU5LTk4OTlmZTAzOTIzMSIsInBhcnRuZXJJZCI6IjNkMDVlM2M5LTRkMmEtNGYyZC1iYzlmLTZhYTg5MDE3MGVmNCIsImV4dFVzZXJJZCI6InRlc3QtZGVtby11c2VyMSIsInNwaW53aGVlbFVzZXJJZCI6IjI2ZjE2ZTU5LTJlYTAtNDdlMy1iMDNiLWQyNDAyNjE1YzM2NyIsInRva2VuRXhwaXJ5SW5TZWMiOjYwMCwiaXNDZG5SZXF1ZXN0Ijp0cnVlLCJlbnYiOiJzYW5kYm94IiwiaXNEZWZhdWx0RXhwaXJ5VGltZSI6dHJ1ZSwiaWF0IjoxNzA5MDQzODgzLCJleHAiOjE3MDkwNDQ0ODN9._kjiyREZFo01wV9865FVRINlHGAhrfDwlsjA5Url_T8',
        },
      };

      const handler = window.Spinwheel && window.Spinwheel.create(config);
      handler.open();

    </script>
  </body>
</html>

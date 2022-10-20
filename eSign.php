<?php echo @$_POST['signature']; ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
   <style>
    body {
       display: flex;
       flex-direction:column;
       justifiy-content:center;
       align-items:center;
       background: linear-gradient(to right, rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
       color: black;
       font-family: Helvetica;
       font-size:24px;
    }
   form{
     display: flex;
     flex-direction: column;
     width: 500px;
   }
   .SignatureInputCanvas{
     background: cyan;
   }
   </style>
</head>
<body>

<h2>Form with Signature</h2>
<form action="" method="post">
  <div id="signature" />
  <input type="submit">
</form>

<script>
SignatureInput = function(oConfig) {
  let sSelector = oConfig.selector;
  // Storing config
  this.oConfig = oConfig;
  // Caching dom
  this.oSelector = document.querySelector(sSelector);
  if (this.oSelector) {
    this.render();
    this.attachEvents();
  }
};

SignatureInput.prototype.drawOnCanvas = function(x,y) {
  let prevX, prevY;
  prevX = this.currX;
  prevY = this.currY;
  this.currX = x;
  this.currY = y;

  this.oCtx.beginPath();
  this.oCtx.moveTo(prevX, prevY);
  this.oCtx.lineTo(this.currX, this.currY);
  this.oCtx.lineWidth = 2;
  this.oCtx.strokeStyle = "#000000";
  this.oCtx.stroke();
  this.oCtx.closePath();
};

SignatureInput.prototype.copyToInput = function() {
  const sImageData = this.oCanvas.toDataURL();
  this.oInput.value = sImageData;
};

SignatureInput.prototype.attachEvents = function() {
  this.oCanvas.addEventListener(
    "mousemove",
    function(ev) {
      ev.preventDefault();
      if (this.active) {
        let x = ev.offsetX;
        let y = ev.offsetY;
        this.drawOnCanvas(x,y);
      }
    }.bind(this),
    false
  );
  
  this.oCanvas.addEventListener(
    "touchmove",
    function(ev) {
      ev.preventDefault();
      let x = ev.targetTouches[0].clientX  - ev.targetTouches[0].target.offsetLeft;
      let y = ev.targetTouches[0].clientY  - ev.targetTouches[0].target.offsetTop;
      if (this.active) {
        this.drawOnCanvas(x,y);
      }
    }.bind(this),
    false
  );
  
  this.oCanvas.addEventListener(
    "mousedown",
    function(ev) {
      this.active = true;
      this.currX = ev.offsetX;
      this.currY = ev.offsetY;
    }.bind(this),
    false
  );
  
  this.oCanvas.addEventListener(
    "touchstart",
    function(ev) {
      ev.preventDefault();
      this.active = true;
      this.currX = ev.offsetX;
      this.currY = ev.offsetY;
    }.bind(this),
    false
  );
  
  this.oCanvas.addEventListener(
    "mouseup",
    function() {
      this.active = false;
      this.copyToInput();
    }.bind(this),
    false
  );
  this.oCanvas.addEventListener(
    "touchend",
    function() {
      this.active = false;
      this.copyToInput();
    }.bind(this),
    false
  );
  this.oCanvas.addEventListener(
    "mouseout",
    function() {
      this.active = false;
      this.copyToInput();
    }.bind(this),
    false
  );
  
  this.oClearBtn.addEventListener('click', this.clearCanvas.bind(this), false);
};

SignatureInput.prototype.clearCanvas = function(){
  this.oCtx.clearRect(0,0, this.oConfig.width, this.oConfig.height);
};

SignatureInput.prototype.render = function() {
  let oClearBtn = document.createElement("button");
  oClearBtn.innerText = 'Clear';
  oClearBtn.type = "button";
  
  let oCanvas = document.createElement("canvas");
  oCanvas.width = this.oConfig.width;
  oCanvas.height = this.oConfig.height;

  oCanvas.className = "SignatureInputCanvas";
  let oSigInputHidden = document.createElement("input");
  oSigInputHidden.name = this.oConfig.inputName || "signature-input";
  oSigInputHidden.type = "hidden";
  // Caching for attaching events
  this.oCanvas = oCanvas;
  this.oClearBtn = oClearBtn;
  // Caching for change events
  this.oInput = oSigInputHidden;
  // Context for drawing
  this.oCtx = oCanvas.getContext("2d");
  
  this.oSelector.appendChild(oCanvas);
  this.oSelector.appendChild(oClearBtn);
  this.oSelector.appendChild(oSigInputHidden);
};

// Instantiate the input
new SignatureInput({
  selector: "#signature",
  width: 500,
  height: 200,
  inputName: "signature",
  color: "#3399FF"
});
</script>
</body>
</html>
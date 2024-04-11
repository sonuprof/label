<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="width: 246px;
             height: 257px;
             overflow: hidden;
           ">

  <div style="width: 100%;height: 100%; position: relative;" id="print">
    <img src="./peack logo.png" style="width: 100%; height: 100%;">

    <p
      style="position: absolute; top: 45%; font-size: 10px; font-weight: bolder; left: 5%; transform: translate(0%, -50%); word-wrap: break-word; white-space: pre-wrap; width: 140px;">
      Tp</p>
    <p style="position: absolute; top: 68%; font-size: 10px; font-weight: bolder; left: 11%;">1524588882 lot</p>
    <p style="position: absolute; top: 68%; font-size: 10px; font-weight: bolder; left: 39%;">ABCDEFG mfd</p>
    <p style="position: absolute; top: 72%; font-size: 10px; font-weight: bolder; right: 17%;">ABCDEFG exp</p>
    <p style="position: absolute; top: 76%; font-size: 10px; font-weight: bolder; left: 11%;">ABCDEFG net</p>
    <p style="position: absolute; top: 76%; font-size: 10px; font-weight: bolder; left: 38%;">ABCDEFG mrp</p>


  </div>


  <button style="margin-top: 20px;" id="btn">Print</button>

  <!-- <script>
    const printDiv = document.getElementById('print');
    const btn = document.getElementById('btn').addEventListener('click', () => {
      window.print(printDiv);
    });
  </script> -->

  <script>
    const printDiv = document.getElementById('print');
    const btn = document.getElementById('btn').addEventListener('click', () => {

      const printWindow = window.open('', '_blank');

      printWindow.document.write(printDiv.innerHTML);

      printWindow.print();

      printWindow.close();
    });
  </script>

</body>

</html>
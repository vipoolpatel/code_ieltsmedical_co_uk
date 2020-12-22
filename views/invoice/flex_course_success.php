<?php
$this->load->view('invoice/header');
?>

 <p>
  Hi <?=$getrecord->first_name?>,
</p>
<p>
Thank you for your order of <?=$getrecord->name?>
<table style="color:#555555;margin:0;width:100%" align="center">
  <tbody>
     <tr>
        <td style="color:#555555;border:1px solid #aeaeae;border-radius:3px">
           <table style="border:none;border-bottom:1px solid #aeaeae;width:100%;font-family:arial" cellspacing="0" cellpadding="8">
              <tbody>
                 <tr>
                    <td style="color:#000000;border-bottom:1px solid #aeaeae;font-weight:bold;text-align:left">
                       Course
                    </td>

                    <td style="color:#000000;border-bottom:1px solid #aeaeae;font-weight:bold;width:40px;text-align:right">
                       Fee
                    </td>
                 </tr>

                 <tr style="border-bottom:1px solid #aeaeae">
                    <td style="color:#555555;font-weight:bold;text-align:left;border-right:1px solid #aeaeae;font-weight:normal">
                       <span style="font-weight:bold"><?=$getrecord->name?></span>
                    </td>

                    <td style="text-align:right;color:#555555">
                       &pound;<?=$getrecord->final_total?>
                    </td>
                 </tr>

              </tbody>
           </table>
           <div style="text-align:right;margin:10px;color:#000000;font-size:14px;font-family:arial;font-weight:700">
              Total: &pound;<?=$getrecord->final_total?>
           </div>
        </td>
     </tr>
  </tbody>
</table>

<?php
$this->load->view('invoice/footer');
?>

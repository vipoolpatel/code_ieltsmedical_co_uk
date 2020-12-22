<?php
$this->load->view('invoice/header');
?>

 <p>
  Hi <?=$getrecord->first_name?>,
</p>
<p>
Thank you for your order of Accommodation
<table style="color:#555555;margin:0;width:100%" align="center">
  <tbody>
     <tr>
        <td style="color:#555555;border:1px solid #aeaeae;border-radius:3px">
           <table style="border:none;border-bottom:1px solid #aeaeae;width:100%;font-family:arial" cellspacing="0" cellpadding="8">
              <tbody>
                 <tr>
                    <td style="color:#000000;border-bottom:1px solid #aeaeae;font-weight:bold;text-align:left">
                       Title
                    </td>

                    <td style="color:#000000;border-bottom:1px solid #aeaeae;font-weight:bold;width:40px;text-align:right">
                       Fee
                    </td>
                 </tr>

                 <tr style="border-bottom:1px solid #aeaeae">
                    <td style="color:#555555;font-weight:bold;text-align:left;border-right:1px solid #aeaeae;font-weight:normal">
                       <span style="font-weight:bold">Accommodation</span>
                                <br >
                       Check in date : <?=date('d-m-Y', strtotime($getrecord->check_in_date))?><br >
                       Check out date : <?=date('d-m-Y', strtotime($getrecord->check_out_date))?><br >

                    </td>

                    <td style="text-align:right;color:#555555">
                       &pound;<?=$getrecord->total?>
                    </td>
                 </tr>

              </tbody>
           </table>
           <div style="text-align:right;margin:10px;color:#000000;font-size:14px;font-family:arial;font-weight:700">
              Total: &pound;<?=$getrecord->total?>
           </div>
        </td>
     </tr>
  </tbody>
</table>

<?php
$this->load->view('invoice/footer');
?>

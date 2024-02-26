<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>
<body>
<img src="img/solctra.jpg" width="400px;"/><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone Number: +250788 167 700 or 1150<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: info@solektra.co<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KBC Building, 6th Floor, KN 5 RD, Kigali-Rwanda<br>
<?php
// $med1 = "SELECT *  FROM address ";
// $retvalmed1 = mysqli_query($link,$med1);
// if(! $retvalmed1 )
// { die('Could not get data: ' . mysqli_error($link)); }    
// while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
// {
// $ds=$rowmed1['district'];
// $hc=$rowmed1['hc'];
// }
include('php/link.php');
$date = date('Y-m-d');
?>
<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REPUBLIC OF RWANDA <br /> -->
<!-- MINISTRY OF HEALTH<br /> -->
<!-- <?php // echo strtoupper($ds); ?>  DISTRICT<br /> -->
<!-- <?php // echo strtoupper($hc); ?>  HC<br /> -->
<center>
<h2> LIVESTOCKS  <?php echo $date   ?></h2>
<div class="table-responsive text-nowrap">
<table class="table" style="font-size:16px; border-collapse: collapse;" width ="0" border="1" bordercolor="#999999" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th>Category of Livestock</th>
      <th>Microchip Number</th>
      <th>Date of Insurance Delivery</th>
      <th>Price</th>
      <th>Insurance Amount</th>
      <th>Total Commission (13.5%)</th>
      <th>Commission(Agent)</th>
      <th>Commission(Solektra)</th>
      <th>Payment Mode</th>
      <th>Contract Number</th>
      <th>Added By</th>
      <th>Date & Time</th>
      <!-- <th>Actions</th> -->
    </tr>
  </thead>
                    <tbody class="table-border-bottom-0">
                    <?php     
    // include('link.php');        
    $stock='';
    $tot_ins_amt = 0;
    $tot_comm = 0;
    $tot_comm_agent = 0;
    $tot_comm_solektra = 0;
    $checkStmt = $conn->prepare("SELECT * FROM livestocks");
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {                   
          $id = $result['id'];
          $category_id = $result['category_id'];
          $microchip_number = $result['microchip_number'];
          $price = $result['price'];
          $insurance_delivery_date = $result['insurance_delivery_date'];
          $mode_of_payment = $result['mode_of_payment'];
          $contract_number = $result['contract_number'];
          $tot_ins_amt += $result['insurance_amount'];
          $tot_comm += ((($result['price']*5.5)/100) * 13.5)/100;
          $tot_comm_agent += ((((($result['price']*5.5)/100) * 13.5)/100) * 7)/13.5;
          $tot_comm_solektra += ((((($result['price']*5.5)/100) * 13.5)/100) * 6.5)/13.5;


            echo '
                  <tr>
                    <td>'; if($result['category_id']==1){ echo '<span class="badge bg-label-danger">Chicken</span>';$stock='Chicken'; }elseif($result['category_id']==2) {echo '<span class="badge bg-label-danger">Cow</span>';$stock='Cow'; }elseif($result['category_id']==3) {echo '<span class="badge bg-label-danger">Duck</span>';$stock='Duck'; }elseif($result['category_id']==4) { echo '<span class="badge bg-label-danger">Goat</span>';$stock='Goat'; }elseif($result['category_id']==5) { echo '<span class="badge bg-label-danger">Pig</span>';$stock='Pig'; }else{ echo '<span class="badge bg-label-danger">Sheep</span>';$stock='Sheep'; } echo'</td>
                    <td>'.$result['microchip_number'].'</td>
                    <td>'.$result['insurance_delivery_date'].'</td>
                    <td>'.$result['price'].'</td>
                    <td style="text-align:right;">'.$result['insurance_amount'].'</td>                    
                    <td style="text-align:right;">'. ((($result['price']*5.5)/100) * 13.5)/100 .'</td>
                    <td style="text-align:right;">'. ((((($result['price']*5.5)/100) * 13.5)/100) * 7)/13.5 .'</td>
                    <td style="text-align:right;">'. ((((($result['price']*5.5)/100) * 13.5)/100) * 6.5)/13.5 .'</td>
                    <td>'; if($result['mode_of_payment']==1){ echo 'Cash'; }elseif( $result['category_id']==2) { echo 'MoMo'; }elseif($result['category_id']==3) { echo 'Airtel Money'; }else{ echo 'Bank'; } echo'</td>';                       
              echo '                    
                    <td>'.$result['contract_number'].'</td>
                    <td>'.$result['user'].'</td>
                    <td>'.$result['entry_date'].'</td>                    
                  </tr>';
        }
        $tot_ins_amt1 = $tot_ins_amt;
        $tot_comm1 = $tot_comm;
        $tot_comm_agent1 = $tot_comm_agent;
        $tot_comm_solektra1 = $tot_comm_solektra;

        echo '
            <tr style="background-color:#777;text-align:right;">
            <td colspan="4" style="padding-right:30px;"><b>TOTAL:</b></td>
            <td><b>'.$tot_ins_amt1.'</b></td>
            <td><b>'.$tot_comm1.'</b></td>
            <td><b>'.$tot_comm_agent1.'</b></td>
            <td><b>'.$tot_comm_solektra1.'</b></td>
            <td colspan="4"></td>            
            </tr>';
    }

    // header('Content-Type: application/json');
    // echo json_encode($results);
?>
                      
                    </tbody>
                  </table>
                </div>
</center>
<br><br><br>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Names, Signature and stamp</h3><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................<br /><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................
</body>
</html>
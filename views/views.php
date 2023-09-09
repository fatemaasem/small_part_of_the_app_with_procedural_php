<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
  <style>
    table{
      width: 100%;
      border-collapse: collapse; 
      text-align: center;
    }
    table  td,table  th{
      padding: 5px;
     
    }
    tfoot tr td {
      font-size: 20px;
    }
    tfoot tr th{
      text-align: right;
      font-size: 20px;
    }
  </style>
  </head>
  <body>
    <table border="1">
    <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require dirname(__DIR__).'\index.php';
      $TotalIncome=0;
      $TotalExpense=0;
         if(!empty($transactions)) :
        foreach($transactions  as $tri):
          ?>
          <tr>
            <td><?= $tri[0] ?></td>
            <td><?= $tri[1] ?></td>
            <td><?= $tri[2] ?></td>
            <?php
            
               if($tri[3][0]=='-'):
              $TotalExpense+=str_replace(['-',',','$'],'',$tri[3]);
              ?>
              <td style="color:red"><?=$tri[3]?>
              </td>
              <?php endif ?>
              <?php
               if($tri[3][0]!='-'):
                $TotalIncome+= str_replace(['-',',','$'],'',$tri[3]);
              ?>
              <td style="color:green"><?=$tri[3]?>
              </td>
              <?php endif ?>
          </tr>
          <?php endforeach ?>
          <?php endif ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">Total Income:</th>
            <td><?= $TotalIncome?></td>
          </tr>
          <tr>
            <th colspan="3">Total Expense:</th>
            <td><?='-'.$TotalExpense?></td>
          </tr>
        <tfoot>
    </table>
  </body>
  </html>
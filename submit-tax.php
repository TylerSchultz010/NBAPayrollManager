<!DOCTYPE html>
<html>
<head>
    <title>Salary Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center" style="background-color:#212529"> <!-- #212529 -->
    <?php

    $payroll = isset($_GET['payroll']) ? $_GET['payroll'] : 0;
    $repeater = isset($_GET['repeater']) ? $_GET['repeater'] : 0;
    ?>
    
    
    <div class="d-flex mt-3 ms-3">
        <form action = "submit-salary.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
            <?php include 'salary-maker.php';?>
        </form>
        
        <form action = "submit-tax.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
            <?php include 'tax-calculator.php';?>
            <table class="table table-hover table-dark" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">Tax</th>
                        <th scope="col">Total Taxed Payroll</th>
                    </tr>
                </thead>
                <tbody id="salary-body">
                </tbody>
            </table>
        </form>
    </div>

    <script>
    function calculate() {
        var payroll = "<?php echo htmlspecialchars($payroll); ?>";
        var repeater = "<?php echo htmlspecialchars($repeater); ?>";                    //repeater rate is +1 to standard rate (yes = 1, no = 0)
       
        
        const rate = [1.5, 1.75, 2.50, 3.25];                                           //array of rates
        var tax = 0;                                                                    //just tax
        var taxedpayroll;                                                               //tax + payroll
        var bracket = 5168000;
        var taxed = payroll - 170814000;                                                //total money that is applicable to taxes
        var i = 0;                                                                      //variable to increment rate array
        
        if (payroll <= 170814000)                                                        //payroll is under the tax
        {
            taxedpayroll = payroll;
        }
        
        else
        {
          while (taxed > 0)                                                             //aggregate the taxes accordingly until depleted
          {
            if (taxed > bracket)
            {
                tax +=  bracket * (rate[i] + parseInt(repeater));
                taxed = taxed - bracket;
            }
          
            else
            {
                tax += taxed * (rate[i] + parseInt(repeater));
                taxed = 0;
            }
            
            if (rate.length - 1 === i)                                                  //increased rates will get added to array if needed
                rate.push(rate[i]+0.5);
            i++;  
          }
        }

        taxedpayroll = BigInt(payroll) + BigInt(tax);
        var salaryBody = document.getElementById('salary-body');
        
        var formattedtax = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(tax);
            
        var formattedpayroll = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(taxedpayroll);
            
       
            var newRow = `
                <tr>
                <td>${formattedtax}</td>
                <td>${formattedpayroll}</td>
                </tr>
            `;
            salaryBody.insertAdjacentHTML('beforeend', newRow);
        }

    calculate();
    </script>
</body>
</html>

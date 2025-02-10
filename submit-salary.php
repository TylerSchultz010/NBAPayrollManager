<!DOCTYPE html>
<html>
<head>
    <title>Salary Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center" style="background-color:#212529"> <!-- #212529 -->
    <?php

    $millions = isset($_GET['millions']) ? $_GET['millions'] : 0;
    $years = isset($_GET['years']) ? $_GET['years'] : 0;
    $rate = isset($_GET['rate']) ? $_GET['rate'] : 0;
    ?>

    <div class="d-flex mt-3 ms-3">
        <form action = "submit-salary.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
            <?php include 'salary-maker.php';
            echo '<h4 class = "mt-3"> ' . $years . ' year, $' . $millions . ' million contract</h4>';?>
            <table class="table table-hover table-dark" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">Year</th>
                        <th scope="col">Salary</th>
                    </tr>
                </thead>
                <tbody id="salary-body">
                </tbody>
            </table>
        </form>
        <form action = "submit-tax.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
            <?php include 'tax-calculator.php';?>
        </form>
    </div>

    <script>
    function calculate() {
        var millions = "<?php echo htmlspecialchars($millions); ?>";
        var years = "<?php echo htmlspecialchars($years); ?>";
        var rate = "<?php echo htmlspecialchars($rate); ?>";
        var contract = millions * 1000000;

        const salary = [];

        if(years == 1) {
            salary[0] = contract;
        } 
        else if(years == 2) {
            salary[0] = Math.round(contract / (1 + parseFloat(rate)));
            salary[1] = contract - salary[0];
        }
        else if(years == 3) {
            salary[0] = Math.round(contract / (3 * parseFloat(rate)));
            salary[1] = Math.round(salary[0] * parseFloat(rate));
            salary[2] = contract - (salary[0]+salary[1]);
        }
        else if(years == 4) {
            salary[0] = Math.round(contract / ((6 * parseFloat(rate) - 2)));
            salary[1] = Math.round(salary[0] * parseFloat(rate));
            salary[2] = Math.round(salary[1] + (salary[1]-salary[0]));
            salary[3] = contract - (salary[0]+salary[1]+salary[2]);
        }
        else if(years == 5) {
            salary[0] = Math.round(contract / ((10 * parseFloat(rate) - 5)));
            salary[1] = Math.round(salary[0] * parseFloat(rate));
            salary[2] = Math.round(salary[1] + (salary[1]-salary[0]));
            salary[3] = Math.round(salary[2] + (salary[1]-salary[0]));
            salary[4] = contract - (salary[0]+salary[1]+salary[2]+salary[3]);
        }

        var salaryBody = document.getElementById('salary-body');
        for (let i = 1; i <= years; i++) {
            var formattedSalary = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(salary[i-1]);

            var newRow = `
                <tr>
                <td>${i}</td>
                <td>${formattedSalary}</td>
                </tr>
            `;
            salaryBody.insertAdjacentHTML('beforeend', newRow);
        }
    }

    calculate();
    </script>
</body>
</html>
